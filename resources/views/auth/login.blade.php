<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    @include('layouts.components.css.css')

    <style type="text/css">

        #lat,
        #lon {
            text-align: right
        }

        #map {
            width: 100%;
            height: 300px;
            padding: 0;
            margin: 0;
            margin-bottom: 20px;
        }

        .address {
            cursor: pointer
        }

        .address:hover {
            color: #AA0000;
            text-decoration: underline
        }

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
        <section id="breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!--PAGE TITLE
            =========================================================================================================-->
        <section id="page-title">
            <div class="container">
                <div class="ts-title">
                    <h1>Login</h1>

                </div>
            </div>
        </section>

        <!--LOGIN / REGISTER SECTION
            =========================================================================================================-->
        <section id="login-register">
            <div class="container">
                <div class="row">

                    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-6">

                        @if (session('success'))

                          <div class="alert alert-success" role="alert">
                            {{ session('success') }}
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
                        <!--LOGIN / REGISTER TABS
                            =========================================================================================-->
                        <ul class="nav nav-tabs" id="login-register-tabs" role="tablist">

                            <!--Login tab-->
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">
                                    <h3>Login</h3>
                                </a>
                            </li>

                            <!--Register tab-->
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">
                                    <h3>Register</h3>
                                </a>
                            </li>

                        </ul>

                        <!--TAB CONTENT
                            =========================================================================================-->
                        <div class="tab-content">

                            <!--LOGIN TAB
                                =====================================================================================-->
                            <div class="tab-pane active" id="login" role="tabpanel" aria-labelledby="login-tab">

                                <!--Login form-->
                                <form method="POST" action="{{ route('login') }}" class="ts-form" id="form-login">
                                  @csrf
                                    <!--Email-->
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="login-email" placeholder="Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" name="password" class="form-control border-right-0" placeholder="Password" required>
                                        <div class="input-group-append">
                                            <a href="#" class="input-group-text bg-white border-left-0 ts-password-toggle">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--Checkbox and Submit button-->
                                    <div class="ts-center__vertical justify-content-between">

                                        <!--Remember checkbox-->
                                        <div class="custom-control custom-checkbox mb-0">
                                            <input type="checkbox" class="custom-control-input" id="login-check">
                                            <label class="custom-control-label" for="login-check">Remember Me</label>
                                        </div>

                                        <!--Submit button-->
                                        <button type="submit" class="btn btn-primary">Login</button>

                                    </div>

                                    <hr>

                                    <!--Forgot password link-->
                                    <a href="#" class="ts-text-small">
                                        <i class="fa fa-sync-alt ts-text-color-primary mr-2"></i>
                                        <span class="ts-text-color-light">I have forgot my password</span>
                                    </a>

                                </form>

                            </div>
                            <!--end #login.tab-pane-->

                            <!--REGISTER TAB
                                =====================================================================================-->
                            <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="register-tab">

                                <!--Register tab-->
                                <form class="ts-form" method="post" action="{{ route('user.register') }}" id="form-register">
                                  @csrf
                                    <!--Name-->
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="register-name" placeholder="Username" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--Email-->
                                    <div class="form-group">
                                        <input type="email" name="custom_email" class="form-control" id="register-email" placeholder="Email" required>
                                        @error('custom_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" name="custom_password" class="form-control border-right-0" placeholder="Password" required>

                                        <div class="input-group-append">
                                            <a href="#" class="input-group-text bg-white border-left-0 ts-password-toggle">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        @error('custom_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--Repeat Password-->
                                    <div class="input-group ts-has-password-toggle">
                                        <input type="password" name="password_confirmation" class="form-control border-right-0" placeholder="Repeat Password" required>
                                        <div class="input-group-append">
                                            <a href="#" class="input-group-text bg-white border-left-0 ts-password-toggle">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                        </div>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="">Select Role</label>
                                    <div class="form-group">
                                        <select class="form-control" name="role">
                                          <option value="admin">Admin</option>
                                          <option value="manager">Manager</option>
                                          <option value="user">User</option>
                                        </select>
                                    </div>


                                            <input type="hidden" name="lat" id="lat" size=12 value="">
                                            <input type="hidden" name="lon" id="lon" size=12 value="">

                                        <b>Address Lookup</b>
                                        <div id="search">
                                            <input type="text" class="form-control" name="addr" value="" id="addr" size="58" />
                                            <button type="button" class="btn btn-primary custom-sb-3" onclick="addr_search();">Search</button>
                                            <div id="results"></div>
                                        </div>

                                        <br />

                                        <div id="map"></div>


                                    <!--Submit button-->
                                    <button type="submit" class="btn btn-primary">Register</button>

                                </form>

                            </div>
                            <!--end #register.tab-pane-->
                        </div>
                        <!--end tab-content-->

                    </div>
                    <!--end offset-4.col-md-4-->

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
            zoom: 10
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
