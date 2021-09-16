<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    @include('layouts.components.css.css')

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

                <div class="d-block d-sm-flex justify-content-between">

                    <!--Title-->
                    <div class="ts-title mb-0">
                        <h1>{{ findProperty($property_id)->title }}</h1>
                        <h5 class="ts-opacity__90">
                            <i class="fa fa-map-marker text-primary"></i>
                            {{ findProperty($property_id)->type }}
                        </h5>
                    </div>

                    <!--Price-->
                    <h3>
                        <span class="badge badge-primary p-3 font-weight-normal ts-shadow__sm">${{ findProperty($property_id)->price }}</span>

                        @auth
                          @if (Auth::user()->role == 'user')
                            @if ($time == 'rent')
                              <span class="badge badge-primary p-3 font-weight-normal ts-shadow__sm" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter">Rent Now</span>
                            @endif

                            @if ($time == 'active')
                              <span class="badge badge-success p-3 font-weight-normal ts-shadow__sm">Due Paid</span>
                            @endif

                            @if ($time == 'clear_due')
                                <span class="badge badge-warning p-3 font-weight-normal ts-shadow__sm" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter">Clear Due</span>
                            @endif
                          @endif
                        @endauth


                    </h3>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Rent House</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form action="{{ route('order.store') }}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Card Holder Name" required>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Family Member</label>
                                <input type="number" name="member" class="form-control" placeholder="Total Member" required>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Card Number</label>
                                <input type="number" name="card_number" class="form-control" id="exampleInputPassword1" placeholder="Enter Card Number" required>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Expiration (mm/yy)</label>
                                <input type="text" name="expiration" class="form-control" placeholder="12/05/2022" required>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Security Code</label>
                                <input type="number" name="code" class="form-control" placeholder="" required>
                              </div>

                              @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="property_id" value="{{ $property_id }}">
                              @endauth


                              <button type="submit" class="btn btn-primary">Rent</button>
                            </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </section>

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
            <div class="container">
                <div class="row flex-wrap-reverse">

                    <!--LEFT SIDE
                        =============================================================================================-->
                    <div class="col-md-5 col-lg-4">

                        <!--DETAILS
                            =========================================================================================-->
                        <section>
                            <h3>Details</h3>
                            <div class="ts-box">

                                <dl class="ts-description-list__line mb-0">

                                    <dt>ID:</dt>
                                    <dd>#{{ findProperty($property_id)->id }}</dd>

                                    <dt>Category:</dt>
                                    <dd>{{ findProperty($property_id)->type }}</dd>

                                    <dt>Status:</dt>
                                    <dd>{{ findProperty($property_id)->kind }}</dd>

                                    <dt>Area:</dt>
                                    <dd>{{ findProperty($property_id)->area }}<sup>2</sup></dd>

                                    <dt>Rooms:</dt>
                                    <dd>{{ findProperty($property_id)->rooms }}</dd>

                                    <dt>Bathrooms:</dt>
                                    <dd>{{ findProperty($property_id)->bathrooms }}</dd>

                                    <dt>Bedrooms:</dt>
                                    <dd>{{ findProperty($property_id)->Bedrooms }}</dd>

                                    <dt>Garages:</dt>
                                    <dd>{{ findProperty($property_id)->garages }}</dd>

                                </dl>

                            </div>
                        </section>

                        <!--LOCATION
                            =========================================================================================-->
                        <section id="location">
                            <h3>Location</h3>

                            <div class="ts-box p-0">

                                {{-- <div class="ts-map ts-map__detail" id="ts-map-simple"
                                     data-ts-map-leaflet-provider="../../../cartodb-basemaps-%7bs%7d.global.ssl.fastly.net/light_all/%7bz%7d/%7bx%7d/%7by%7d%7br%7d.png"
                                     data-ts-map-zoom="12"
                                     data-ts-map-center-latitude="40.702411"
                                     data-ts-map-center-longitude="-73.556842"
                                     data-ts-map-scroll-wheel="1"
                                     data-ts-map-controls="0"></div> --}}

                                <dl class="ts-description-list__line mb-0 p-4">

                                    <dt><i class="fa fa-map-marker ts-opacity__30 mr-2"></i>Address:</dt>
                                    <dd class="border-bottom pb-2">1350 Arbutus Drive, LD</dd>

                                    <dt><i class="fa fa-phone-square ts-opacity__30 mr-2"></i>Phone:</dt>
                                    <dd class="border-bottom pb-2">+1 602-862-1673</dd>

                                    <dt><i class="fa fa-envelope ts-opacity__30 mr-2"></i>Email:</dt>
                                    <dd class="border-bottom pb-2"><a href="#">hello@property.com</a></dd>

                                    <dt><i class="fa fa-globe ts-opacity__30 mr-2"></i>Website:</dt>
                                    <dd><a href="#">www.property.com</a></dd>

                                </dl>

                            </div>

                        </section>

                        <!--ACTIONS
                        =============================================================================================-->
                        <section id="actions">

                            <div class="d-flex justify-content-between">

                                <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Add to favorites">
                                    <i class="far fa-star"></i>
                                </a>

                                <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Print">
                                    <i class="fa fa-print"></i>
                                </a>

                                <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Add to compare">
                                    <i class="fa fa-exchange-alt"></i>
                                </a>

                                <a href="#" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top" title="Share property">
                                    <i class="fa fa-share-alt"></i>
                                </a>

                            </div>

                        </section>

                    </div>
                    <!--end col-md-4-->

                    <!--RIGHT SIDE
                        =============================================================================================-->
                    <div class="col-md-7 col-lg-8">

                        <!--GALLERY CAROUSEL
                        =============================================================================================-->
                        <section id="gallery-carousel position-relative">

                            <h3>Gallery</h3>

                            <div class="owl-carousel ts-gallery-carousel" data-owl-auto-height="1" data-owl-dots="1" data-owl-loop="1">

                                <!--Slide-->
                                <div class="slide">
                                    <div class="ts-image" data-bg-image="{{ asset('uploads/images') }}/{{ findProperty($property_id)->image }}">

                                    </div>
                                </div>

                            </div>

                        </section>

                        <!--QUICK INFO
                            =========================================================================================-->
                        <section id="quick-info">
                            <h3>Quick Info</h3>

                            <!--Quick Info-->
                            <div class="ts-quick-info ts-box">

                                <!--Row-->
                                <div class="row no-gutters">

                                    <!--Bathrooms-->
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-shower.png">
                                            <h6>Bathrooms</h6>
                                            <figure>{{ findProperty($property_id)->bathrooms }}</figure>
                                        </div>
                                    </div>

                                    <!--Bedrooms-->
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-bed.png">
                                            <h6>Bedrooms</h6>
                                            <figure>{{ findProperty($property_id)->bedrooms }}</figure>
                                        </div>
                                    </div>

                                    <!--Area-->
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-area.png">
                                            <h6>Area</h6>
                                            <figure>{{ findProperty($property_id)->area }}<sup>2</sup></figure>
                                        </div>
                                    </div>

                                    <!--Garages-->
                                    <div class="col-sm-3">
                                        <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-garages.png">
                                            <h6>Garages</h6>
                                            <figure>{{ findProperty($property_id)->garages }}</figure>
                                        </div>
                                    </div>

                                </div>
                                <!--end row-->

                            </div>
                            <!--end ts-quick-info-->

                        </section>

                        <!--DESCRIPTION
                            =========================================================================================-->
                        <section id="description">

                            <h3>Description</h3>

                            <p>
                                {{ findProperty($property_id)->discription }}
                            </p>

                        </section>

                        <!--FEATURES
                            =========================================================================================-->
                        <section id="features">

                            <h3>Features</h3>

                            <ul class="list-unstyled ts-list-icons ts-column-count-4 ts-column-count-sm-2 ts-column-count-md-2">
                                <li>
                                    <i class="fa fa-bell"></i>
                                    Door Bell
                                </li>
                                <li>
                                    <i class="fa fa-wifi"></i>
                                    Wi-Fi
                                </li>
                                <li>
                                    <i class="fa fa-utensils"></i>
                                    Restaurant Nearby
                                </li>
                                <li>
                                    <i class="fa fa-plug"></i>
                                    230V Plugs
                                </li>
                                <li>
                                    <i class="fa fa-wheelchair"></i>
                                    Accessible
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    Phone
                                </li>
                                <li>
                                    <i class="fa fa-train"></i>
                                    Train Station
                                </li>
                                <li>
                                    <i class="fa fa-key"></i>
                                    Secured Key
                                </li>
                            </ul>

                        </section>

                        <!--FLOOR PLANS
                            =========================================================================================-->
                        <section id="floor-plans">

                            <h3>Floor Plans</h3>

                            <!--1st Floor-->
                            <a href="#collapse-floor-1" class="ts-box d-block mb-2 py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-floor-1">
                                1st Floor
                                <div class="collapse" id="collapse-floor-1">
                                    <img src="assets/img/img-floor-plan-01.jpg" alt="" class="w-100">
                                </div>
                            </a>

                            <!--2nd Floor-->
                            <a href="#collapse-floor-2" class="ts-box d-block py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-floor-2">
                                2nd Floor
                                <div class="collapse" id="collapse-floor-2">
                                    <img src="assets/img/img-floor-plan-02.jpg" alt="" class="w-100">
                                </div>
                            </a>

                        </section>

                        <!--VIDEO
                        =============================================================================================-->


                        <!--AMENITIES
                        =============================================================================================-->
                        <section id="amenities">

                            <h3>Amenities</h3>

                            <ul class="ts-list-colored-bullets ts-text-color-light ts-column-count-3 ts-column-count-md-2">
                                <li>Air Conditioning</li>
                                <li>Swimming Pool</li>
                                <li>Central Heating</li>
                                <li>Laundry Room</li>
                                <li>Gym</li>
                                <li>Alarm</li>
                                <li>Window Covering</li>
                                <li>Internet</li>
                            </ul>

                        </section>

                        <!--CONTACT THE AGENT
                        =============================================================================================-->
                        {{-- <section class="contact-the-agent">
                            <h3>Contact the Agent</h3>

                            <div class="ts-box">
                                <div class="row">

                                    <!--Agent Image & Phone-->
                                    <div class="col-md-5">
                                        <div class="ts-center__vertical mb-4">

                                            <!--Image-->
                                            <a href="agent-detail-01.html" class="ts-circle p-5 mr-4 ts-shadow__sm" data-bg-image="assets/img/img-person-05.jpg"></a>

                                            <!--Phone contact-->
                                            <figure class="mb-0">
                                                <h5 class="mb-0">Jane Brown</h5>
                                                <p class="mb-0">
                                                    <i class="fa fa-phone-square ts-opacity__50 mr-2"></i>
                                                    +1 602-862-1673
                                                </p>
                                            </figure>

                                        </div>

                                        <hr>

                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam eu diam eu dolor sodales consectetur
                                        </p>

                                    </div>

                                    <!--Agent contact form-->
                                    {{-- <div class="col-md-7">
                                        <h4>Contact Me</h4>
                                        <form id="form-agent" class="ts-form">

                                            <!--Name-->
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                            </div>

                                            <!--Email-->
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                            </div>

                                            <!--Message-->
                                            <div class="form-group">
                                                <textarea class="form-control" id="form-contact-message" rows="3" name="message" placeholder="Hi, I want to have more information about property #156461"></textarea>
                                            </div>

                                            <!--Submit button-->
                                            <div class="form-group clearfix mb-0">
                                                <button type="submit" class="btn btn-primary float-right" id="form-contact-submit">Send a Message
                                                </button>
                                            </div>

                                        </form>
                                    </div> --}}

                                </div>
                                <!--end row-->
                            </div>
                            <!--end ts-box-->
                        </section> --}}

                    </div>
                    <!--end col-md-8-->

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>

        <!--SIMILAR PROPERTIES
        =============================================================================================================-->
        {{-- <section id="similar-properties">
            <div class="container">
                <div class="row">

                    <div class="offset-lg-4 col-sm-12 col-lg-8">

                        <hr class="my-5">

                        <h3>Similar Properties</h3>

                        <!--Item-->
                        <div class="card ts-item ts-item__list ts-card">

                            <!--Ribbon-->
                            <div class="ts-ribbon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img" data-bg-image="assets/img/img-item-thumb-01.jpg"></a>

                            <!--Card Body-->
                            <div class="card-body">

                                <figure class="ts-item__info">
                                    <h4>Big Luxury Apartment</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        1350 Arbutus Drive
                                    </aside>
                                </figure>

                                <div class="ts-item__info-badge">
                                    $350,000
                                </div>

                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>

                        <!--Item-->
                        <div class="card ts-item ts-item__list ts-card">

                            <!--Ribbon-->
                            <div class="ts-ribbon-corner">
                                <span>Updated</span>
                            </div>

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="assets/img/img-item-thumb-02.jpg"></a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">

                                <figure class="ts-item__info">
                                    <h4>Cozy Design Studio</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4831 Worthington Drive
                                    </aside>
                                </figure>

                                <div class="ts-item__info-badge">$125,000</div>

                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer ts-item__footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>

                        <!--Item-->
                        <div class="card ts-item ts-item__list ts-card">

                            <!--Card Image-->
                            <a href="detail-01.html" class="card-img ts-item__image" data-bg-image="assets/img/img-item-thumb-03.jpg"></a>

                            <!--Card Body-->
                            <div class="card-body ts-item__body">

                                <figure class="ts-item__info">
                                    <h4>Family Villa</h4>
                                    <aside>
                                        <i class="fa fa-map-marker mr-2"></i>
                                        4127 Winding Way
                                    </aside>
                                </figure>

                                <div class="ts-item__info-badge">$45,900</div>

                                <div class="ts-description-lists">
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>325m<sup>2</sup></dd>
                                    </dl>
                                    <dl>
                                        <dt>Bedrooms</dt>
                                        <dd>2</dd>
                                    </dl>
                                    <dl>
                                        <dt>Bathrooms</dt>
                                        <dd>1</dd>
                                    </dl>
                                </div>
                            </div>

                            <!--Card Footer-->
                            <a href="detail-01.html" class="card-footer ts-item__footer">
                                <span class="ts-btn-arrow">Detail</span>
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </section> --}}

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

</body>


</html>
