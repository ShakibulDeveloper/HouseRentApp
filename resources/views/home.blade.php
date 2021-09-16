@extends('layouts.app')

@section('extra_css')
  	<style>
  		#map {
  			width: 600px;
  			height: 400px;
  		}
  	</style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
@endsection



@section('content')

  @if (Auth::user()->role == 'user')

    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          @if (session('update'))
            <div class="alert alert-success">
              {{ session('update') }}
            </div>

            @else
          @endif


          @forelse (userOrders(Auth::user()->id) as $order)

            @if ($order->to >= Carbon\Carbon::today())

              @else
                <div class="alert alert-warning mt-4 mb-4" role="alert">
                  Notice: Please Clear Your Due! <a href="{{ route('property.details', $order->property_id) }}">Click Here</a>
                </div>
            @endif



          @empty

          @endforelse
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <b>USER</b> DASHBOARD
            </div>
            <div class="card-body">
              <h5 class="card-title">Welcome,</h5>
              <h1 class="card-text">{{ Auth::user()->name }}</h1>
              <a href="{{ route('user.profile', Auth::user()->id) }}" class="btn btn-primary">Profile</a>
              <a href="{{ route('user.profile.update', Auth::user()->id) }}" class="btn btn-warning">Update</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  @if (Auth::user()->role == 'manager')

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <b>MANAGER</b> DASHBOARD
            </div>
            <div class="card-body">
              <h5 class="card-title">Welcome,</h5>
              <h1 class="card-text">{{ Auth::user()->name }}</h1>
              <a href="{{ route('user.profile', Auth::user()->id) }}" class="btn btn-primary">Profile</a>
              <a href="{{ route('user.profile.update', Auth::user()->id) }}" class="btn btn-warning">Update</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    @else

  @endif

  @if (Auth::user()->role == 'admin')

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <b>ADMIN</b> DASHBOARD
            </div>
            <div class="card-body">
              <h5 class="card-title">Welcome,</h5>
              <h1 class="card-text">{{ Auth::user()->name }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    @else

  @endif

@endsection



@section('extra_js')
  <script>
  var mymap = L.map('mapid').setView([33.8688, 151.2093], 13);
  console.log(mymap);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(mymap);

  var control = L.Routing.control({
    waypoints: [
      //from
      L.latLng(-33.8688, 151.2093),

      //to
      L.latLng(-33.79698081, 151.28534317)
    ],

    router: new L.Routing.osrmv1({
      language: 'en',
      profile: 'car'
    }),
    geocoder: L.Control.Geocoder.nominatim({})
  }).addTo(mymap);

  </script>
@endsection
