@extends('layouts.template')
@section('title')
@endsection

<!--Opening Section-->
@section('OpeningContent')
    <div class="openingdescripton">
        <h2>Welcome to</h2>
        <h1>Bulla Crave Laundry Lounge Bataan</h1>
        <p>Welcome to Bulla Crave Laundry Lounge Bataan Branch, where doing laundry is no longer a chore but a premium
            experience. We’ve
            partnered with LG to bring you state-of-the-art washers and dryers, ensuring superior cleaning performance,
            energy efficiency, and fabric care. While your clothes get the best treatment, you can sit back and relax in our
            modern, cozy lounge designed for your comfort.</p>
    </div>
@endsection

@section('LandingContent')
    <!-- Landing Photo-->
    <div class="carousel-container">
        <div class="overlay-text">
            <h1>Bulla Crave Laundry Lounge Bataan</h1>
            <h2>Experience hassle-free laundry in a cozy lounge designed for your convenience.</h2>
        </div>
        <a href="#" class="visit-button">Visit Us Today!</a>

        <div class="landing-carousel">
            <div class="carousel-container">
                <div class="slide1">
                    <img src="{{ asset('images/Location3.jpg') }}">
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Details Section -->
<!--Welcome Slider-->
<!--Slider Content-->
@section('WelcomeContent')
    <div class="welcometitle">
        <h1><br>Visit Our Laundry Lounge Today!</h1>
    </div>
    <section class="welcomecontainer">
        <div class="storephotos">
            <div class="carousel slide carousel-fade" id="carouselslider" data-bs-wrap="true" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100 view-image-btn"
                            data-img-src="{{ asset('images/Location3.jpg') }}" style="cursor: pointer;" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/Location2.jpg') }}" class="d-block w-100 view-image-btn"
                            data-img-src="{{ asset('images/Location2.jpg') }}" style="cursor: pointer;" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/Location1.jpg') }}" class="d-block w-100 view-image-btn"
                            data-img-src="{{ asset('images/Location1.jpg') }}" style="cursor: pointer;" />
                    </div>
                </div>

                <!--Carousel Arrows-->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselslider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselslider" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

                <!--Carousel Indicators-->
                <div class="carousel-indicators">
                    <button type="button" class="active" data-bs-target="#carouselslider" data-bs-slide-to="0">
                        <img src="{{ asset('images/Location3.jpg') }}" />
                    </button>
                    <button type="button" data-bs-target="#carouselslider" data-bs-slide-to="1">
                        <img src="{{ asset('images/Location2.jpg') }}" />
                    </button>

                    <button type="button" data-bs-target="#carouselslider" data-bs-slide-to="2">
                        <img src="{{ asset('images/Location1.jpg') }}" />
                    </button>
                </div>
            </div>
        </div>
        <div class="welcomedescription">
            <h1>Bataan Laundry Lounge</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into
                electronic typesetting, remaining essentially unchanged.</p>
            <button class="ReadMore">Read More</button>
        </div>
    </section>
@endsection

