@extends('backend.layout.master')

@push('plugin-styles')
  <link href="{{ asset('backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('extra_css')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
@endsection



@section('content')

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-5">
    <div>
      <h4 class="mb-3 mb-md-0">Properties</h4>
    </div>

  </div>

  <div class="row">

    @forelse (getAllProperty() as $property)
      <div class="col-lg-4">
        <div class="card">
          <img class="card-img-top" src="{{ asset('uploads/images') }}/{{ $property->image }}" alt="Card image cap">
            <div class="card-body">
              <h3 class="card-title">{{ $property->title }}</h3>
              <a href="{{ route('property.details', $property->id) }}" class="btn btn-secondary">Details</a>
              @if (Auth::user()->role == 'manager')
                <!-- <a href="{{ route('property.inspection', $property->id) }}" class="btn btn-warning">add Property</a> -->
              @endif

              @if (Auth::user()->role == 'admin')
                <a href="{{ route('property.navigate', $property->id) }}" class="btn btn-success">Navigate</a>
              @endif

            </div>
          </div>
      </div>
    @empty

    @endforelse

  </div>



  {{-- @if (Auth::user()->role == 'manager')
    <div class="container">
    <div class="row">

    @forelse (getAllProperty() as $property)
      <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{ asset('uploads/images') }}/{{ $property->image }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $property->title }}</h5>
            <a href="{{ route('property.details', $property->id) }}" class="btn btn-secondary">Details</a>
            <a href="{{ route('property.inspection', $property->id) }}" class="btn btn-warning">Inspection 123</a>
          </div>
        </div>
      </div>
    @empty

    @endforelse


    </div>
    </div>
    @else
  @endif

  @if (Auth::user()->role == 'admin')
    <div class="container">
    <div class="row">

    @forelse (getAllProperty() as $property)
      <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{ asset('uploads/images') }}/{{ $property->image }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $property->title }}</h5>
            <a href="{{ route('property.details', $property->id) }}" class="btn btn-secondary">Details</a>
            <a href="{{ route('property.navigate', $property->id) }}" class="btn btn-success">Navigate</a>
          </div>
        </div>
      </div>
    @empty

    @endforelse


    </div>
    </div>
    @else

  @endif --}}

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
