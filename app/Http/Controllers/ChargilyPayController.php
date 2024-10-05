<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class ChargilyPayController extends Controller
{
    /**
     * The client will be redirected to the ChargilyPay payment page
     *
     */
    public function redirect(Request $request)
    {

        $user = auth()->user();
        $currency = "dzd";
        $amount = Course::find($request->courseId)->price * 220;

        $payment = \App\Models\ChargilyPayment::create([
            "user_id"  => $user->id,
            "status"   => "pending",
            "currency" => $currency,
            "amount"   => $amount,
        ]);
        if ($payment) {
            $checkout = $this->chargilyPayInstance()->checkouts()->create([
                "metadata" => [
                    "payment_id" => $payment->id,
                ],
                "locale" => "ar",
                "amount" => $payment->amount,
                "currency" => $payment->currency,
                "description" => "Payment ID={$payment->id}",
                "success_url" => route("chargilypay.back"),
                "failure_url" => route("chargilypay.back"),
                "webhook_endpoint" => route("chargilypay.webhook_endpoint"),
            ]);
            if ($checkout) {
                return redirect($checkout->getUrl());
            }
        }
        return dd("Redirection failed");
    }
    /**
     * Your client you will redirected to this link after payment is completed ,failed or canceled
     *
     */
    public function back(Request $request)
    {
        $user = auth()->user();
        $checkout_id = $request->input("checkout_id");
        $checkout = $this->chargilyPayInstance()->checkouts()->get($checkout_id);
        $payment = null;

        if ($checkout) {
            $metadata = $checkout->getMetadata();
            $payment = \App\Models\ChargilyPayment::find($metadata['payment_id']);
            ////
            //// Is not recomended to process payment in back page / success or fail page
            //// Doing payment processing in webhook for best practices
            ////
        }
        dd($checkout, $payment);
    }
    /**
     * This action will be processed in the background
     */
    public function webhook()
    {
        $webhook = $this->chargilyPayInstance()->webhook()->get();
        if ($webhook) {
            //
            $checkout = $webhook->getData();
            //check webhook data is set
            //check webhook data is a checkout
            if ($checkout and $checkout instanceof \Chargily\ChargilyPay\Elements\CheckoutElement) {
                if ($checkout) {
                    $metadata = $checkout->getMetadata();
                    $payment = \App\Models\ChargilyPayment::find($metadata['payment_id']);

                    if ($payment) {
                        if ($checkout->getStatus() === "paid") {
                            //update payment status in database
                            $payment->status = "paid";
                            $payment->update();
                            /////
                            ///// Confirm your order
                            /////
                            return response()->json(["status" => true, "message" => "Payment has been completed"]);
                        } else if ($checkout->getStatus() === "failed" or $checkout->getStatus() === "canceled") {
                            //update payment status in database
                            $payment->status = "failed";
                            $payment->update();
                            /////
                            /////  Cancel your order
                            /////
                            return response()->json(["status" => true, "message" => "Payment has been canceled"]);
                        }
                    }
                }
            }
        }
        return response()->json([
            "status" => false,
            "message" => "Invalid Webhook request",
        ], 403);
    }

    protected function chargilyPayInstance()
    {
        return new \Chargily\ChargilyPay\ChargilyPay(new \Chargily\ChargilyPay\Auth\Credentials([
            "mode" => "live",
            "public" => "live_pk_vnpAiOtgP6sMkziWoEhn0ciNKo99smWRFNWpZw6b",
            "secret" => "live_sk_9anG5IG5P4SIf5h6iy3NMSjCi5dayvZtrvQuxm3X",
        ]));
    }
}