<!-- Store Information Section -->
@section('StoreInfoContent')
    <section class="store-info">
        <div class="store-content">
            <!-- Left Side: Store Details -->
            <div class="store-details">
                <h1>Store Information</h1>
                <div class="mainunderline"></div>

                <!-- Store Address -->
                <div class="info-block">
                    <h2>Store Address</h2>
                    <div class="sub-underline"></div>
                    <p>123 Sesame Street, Bataan, Philippines</p>
                </div>

                <!-- Store Contact -->
                <div class="info-block">
                    <h2>Store Contact</h2>
                    <div class="sub-underline"></div>
                    <p>Email: example@bullacrave.com <br> Phone: +63 912 345 6789</p>
                </div>

                <!-- Store Hours -->
                <div class="info-block">
                    <h2>Store Hours</h2>
                    <div class="sub-underline"></div>
                    <p>Monday - Saturday: 9:00 AM - 6:00 PM <br>
                        Sunday: <span class="closed">CLOSED</span>
                    </p>
                </div>
            </div>

            <!-- Right Side: Title -->

            <div class="store-details1">
                <h1>Service Pricing</h1>
                <div class="mainunderline1"></div>

                <!-- Right Side: Box Content -->
                <div class="info-box">
                    <div class="pricing-container">

                        <!-- First Pricing Section -->
                        <div class="pricing-info">
                            <h2>Self-Service:</h2>
                            <div class="pricing-sub-underline"></div>
                            <div class="pricing-details">
                                <h2>Wash</h2>
                                <p>Regular Clothes - P70 - Load/8kg Max <br>
                                    Towel/Bedding - P70 - Load/4kg Max
                                </p>
                                <h2>Dry</h2>
                                <p>Regular Clothes - P70 - Load/8kg Max <br>
                                    Towel/Bedding - P70 - Load/4kg Max
                                </p>
                                <h2>Fold</h2>
                                <p>P70 Per Load</p>
                            </div>
                        </div>

                        <!-- Second Pricing Section -->
                        <div class="pricing-info">
                            <h2>Full-Service:</h2>
                            <div class="pricing-sub-underline"></div>
                            <div class="pricing-details">
                                <h2>Wash-Dry-Fold</h2>
                                <p>Regular Clothes - P250 - Load/8kg Max <br>
                                    Towel/Bedding - P250 - Load/4kg Max
                                </p>
                                <h2>Pick-Up & Delivery Fee:</h2>
                                <p>1-5km - P65<br>
                                    6-10km - P95
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection



<!--3D Content Section-->
@section('3DContent')
    <div class="welcometitle">
        <h1><br>Explore Our Sample Custom 3D Layouts
        </h1>
        <p>Visualize your laundry setup before installation with our detailed 3D layouts, designed to maximize space and
            productivity.</p>
    </div>
    <section class="Container3D">
        <div class="Photos3D">
            <div class="carousel slide" id="carousel3D" data-bs-wrap="true" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="{{ asset('images/3D1.png') }}" class="d-block w-100" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/3D2.png') }}" class="d-block w-100" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/3D3.png') }}" class="d-block w-100" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/3D4.png') }}" class="d-block w-100" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/3D5.png') }}" class="d-block w-100" />
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="{{ asset('images/3D6.png') }}" class="d-block w-100" />
                    </div>
                </div>

                <!--3D Carousel Arrows-->
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel3D" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carousel3D" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

                <!--3D Carousel Indicators-->
                <div class="carousel-indicators">
                    <button type="button" class="active" data-bs-target="#carousel3D" data-bs-slide-to="0">
                    </button>
                    <button type="button" data-bs-target="#carousel3D" data-bs-slide-to="1">
                    </button>
                    <button type="button" data-bs-target="#carousel3D" data-bs-slide-to="2">
                    </button>
                    <button type="button" class="active" data-bs-target="#carousel3D" data-bs-slide-to="3">
                    </button>
                    <button type="button" data-bs-target="#carousel3D" data-bs-slide-to="4">
                    </button>
                    <button type="button" data-bs-target="#carousel3D" data-bs-slide-to="5">
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

