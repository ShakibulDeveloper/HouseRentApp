@extends('layouts.app')

@section('extra_css')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
@endsection



@section('content')

  @if (Auth::user()->role == 'manager')
    <div class="container">
    <div class="row">

    @forelse (getAllProperty() as $property)
      <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{ asset('uploads/images') }}/{{ $property->image }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $property->title }}</h5>
            <a href="{{ route('property.details', $property->id) }}" class="btn btn-secondary">Details</a>
            <a href="{{ route('property.inspection', $property->id) }}" class="btn btn-warning">Inspection</a>
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

  @endif

@endsection
