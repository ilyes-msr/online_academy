@extends('layouts.app_theme.default')

@section('title', __('site.checkout'))

@section('styles')
<style>
  .StripeElement {
      box-sizing: border-box;
      height: 40px;
      padding: 10px 12px;
      border: 1px solid transparent;
      border-radius: 4px;
      background-color: white;
      box-shadow: 0 1px 3px 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;
  }
  .StripeElement--focus {
      box-shadow: 0 1px 3px 0 #cfd7df;
  }
  .StripeElement--invalid {
      border-color: #fa755a;
  }
  .StripeElement--webkit-autofill {
      background-color: #fefde5 !important;
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="header">  
    <h3 class="mb-3 mt-5 {{App::getLocale() == 'ar' ? 'text-right' : ''}}">{{__('site.checkout')}}</h3>
  </div>
  <form method="POST" action="{{ route('purchase') }}" class="card-form mt-3 mb-3 {{App::getLocale() == 'ar' ? 'text-right' : ''}}">
    @csrf
    <input type="hidden" name="payment_method" class="payment-method">
    <input type="hidden" name="course_id" value="{{encrypt($course_id)}}">
    <input class="StripeElement mb-3" name="card_holder_name" placeholder="{{__('site.card_holder_name')}}" required style="{{App::getLocale() == 'ar' ? 'direction: rtl' : ''}}">
        <div id="card-element"></div>
    <div id="card-errors" role="alert"></div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary pay">
            {{__('site.pay')}} ${{$price}}
        </button>
    </div>
  </form> 
  </div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe("{{ env('STRIPE_KEY') }}")
    let elements = stripe.elements()
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style})
    card.mount('#card-element')
    let paymentMethod = null
    $('.card-form').on('submit', function (e) {
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()}
                }
            }
        ).then(function (result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('button.pay').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
            }
        })
        return false
    })
</script>
@endsection