<!--Product Carousel Section-->
@section('ProductContent')
    <div class=welcometitle>
        <h1>Discover the Perfect Solution for You</h1>
        <p>Explore our premium selection of washers and dryers designed for efficiency and durability. Join the many
            satisfied customers who trust Bulla Crave for their laundry needs.</p>
    </div>
    <section class ="carousel1">
        <div class="prodlogocontainer">
            <div class="prodlogo1">
                <img src="{{ asset(path: 'images/BCMain.png') }}" />
            </div>
            <div class="prodlogo2">
                <img src="{{ asset('images/LGlogo.png') }}" />
            </div>
        </div>
        <div class=productcontent>
            <div class="list">
                <!--ITEM 1-->
                <div class = "item">
                    <img src="{{ asset(path: 'images/LG-Titan.png') }}" alt="LG-Titan">
                    <div class="intro">
                        <div class="product-title">
                            SKU: CWT29MDCRB/CDT29MUCPB
                        </div>
                        <div class="product-topic">
                            LG ONYX TITAN-C MAX
                        </div>
                        <div class ="product-description">
                            Upgrade to Titan-C! Experience high capacity, energy efficiency, and powerful washing and
                            drying
                            performance every time.</div>
                        <button class="seeMore">
                            See More &#8599
                        </button>

                    </div>
                    <div class="detail">
                        <div class="product-title">
                            SKU: CWT29MDCRB/CDT29MUCPB
                        </div>
                        <div class="product-topic">
                            LG ONYX TITAN-C MAX
                        </div>
                        <div class ="product-description">
                            Experience the perfect balance of high capacity and energy efficiency with the Titan-C.
                            Designed
                            for
                            top-tier washing and drying performance, it delivers exceptional results while keeping
                            energy
                            consumption low. Plus, its sleek and modern design is sure to turn heads. Upgrade your
                            laundry
                            experience with the Titan-C today!
                        </div>
                        <div class="specifications">
                            <div>
                                <p>Dimension</p>
                                <p>55(W) x 585 (D) x 1850(H) mm</p>
                            </div>
                            <div>
                                <p>Power Consumption</p>
                                <p>1700 W</p>
                            </div>
                            <div>
                                <p>Voltage</p>
                                <p> 220V/60 Hz ~ 1000W - R 134a -155g.</p>
                            </div>
                            <div>
                                <p>Weight</p>
                                <p>78 kg</p>
                            </div>
                        </div>
                        <div class="checkout">
                            <button>Order Now</button>
                            <button>Learn More</button>
                        </div>
                    </div>
                </div>
                <!--ITEM 2-->
                <div class = "item">
                    <img src="{{ asset('images/LG-Giant.png') }}" alt="LG-Giant">
                    <div class="intro">
                        <div class="product-title">
                            SKU: CWG27MDCRB/CDG27RUCPB
                        </div>
                        <div class="product-topic">
                            LG ONYX GIANT C-MAX
                        </div>
                        <div class ="product-description">
                            Powerful cleaning made easy! Enjoy a 10kg capacity, fast drying, and smart WiFi features.
                        </div>
                        <button class="seeMore">
                            See More &#8599
                        </button>

                    </div>
                    <div class="detail">
                        <div class="product-title">
                            SKU: CWG27MDCRB/CDG27RUCPB
                        </div>
                        <div class="product-topic">
                            LG ONYX GIANT C-MAX
                        </div>
                        <div class ="product-description">
                            Upgrade your laundry setup with this high-performance commercial washer and gas dryer set,
                            offering
                            a 10kg capacity for efficient washing and drying. Stay connected with WiFi-ready features
                            for
                            smart
                            operation.
                        </div>
                        <div class="specifications">
                            <div>
                                <p>Dimension</p>
                                <p>55(W) x 585 (D) x 1850(H) mm</p>
                            </div>
                            <div>
                                <p>Power Consumption</p>
                                <p>1700 W</p>
                            </div>
                            <div>
                                <p>Voltage</p>
                                <p> 220V/60 Hz ~ 1000W - R 134a -155g.</p>
                            </div>
                            <div>
                                <p>Weight</p>
                                <p>78 kg</p>
                            </div>
                        </div>
                        <div class="checkout">
                            <button>Order Now</button>
                            <button>Learn More</button>
                        </div>
                    </div>
                </div>
                <!--ITEM 3-->
                <div class = "item">
                    <img src="{{ asset('images/LG-Styler.png') }}" alt="LG-Styler">
                    <div class="intro">
                        <div class="product-title">
                            SKU: S3MFC
                        </div>
                        <div class="product-topic">
                            LG Styler
                        </div>
                        <div class ="product-description">
                            Kill 99.9% of viruses and bacteria with TrueSteam™—safe, eco-friendly, and chemical-free
                            fabric
                            sanitation.
                        </div>
                        <button class="seeMore">
                            See More &#8599
                        </button>

                    </div>
                    <div class="detail">
                        <div class="product-title">
                            SKU: S3MFC
                        </div>
                        <div class="product-topic">
                            LG Styler
                        </div>
                        <div class ="product-description">
                            Eliminate over 99.9% of viruses and bacteria with TrueSteam™ technology. Effortlessly
                            sanitize
                            fabrics, masks, and delicate items that are difficult to wash. Powered by 100% pure water
                            with
                            no
                            chemical additives, it’s the safe and eco-friendly way to keep your clothes fresh and clean.
                        </div>
                        <div class="specifications">
                            <div>
                                <p>Dimension</p>
                                <p>55(W) x 585 (D) x 1850(H) mm</p>
                            </div>
                            <div>
                                <p>Power Consumption</p>
                                <p>1700 W</p>
                            </div>
                            <div>
                                <p>Voltage</p>
                                <p> 220V/60 Hz ~ 1000W - R 134a -155g.</p>
                            </div>
                            <div>
                                <p>Weight</p>
                                <p>78 kg</p>
                            </div>
                        </div>
                        <div class="checkout">
                            <button>Order Now</button>
                            <button>Learn More</button>
                        </div>
                    </div>
                </div>


            </div>
            <div class="arrows">
                <button id="prev">&lt;</button>
                <button id="back">X</button>
                <button id="next">&gt;</button>
            </div>
        </div>
    </section>
    <button class='allproduct'>
        View all product </button>
