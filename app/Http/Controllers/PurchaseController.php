<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PurchaseController extends Controller
{
    public function creditCheckout(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required'
        ]);

        $course_id = $data['course_id'];
        $intent = auth()->user()->createSetupIntent();

        $price = Course::find($course_id)->price;
        return view('credit.checkout', compact('intent', 'course_id', 'price'));
    }

    public function purchase(Request $request)
    {
        $user = $request->user();

        try {
            $courseId = Crypt::decrypt($request->course_id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->route('course.show', $courseId)->withErrors(['course_id' => 'Invalid course ID.']);
        }

        $validated = $request->validate([
            'payment_method' => 'required',
            'card_holder_name' => 'required|string|max:255',
        ]);

        $paymentMethod = $validated['payment_method'];

        if (!Course::where('id', $courseId)->exists()) {
            return redirect()->route('course.show', $courseId)->withErrors(['course_id' => 'Course does not exist.']);
        }

        $course = Course::find($courseId);
        $price = $course->price;

        $userId = auth()->id();

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($price * 100, $paymentMethod, [
                'return_url' => route('course.show', $courseId)
            ]);
        } catch (\Exception $exception) {

            return redirect()->route('course.show', $courseId)->with('Somthing went wrong, please check you card details', $exception->getMessage());
        }

        $course->users()->attach($userId, [
            'price' => $price,
            'created_at' => now()
        ]);

        // $course->users()->save($user, ['price' => $price]);

        return redirect()->route('course.show', $courseId)->with('success', 'تم شراء الكورس بنجاح يمكنك الآن الاطلاع على محتواه');
    }
}
