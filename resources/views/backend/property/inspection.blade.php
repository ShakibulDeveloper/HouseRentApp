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
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-5">
          <div>
            <h4 class="mb-3 mb-md-0">Inspection</h4>
          </div>

        </div>
        @if (session('success'))

          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>

          @else
        @endif
        <form class="" action="{{ route('inspection.update') }}" method="post">
          @csrf
          <input type="date" class="form-control mt-4" name="date" value="{{ findLat($property_id)->inspection_date }}">
          <input type="time" class="form-control mt-4" name="time" value="{{ findLat($property_id)->inspection_time }}">
          <input type="hidden" name="id" value="{{ $property_id }}">
          <button type="submit" class="btn btn-success mt-4">Save Change</button>
        </form>

      </div>
    </div>
</div>

@endsection



@section('extra_js')
  <script>

  var property_lat = $('#lat').val();
  var property_long = $('#long').val();

  var user_lat = $('#user_lat').val();
  var user_long = $('#user_long').val();

  var mymap = L.map('mapid').setView([33.8688, 151.2093], 13);
  console.log(mymap);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(mymap);

  var control = L.Routing.control({
    waypoints: [
      //from
      L.latLng(user_lat, user_long),

      //to
      L.latLng(property_lat, property_long)
    ],

    router: new L.Routing.osrmv1({
      language: 'en',
      profile: 'car'
    }),
    geocoder: L.Control.Geocoder.nominatim({})
  }).addTo(mymap);

  </script>
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
