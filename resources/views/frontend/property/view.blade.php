<!doctype html>
<html lang="en">


<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

  @include('layouts.components.css.css')

	<style type="text/css">
	#lat, #lon { text-align:right }
	#map { width:100%;height:600px;padding:0;margin:0; }
	.address { cursor:pointer }
	.address:hover { color:#AA0000;text-decoration:underline }
	</style>

	<title>Loyal Properties</title>

</head>

<body>

<!-- WRAPPER
    =================================================================================================================-->
<div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">

    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    @include('layouts.components.header.header')
    <!--end Header-->

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">

        <!--BREADCRUMB
            =========================================================================================================-->


        <!--PAGE TITLE
            =========================================================================================================-->

        <!--SUBMIT FORM
            =========================================================================================================-->
        <section id="submit-form">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-1 col-lg-10">

											@guest
												<!--ALERT
														=====================================================================================-->
												<section id="alert">
														<div class="alert alert-primary p-5 d-block d-sm-flex align-items-center mb-5" role="alert" data-bg-color="rgba(230,230,255,.2)">

																<!--ICON-->
																<i class="fa fa-exclamation-triangle display-4 font-weight-bold ts-opacity__30 mr-5 py-2"></i>

																<!--CONTENT-->
																<aside>
																		<h5 class="font-weight-normal">Please Login Or Register</h5>
																		<p>
																			First, You need to sign in before adding a property!
																		</p>
																		<a href="{{ route('register') }}" class="btn btn-light btn-xs">Register</a>
																		<a href="{{ route('login') }}" class="btn btn-light btn-xs">Login</a>
																</aside>
														</div>
														<!--end alert-->

												</section>
											@endguest


												@auth
													<form id="form-submit" method="post" action="{{ route('property.store') }}" class="ts-form" enctype="multipart/form-data">
														@csrf
	                            <!--BASIC INFORMATION
	                                =====================================================================================-->
	                            <section id="basic-information" class="mb-5">


																	@if (session('sucess'))
																		<div class="alert alert-success" role="alert">
	  																	<span>{{ session('sucess') }}</span>
																		</div>
																		@else
																	@endif

																	@if ($errors->any())
																		<div class="alert alert-danger" role="alert">
																			@forelse ($errors->all() as $error)
																				*<span>{{ $error }}</span><br>
																			@empty

																			@endforelse

																		</div>
																		@else
																	@endif

	                                <!--Title-->
	                                <h3 class="text-muted border-bottom">Basic Information</h3>

	                                <!--Row-->
	                                <div class="row">

	                                    <!--Title-->
	                                    <div class="col-sm-8">
	                                        <div class="form-group">
	                                            <label for="title">Title</label>
	                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
	                                        </div>
	                                    </div>

	                                    <!--Price-->
	                                    <div class="col-sm-4">
	                                        <div class="input-group">
	                                            <label for="price">Price</label>
	                                            <input type="text" class="form-control border-right-0" name="price" id="price" value="{{ old('price') }}">
	                                            <div class="input-group-append">
	                                                <span class="input-group-text bg-white border-left-0">$</span>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <div class="col-sm-12 col-md-4">

	                                        <div class="row">

	                                            <!--Area-->
	                                            <div class="col">
	                                                <div class="input-group">
	                                                    <label for="area">Area</label>
	                                                    <input type="text" class="form-control border-right-0" name="area" id="area" value="{{ old('area') }}">
	                                                    <div class="input-group-append">
	                                                        <span class="input-group-text bg-white border-left-0">m<sup>2</sup></span>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <!--Rooms-->
	                                            <div class="col">
	                                                <div class="form-group">
	                                                    <label for="rooms">Rooms</label>
	                                                    <input type="number" class="form-control" id="rooms" name="rooms" min="0" value="{{ old('rooms') }}">
	                                                </div>
	                                            </div>

	                                        </div>
	                                        <!--end row-->

	                                    </div>
	                                    <!--end col-md-4-->

	                                    <!--Type Select-->
	                                    <div class="col-sm-6 col-md-4">
	                                        <div class="form-group">
	                                            <label for="type">Type</label>
	                                            <select class="custom-select" id="type" name="type">
	                                                <option value="">Select Type</option>
	                                                <option value="Apartment">Apartment</option>
	                                                <option value="Villa">Villa</option>
	                                                <option value="Land">Land</option>
	                                                <option value="Garage">Garage</option>
	                                            </select>
	                                        </div>
	                                    </div>

	                                    <!--Status Select-->
	                                    <div class="col-sm-6 col-md-4">
	                                        <div class="form-group">
	                                            <label for="status">Status</label>
	                                            <select class="custom-select" id="status" name="kind">
	                                                <option value="">Select Status</option>
	                                                <option value="Sale">Sale</option>
	                                                <option value="Rent">Rent</option>
	                                            </select>
	                                        </div>
	                                    </div>

	                                </div>
	                                <!--end row-->
	                            </section>

	                            <!--LOCATION
	                                =====================================================================================-->
	                            <section id="location" class="mb-5">

	                                <!--Title-->
	                                <h3 class="text-muted border-bottom">Location</h3>

	                                <div class="row">


	                                    <div class="col-lg-12">
																            <input type="hidden" name="lat" id="lat" size=12 value="">
																            <input type="hidden" name="lon" id="lon" size=12 value="">

																        <b>Location (Search or use marker on map)</b>
																        <div id="search">
																            <input type="text" name="addr" name="location" class="form-control" value="" id="addr" size="58" />
																            <button type="button" class="btn btn-primary custom-sb-2" onclick="addr_search();">Click to find</button>
																            <div id="results"></div>
																        </div>

																        <br />

																        <div id="map"></div>


	                                    </div>

	                                </div>
	                                <!--end row-->
	                            </section>
	                            <!--end #location-->

	                            <!--GALLERY
	                                =====================================================================================-->
	                            <section id="gallery" class="mb-5">

	                                <!--Title-->
	                                <h3 class="text-muted border-bottom">Gallery</h3>

	                                <!--File upload-->
	                                <div class="file-upload-previews"></div>
	                                <div class="file-upload">
																		<label for="formFile" class="form-label">Property Image</label>
																		<input class="form-control" type="file" id="formFile" name="image">
	                                </div>

	                            </section>

	                            <!--ADDITIONAL INFORMATION
	                                =====================================================================================-->
	                            <section id="additional-information" class="mb-5">

	                                <!--Title-->
	                                <h3 class="text-muted border-bottom">Additional Information</h3>

	                                <!--Description-->
	                                <div class="form-group">
	                                    <label for="description">Description</label>
	                                    <textarea class="form-control" id="description" rows="4" name="discription"></textarea>
	                                </div>

	                                <!--Row-->
	                                <div class="row">

	                                    <!--Bedrooms-->
	                                    <div class="col-sm-4">
	                                        <div class="form-group">
	                                            <label for="bedrooms">Bedrooms</label>
	                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms" min="0" value="{{ old('bedrooms') }}">
	                                        </div>
	                                    </div>

	                                    <!--Bathrooms-->
	                                    <div class="col-sm-4">
	                                        <div class="form-group">
	                                            <label for="bathrooms">Bathrooms</label>
	                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms" min="0" value="{{ old('bathrooms') }}">
	                                        </div>
	                                    </div>

	                                    <!--Garages-->
	                                    <div class="col-sm-4">
	                                        <div class="form-group">
	                                            <label for="garages">Garages</label>
	                                            <input type="number" class="form-control" id="garages" name="garages" min="0" value="{{ old('garages') }}">
	                                        </div>
	                                    </div>

																			<div class="col-sm-4">
	                                        <div class="form-group">
	                                            <label for="garages">Inspection date</label>
	                                            <input type="date" class="form-control" name="inspection_date" value="{{ old('inspection_date') }}">
	                                        </div>
	                                    </div>

																			<div class="col-sm-4">
																					<div class="form-group">
																							<label for="garages">Inspection Time</label>
																							<input type="time" class="form-control" name="inspection_time" value="{{ old('inspection_time') }}">
																					</div>
																			</div>
	                                </div>
	                                <!--end row-->
	                                <!--end #features-checkboxes-->

	                            </section>
	                            <!--end #additional-information-->

	                            <hr>

	                            <section class="py-3">
	                                <button type="submit" class="btn btn-primary ts-btn-arrow btn-lg float-right">Add Property
	                                </button>
	                            </section>

	                        </form>
												@endauth
                        <!--end #form-submit-->

                    </div>
                    <!--end offset-lg-1 col-lg-10-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

    </main>
    <!--end #ts-main-->

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

      @include('layouts.components.footer.index')
    <!--end #ts-footer-->

</div>
<!--end page-->

@include('layouts.components.js.js')


<script type="text/javascript">
        // New York
        var startlat = -33.83705691;
        var startlon = 151.20689392;

        var options = {
            center: [startlat, startlon],
            zoom: 9
        }

        document.getElementById('lat').value = startlat;
        document.getElementById('lon').value = startlon;

        var map = L.map('map', options);
        var nzoom = 12;

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'OSM'
        }).addTo(map);

        var myMarker = L.marker([startlat, startlon], {
            title: "Coordinates",
            alt: "Coordinates",
            draggable: true
        }).addTo(map).on('dragend', function() {
            var lat = myMarker.getLatLng().lat.toFixed(8);
            var lon = myMarker.getLatLng().lng.toFixed(8);
            var czoom = map.getZoom();
            if (czoom < 18) {
                nzoom = czoom + 2;
            }
            if (nzoom > 18) {
                nzoom = 18;
            }
            if (czoom != 18) {
                map.setView([lat, lon], nzoom);
            } else {
                map.setView([lat, lon]);
            }
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lon;
            myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        });

        function chooseAddr(lat1, lng1) {
            myMarker.closePopup();
            map.setView([lat1, lng1], 18);
            myMarker.setLatLng([lat1, lng1]);
            lat = lat1.toFixed(8);
            lon = lng1.toFixed(8);
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lon;
            myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
        }

        function myFunction(arr) {
            var out = "<br />";
            var i;

            if (arr.length > 0) {
                for (i = 0; i < arr.length; i++) {
                    out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
                }
                document.getElementById('results').innerHTML = out;
            } else {
                document.getElementById('results').innerHTML = "Sorry, no results...";
            }

        }

        function addr_search() {
            var inp = document.getElementById("addr");
            var xmlhttp = new XMLHttpRequest();
            var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);
                    myFunction(myArr);
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

    </script>

</body>

</html>
