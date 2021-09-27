@extends('layouts.app')

@section('extra_css')

@endsection



@section('content')

  <div class="container">
    <div class="card">
      <div class="card-header">
        Payment Details
      </div>
      <div class="card-body">
        <h3 class="card-title mb-4">{{ findUser($payment->user_id)->name }}</h3>
        <p class="card-text"><b>Cardholder Name:</b> {{ findUser($payment->user_id)->name }}</p>
        <p class="card-text"><b>Card Number:</b> {{ $payment->card_number }}</p>
        <p class="card-text"><b>Security Code:</b> {{ $payment->security_code }}</p>
        <p class="card-text"><b>Card Expire:</b> {{ $payment->expiration }}</p>
        <p class="card-text"><b>Payment:</b> ${{ findProperty($payment->property_id)->price }}</p>
      </div>
    </div>
  </div>


@endsection



@section('extra_js')

@endsection
