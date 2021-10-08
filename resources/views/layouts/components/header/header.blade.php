<header id="ts-header" class="fixed-top">

    <!-- SECONDARY NAVIGATION
    =============================================================================================================-->
    <nav id="ts-secondary-navigation" class="navbar p-0">
        <div class="container justify-content-end justify-content-sm-between">

            <!--Left Side-->
            <div class="navbar-nav d-none d-sm-block">
                <!--Phone-->
                <span class="mr-4">
                        <i class="fa fa-phone-square mr-1"></i>
                        +1 123 456 789
                    </span>
                <!--Email-->
                <a href="#">
                    <i class="fa fa-envelope mr-1"></i>
                    hello@example.com
                </a>
            </div>

            <!--Right Side-->
            <div class="navbar-nav flex-row">

                <!--Search Input-->
                <input type="text" class="form-control p-2 border-left bg-transparent w-auto" placeholder="Search">

                <!--Currency Select-->
                <select class="custom-select bg-transparent ts-text-small border-left" id="currency" name="currency">
                    <option value="1">GBP</option>
                    <option value="2">USD</option>
                    <option value="3">EUR</option>
                </select>

                <!--Language Select-->
                <select class="custom-select bg-transparent ts-text-small border-left border-right" id="language" name="language">
                    <option value="1">EN</option>
                    <option value="2">FR</option>
                    <option value="3">DE</option>
                </select>

            </div>
            <!--end navbar-nav-->
        </div>
        <!--end container-->
    </nav>

    <!--PRIMARY NAVIGATION
    =============================================================================================================-->
    <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
        <div class="container">

            <!--Brand Logo-->
            <a class="navbar-brand" href="{{ route('welcome') }}">
                Loyal Partners
            </a>

            <!--Responsive Collapse Button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--Collapsing Navigation-->
            <div class="collapse navbar-collapse" id="navbarPrimary">

                <!--LEFT NAVIGATION MAIN LEVEL
                =================================================================================================-->
                <ul class="navbar-nav">

                    <!--HOME (Main level)
                    =============================================================================================-->
                    <li class="nav-item ts-has-child">

                        <!--Main level link-->
                        <a class="nav-link active" href="#">
                            Home
                            <span class="sr-only">(current)</span>
                        </a>

                        <!-- List (1st level) -->
                        <ul class="ts-child">

                            <!-- MAP (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Map</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <!-- OPENSTREETMAP (2nd level level)
                                    =============================================================================-->
                                    <li class="nav-item ts-has-child">

                                        <a href="#" class="nav-link">OpenStreetMap</a>

                                        <!--List (3rd level) -->
                                        <ul class="ts-child">

                                            <li class="nav-item">
                                                <a href="index-map-leaflet-fullscreen.html" class="nav-link">Full Screen</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-leaflet-form-bottom.html" class="nav-link">Form Bottom</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-leaflet-half-map.html" class="nav-link">Half Map</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-leaflet-left-results.html" class="nav-link">Left Results</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <!--end OpenStreetMap-->

                                    <!-- MAPBOX (2nd level level)
                                    =============================================================================-->
                                    <li class="nav-item ts-has-child">

                                        <a href="#" class="nav-link">MapBox</a>

                                        <!--List (3rd level) -->
                                        <ul class="ts-child">

                                            <li class="nav-item">
                                                <a href="index-map-mapbox-fullscreen.html" class="nav-link">Full Screen</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-mapbox-form-bottom.html" class="nav-link">Form Bottom</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-mapbox-half-map.html" class="nav-link">Half Map</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-mapbox-left-results.html" class="nav-link">Left Results</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <!--end MapBox-->

                                    <!-- GOOGLE (2nd level level)
                                    =============================================================================-->
                                    <li class="nav-item ts-has-child">

                                        <a href="#" class="nav-link">Google</a>

                                        <!--List (3rd level) -->
                                        <ul class="ts-child">

                                            <li class="nav-item">
                                                <a href="index-map-google-fullscreen.html" class="nav-link">Full Screen</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-google-form-bottom.html" class="nav-link">Form Bottom</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-google-half-map.html" class="nav-link">Half Map</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-google-left-results.html" class="nav-link">Left Results</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <!--end Google-->

                                    <!-- HERE (2nd level level)
                                    =============================================================================-->
                                    <li class="nav-item ts-has-child">

                                        <a href="#" class="nav-link">Here</a>

                                        <!--List (3rd level) -->
                                        <ul class="ts-child">

                                            <li class="nav-item">
                                                <a href="index-map-here-fullscreen.html" class="nav-link">Full Screen</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-here-form-bottom.html" class="nav-link">Form Bottom</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-here-half-map.html" class="nav-link">Half Map</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-here-left-results.html" class="nav-link">Left Results</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <!--end Here-->

                                    <!-- BING (2nd level level)
                                    =============================================================================-->
                                    <li class="nav-item ts-has-child">

                                        <a href="#" class="nav-link">Bing</a>

                                        <!--List (3rd level) -->
                                        <ul class="ts-child">

                                            <li class="nav-item">
                                                <a href="index-map-bing-fullscreen.html" class="nav-link">Full Screen</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-bing-form-bottom.html" class="nav-link">Form Bottom</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-bing-half-map.html" class="nav-link">Half Map</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="index-map-bing-left-results.html" class="nav-link">Left Results</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <!--end Bing-->

                                </ul>
                                <!--end List (2nd level)-->

                            </li>
                            <!--end MAP (1st level)-->

                            <!-- SLIDER (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Slider</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="index-slider.html" class="nav-link">Slider Default</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="index-slider-fullscreen.html" class="nav-link">Full Screen</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="index-slider-form-vertical.html" class="nav-link">Vertical Form</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="index-slider-form-horizontal.html" class="nav-link">Horizontal Form</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end SLIDER (1st level)-->

                            <!-- IMAGE (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Image</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="index-image-form-horizontal-dark.html" class="nav-link">Horizontal Form</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="index-image-form-vertical-light.html" class="nav-link">Vertical Form</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="index-image-fullscreen.html" class="nav-link">Full Screen</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="index-video-background.html" class="nav-link">Video Background</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end SLIDER (1st level)-->

                        </ul>
                        <!--end List (1st level) -->

                    </li>
                    <!--end HOME nav-item-->

                    <!--LISTING (Main level)
                    =============================================================================================-->
                    <li class="nav-item ts-has-child">

                        <!--Main level link-->
                        <a class="nav-link" href="#">Listing</a>

                        <!-- List (1st level) -->
                        <ul class="ts-child">

                            <!-- CATEGORY ICONS (1st level)
                            =====================================================================================-->
                            <li class="nav-item">

                                <a href="listing-category-icons.html" class="nav-link">Category Icons</a>

                            </li>
                            <!--end CATEGORY ICONS (1st level)-->

                            <!-- GRID (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Grid</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="listing-grid-3-columns.html" class="nav-link">Grid 3 Columns</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listing-grid-4-columns.html" class="nav-link">Grid 4 Columns</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listing-grid-mixed.html" class="nav-link">Mixed</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listing-grid-sidebar-left.html" class="nav-link">Sidebar Left</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listing-grid-sidebar-right.html" class="nav-link">Sidebar Right</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end GRID (1st level)-->

                            <!-- LIST (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">List</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="listing-list-sidebar-left.html" class="nav-link">Sidebar Left</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listing-list-sidebar-right.html" class="nav-link">Sidebar Right</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listing-list-compact-sidebar.html" class="nav-link">Compact with Sidebar</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end LIST (1st level)-->

                            <!-- PROPERTY (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Property</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="detail-01.html" class="nav-link">Property Detail v1</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="detail-02.html" class="nav-link">Property Detail v2</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="detail-03.html" class="nav-link">Property Detail v3</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end PROPERTY (1st level)-->

                        </ul>
                        <!--end List (1st level) -->

                    </li>
                    <!--end LISTING nav-item-->

                    <!--PAGES (Main level)
                    =============================================================================================-->
                    <li class="nav-item ts-has-child">

                        <!--Main level link-->
                        <a class="nav-link" href="#">Pages</a>

                        <!-- List (1st level) -->
                        <ul class="ts-child">

                            <!-- AGENCY (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Agency</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="agencies-list.html" class="nav-link">Agencies List</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="agency-detail.html" class="nav-link">Agency Detail</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end AGENCY (1st level)-->

                            <!-- AGENTS (1st level)
                            =====================================================================================-->
                            <li class="nav-item ts-has-child">

                                <a href="#" class="nav-link">Agents</a>

                                <!--List (2nd level) -->
                                <ul class="ts-child">

                                    <li class="nav-item">
                                        <a href="agencies-list.html" class="nav-link">Agents List</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="agent-detail-01.html" class="nav-link">Agent Detail v1</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="agent-detail-02.html" class="nav-link">Agent Detail v2</a>
                                    </li>

                                </ul>
                                <!--end List (2nd level) -->

                            </li>
                            <!--end LIST (1st level)-->

                            <!-- EDIT PROPERTY (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="edit-property.html" class="nav-link">Edit Property</a>
                            </li>
                            <!--end EDIT PROPERTY (1st level)-->

                            <!-- FAQ (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="faq.html" class="nav-link">FAQ</a>
                            </li>
                            <!--end FAQ (1st level)-->

                            <!-- LOGIN (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="login.html" class="nav-link">Login</a>
                            </li>
                            <!--end LOGIN (1st level)-->

                            <!-- PRICING (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="pricing.html" class="nav-link">Pricing</a>
                            </li>
                            <!--end PRICING (1st level)-->

                            <!-- REGISTER (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                            <!--end REGISTER (1st level)-->

                            <!-- SUBMIT (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="submit.html" class="nav-link">Submit Property</a>
                            </li>
                            <!--end SUBMIT (1st level)-->

                            <!-- SUBMIT PREVIEW (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="preview.html" class="nav-link">Submit Preview</a>
                            </li>
                            <!--end SUBMIT PREVIEW (1st level)-->

                            <!-- SUBMITTED (1st level)
                            =====================================================================================-->
                            <li class="nav-item">
                                <a href="submitted.html" class="nav-link">Submitted</a>
                            </li>
                            <!--end SUBMITTED(1st level)-->

                        </ul>
                        <!--end List (1st level) -->

                    </li>
                    <!--end PAGES nav-item-->

                    <!--ABOUT US (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.html">About Us</a>
                    </li>
                    <!--end ABOUT US nav-item-->

                    <!--CONTACT (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        <a class="nav-link mr-2" href="contact.html">Contact</a>
                    </li>
                    <!--end CONTACT nav-item-->

                </ul>
                <!--end Left navigation main level-->

                <!--RIGHT NAVIGATION MAIN LEVEL
                =================================================================================================-->
                <ul class="navbar-nav ml-auto">

                    <!--LOGIN (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                        @auth
                          <a class="nav-link" href="{{ route('home') }}">{{ Auth::user()->name }}</a>
                        @endauth

                        @guest
                          <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @endguest

                    </li>

                    <!--REGISTER (Main level)
                    =============================================================================================-->
                    <li class="nav-item">
                      @guest
                        <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
                      @endguest

                    </li>
                    @auth 
                    @if(Auth::user()->role != 'user')
                    <li class="nav-item">
                          <a class="btn btn-outline-primary btn-sm m-1 px-3" href="{{ route('property') }}">
                              <i class="fa fa-plus small mr-2"></i>
                              Add Property
                          </a>
                      </li>
                    @endif
                    @endauth


            


                </ul>
                <!--end Right navigation-->

            </div>
            <!--end navbar-collapse-->
        </div>
        <!--end container-->
    </nav>
    <!--end #ts-primary-navigation.navbar-->

</header>