@endsection


<!--Choose Us Section-->
@section('ChooseUsContent')
    <section class="ChooseUs">
        <h1>What Makes <span class="BrandName">Bulla Crave</span> Stand Out?</h1>
        <div class="Underline"></div>
        <div class="card-container">
            <div class="card">
                <div class="icon-container">
                    <img src="{{ asset('images/Cutting-edge.png') }}">
                </div>
                <h3>Cutting-edge Technology</h3>
                <p>Our machines offer advanced features for top efficiency and performance.</p>
            </div>
            <div class="card">
                <div class="icon-container">
                    <img src="{{ asset('images/Quality.png') }}">
                </div>
                <h3>Unmatched Quality</h3>
                <p>Our durable machines deliver top-tier performance and longevity.</p>
            </div>
            <div class="card">
                <div class="icon-container">
                    <img src="{{ asset('images/Personalize.png') }}">
                </div>
                <h3>Personalized Solutions</h3>
                <p>We tailor laundry machines to fit your unique needs.</p>
            </div>
            <div class="card">
                <div class="icon-container">
                    <img src="{{ asset('images/Support.png') }}">
                </div>
                <h3>Expert Support</h3>
                <p>Our experienced team is here to guide you every step, ensuring a seamless experience.</p>
            </div>
        </div>
        <div class="alltestimonial">
            <a href="#" class="btn ">Contact Us</a>
        </div>
    </section>
@endsection

@section('TestimonialContent')
    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
        <div class="testimoniald">
            <h1>Making Dreams Happen, One Client at a Time
            </h1>
            <p>Spinning success, one load at a time! Discover how our washers and dryers keep laundry businesses running
                smoothly and customers coming back.</p>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Witness1.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <!-- Button to trigger modal -->
                            <a href="#" class="btn view-image-btn"
                                data-img-src="{{ asset('images/Witness1.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Witness2.png') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Witness2.png') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Witness3.png') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Witness3.png') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Location3.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Location3.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Location3.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Location3.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Location3.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonialcard">
                    <div class="testimonialimg">
                        <img src="{{ asset('images/Location3.jpg') }}" class="d-block w-100" />
                        <div class="card-body-overlay">
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text"> Tandang Sora, Quezon City <br> 5 Sets of LG Titan-C Max <br> April 4,
                                2025
                            </p>
                            <a href="#" class="btn  view-image-btn"
                                data-img-src="{{ asset('images/Location3.jpg') }}">View Image</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--View All Testimonials-->
    <div class="alltestimonial">
        <a href="#" class="btn ">View All</a>
    </div>
@endsection

