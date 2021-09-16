<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    @include('layouts.components.css.css')

    <title>Loyal Properties - Profile</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <style media="screen">
    .ts-box{
      height: 1220px;
    }
    .ts-circle__xxl {
      position: relative;
      top: -230px;
    }

    #lat,
    #lon {
        text-align: right
    }

    #map {
        width: 100%;
        height: 50%;
        padding: 0;
        margin: 0;
    }

    .address {
        cursor: pointer
    }

    .address:hover {
        color: #AA0000;
        text-decoration: underline
    }
    </style>

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



           <!--PAGE TITLE
               =========================================================================================================-->

           <!--AGENCY INFO
               =========================================================================================================-->
           <section id="agency-info">
               <div class="container">

                   <!--Box-->
                   <div class="ts-box">


                       <!--Row-->
                       <div class="row">

                           <!--Brand-->
                           <div class="col-md-4 ts-center__both">
                               <div class="ts-circle__xxl ts-shadow__md">
                                 @if (findUser($user_id)->image != null)
                                    <img src="{{ asset('uploads/user') }}/{{ findUser($user_id)->image }}" alt="" class="img-fluid">
                                 @endif

                               </div>
                           </div>

                           <!--Description-->
                           <div class="col-md-8">

                               <div class="py-4">

                                   <!--Title-->
                                   <div class="ts-title mb-2">
                                       <h2 class="mb-1">{{ findUser($user_id)->name }}</h2>
                                       <h5>
                                           <i class="fa fa-map-marker mr-2"></i>

                                           @if (checkProfile($user_id)->count() > 0)
                                             {{ findProfile($user_id)->country }}
                                             @else
                                               N/A
                                           @endif

                                       </h5>
                                   </div>

                                   <!--Row-->
                                   <div class="row">

                                       <div class="col-md-7">
                                           <p>

                                             @if (checkProfile($user_id)->count() > 0)
                                               {{ findProfile($user_id)->bio }}
                                               @else
                                                 N/A
                                             @endif
                                           </p>
                                       </div>

                                       <div class="col-md-5 ts-opacity__50">

                                           <!--Phone-->
                                           <figure class="mb-1">
                                               <i class="fa fa-phone-square mr-2"></i>
                                               @if (checkProfile($user_id)->count() > 0)
                                                 {{ findProfile($user_id)->phone }}
                                                 @else
                                                   N/A
                                               @endif
                                           </figure>

                                           <!--Mail-->
                                           <figure class="mb-1">
                                               <i class="fa fa-envelope mr-2"></i>

                                               @if (checkProfile($user_id)->count() > 0)
                                                  <a href="#">{{ findUser($user_id)->email }}</a>
                                                 @else
                                                   N/A
                                               @endif
                                           </figure>

                                           <!--Skype-->
                                           <figure class="mb-0">
                                               <i class="fa fa-user mr-2"></i>

                                               @if (checkProfile($user_id)->count() > 0)
                                                 {{ findProfile($user_id)->family_member }} Family Members
                                                 @else
                                                   N/A
                                               @endif
                                           </figure>

                                       </div>

                                   </div>
                                   <!--end row-->
                               </div>
                               <!--end p-4-->

                               <div class="ts-bg-light p-3 ts-border-radius__md d-block d-sm-flex ts-center__vertical justify-content-between ts-xs-text-center">
                                   <small class="ts-opacity__50">Member since: {{ findUser($user_id)->created_at->format('d-m-Y') }}</small>
                               </div>


                               <div class="ts-title mb-2 mt-5">
                                   <h2 class="mb-1">Contact Details</h2>
                               </div>

                               <p>Email: {{ findUser($user_id)->email }}</p>

                               @if (checkProfile($user_id)->count() > 0)
                                 <p>Phone: {{ findProfile($user_id)->phone }}</p>
                                 @else
                                   <p>Phone: N/A</p>
                               @endif



                               <div class="ts-title mb-2 mt-5">
                                   <h2 class="mb-1">Address Details</h2>
                               </div>
                               @if (checkProfile($user_id)->count() > 0)
                                 <p>Address 1: {{ findProfile($user_id)->Address_1 }}</p>
                                 <p>Address 2: {{ findProfile($user_id)->Address_2 }}</p>
                                 @else
                                   <p>Address 1: N/A</p>
                                   <p>Address 2: N/A</p>
                               @endif



                               <div class="ts-title mb-2 mt-5">
                                   <h2 class="mb-1">Location</h2>
                               </div>
                              <form>
                                  <input type="hidden" name="lat" id="lat" size=12 value="">
                                  <input type="hidden" name="lon" id="lon" size=12 value="">
                              </form>

                              <div id="map"></div>


                           </div>
                           <!--end col-md-8-->
                       </div>
                       <!--end row-->
                   </div>
                   <!--end ts-box-->

               </div>
               <!--end container-->
           </section>
           <!--end #agency-info-->

           <!--ITEMS LISTING & SEARCH
               =========================================================================================================-->


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
    var startlat = {{ findUser($user_id)->latitude }};
    var startlon = {{ findUser($user_id)->longitute }};

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
