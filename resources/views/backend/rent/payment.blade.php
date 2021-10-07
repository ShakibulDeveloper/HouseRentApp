@extends('backend.layout.master')

@push('plugin-styles')
  <link href="{{ asset('backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('extra_css')

@endsection



@section('content')

  <div class="container">
    <div class="card">
      <div class="card-header">
        Payment Details
      </div>
      <div class="card-body">
        <h3 class="card-title mb-4">{{ findUser($payment->user_id)->name }}</h3> <br>
        <p class="card-text"><b>Cardholder Name:</b> {{ findUser($payment->user_id)->name }}</p><br>
        <p class="card-text"><b>Card Number:</b> {{ $payment->card_number }}</p><br>
        <p class="card-text"><b>Security Code:</b> {{ $payment->security_code }}</p><br>
        <p class="card-text"><b>Card Expire:</b> {{ $payment->expiration }}</p><br>
        <p class="card-text"><b>Payment:</b> ${{ findProperty($payment->property_id)->price }}</p>
      </div>
    </div>
  </div>


@endsection



@section('extra_js')

@endsection
@push('plugin-scripts')
  <script src="{{ asset('backend/assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('backend/assets/js/datepicker.js') }}"></script>
@endpush