@section('TeamContent')
    <section class="py-5 bg-light mt-5">
        <div class="container">
            <h1 class="text-center mb-5">Meet Our Professional Team</h1>
            <div class="text-center my-5">
                <hr class="w-75 mx-auto mb-3 border-dark" />
                <h2>Sales Team</h2>
                <hr class="w-75 mx-auto mt-3 border-dark" />
            </div>
            <div class="row g-5">

                <!-- Team Member -->
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="{{ asset('images/Sales1.png') }}" class="d-block w-100" />
                    </div>
                    <div class="team-info">
                        <h5>Carl Angelo Arnante</h5>
                        <p class="text-muted">Sales Manager</p>
                        <p><strong>Email:</strong> carlarnante@bullacrave.com</p>
                        <p><strong>Contact:</strong> +63917-703-6193</p>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="{{ asset('images/Sales2.png') }}" class="d-block w-100" />
                    </div>
                    <div class="team-info">
                        <h5>Cecile Aviles</h5>
                        <p class="text-muted">Sales Executive</p>
                        <p><strong>Email:</strong> cecileaviles@bullacrave.com</p>
                        <p><strong>Contact:</strong> +63917-144-0651</p>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="{{ asset('images/Sales3.png') }}" class="d-block w-100" />
                    </div>
                    <div class="team-info">
                        <h5>John Rex Villegas</h5>
                        <p class="text-muted">Sales Executive</p>
                        <p><strong>Email:</strong> rexvillegas@bullacrave.com</p>
                        <p><strong>Contact:</strong> +63917-165-3401</p>
                    </div>
                </div>
            </div>
            <!-- Second Row (Centered 2 Cards) -->
            <div class="row g-5 justify-content-center mt-2">
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="{{ asset('images/Sales4.png') }}" class="d-block w-100" />
                    </div>
                    <div class="team-info">
                        <h5>Melvin Clemente Regondola</h5>
                        <p class="text-muted">Account Executive</p>
                        <p><strong>Email:</strong> melvinregondola@bullacrave.com</p>
                        <p><strong>Contact:</strong> +63917-123-0684</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="team-card">
                        <img src="{{ asset('images/Sales5.png') }}" class="d-block w-100" />
                    </div>
                    <div class="team-info">
                        <h5>Marvie Rolle</h5>
                        <p class="text-muted">Sales Executive</p>
                        <p><strong>Email:</strong> marvierolle@bullacrave.com</p>
                        <p><strong>Contact:</strong> +63917-143-7365</p>
                    </div>
                </div>
            </div>

            <!-- Divider Section: between Sales and Other Teams -->
            <div class="text-center my-3">
                <hr class="custom-hr" />
            </div>

            <!-- Technical & Customer Relation Teams -->
            <div class="row g-5 mt-5">

                <!-- Technical Team -->
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <hr class="w-50 mx-auto mb-3 border-dark" />
                        <h2>Technical Team</h2>
                        <hr class="w-50 mx-auto mb-3 border-dark" />
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-9">
                            <div class="team-card custom-team-card"> <!-- Added custom class here -->
                                <img src="{{ asset('images/Tech1.png') }}" class="d-block w-100" />
                            </div>
                            <div class="team-info custom-team-info"> <!-- Added custom class here -->
                                <h5>Romel Evangelista</h5>
                                <p class="text-muted">Techical Head</p>
                                <p><strong>Email:</strong> rommelevangelista@bullacrave.com</p>
                                <p><strong>Contact:</strong> +63917-132-1016</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Relation Team -->
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <hr class="w-50 mx-auto mb-3 border-dark" />
                        <h2>Customer Relation Team</h2>
                        <hr class="w-50 mx-auto mt-3 border-dark" />
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-9">
                            <div class="team-card custom-team-card"> <!-- Added custom class here -->
                                <img src="{{ asset('images/Customer1.png') }}" class="d-block w-100" />
                            </div>
                            <div class="team-info custom-team-info"> <!-- Added custom class here -->
                                <h5>Niñorowin Dejecacion</h5>
                                <p class="text-muted">Customer Relations Officer</p>
                                <p><strong>Email:</strong> ninorowin@bullacrave.com</p>
                                <p><strong>Contact:</strong> +63917-522-0207</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<!-- Universal Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0 position-relative">
            <!-- Close Button (Top Left) -->
            <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>

            <!-- Large Image -->
            <img id="modalImage" src="" class="img-fluid">
        </div>
    </div>
</div>
</body>

</html>
