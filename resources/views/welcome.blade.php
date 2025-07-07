    @extends('WebSite.layouts.master')

    @section('content')
    <!-- Main Slider Three -->
    <section class="main-slider-three">
        <div class="banner-carousel">
            <!-- Swiper -->
            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>{{trans('HomePage/HomePage.MainHead1')}}</h2>
                                    <div class="text">
                                        {{trans('HomePage/HomePage.SubHead1')}}
                                    </div>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{trans('HomePage/HomePage.Appointment')}}</span></a>
                                        <a href="services.html" class="theme-btn services-btn">{{trans('HomePage/HomePage.Services')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{URL::asset('WebSite/images/main-slider/3.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>{{trans('HomePage/HomePage.MainHead2')}}</h2>
                                    <div class="text">{{trans('HomePage/HomePage.SubHead2')}}
                                    </div>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{trans('HomePage/HomePage.Appointment')}}
                                            </span></a>
                                        <a href="services.html" class="theme-btn services-btn">{{trans('HomePage/HomePage.Services')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{URL::asset('WebSite/images/main-slider/4.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2>{{trans('HomePage/HomePage.MainHead3')}}</h2>
                                    <div class="text">{{trans('HomePage/HomePage.SubHead3')}}
                                    </div>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{trans('HomePage/HomePage.Appointment')}}
                                            </span></a>
                                        <a href="services.html" class="theme-btn services-btn">{{trans('HomePage/HomePage.Services')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{URL::asset('WebSite/images/main-slider/5.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!-- End Main Slider -->

    <!-- Health Section -->
    <section class="health-section">
        <div class="auto-container">
            <div class="inner-container">

                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="border-line"></div>
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{trans('HomePage/HomePage.Pioneer')}}</h2>
                                <div class="separator"></div>
                            </div>
                            <div class="text">{{trans('HomePage/HomePage.PioneerSub')}}
                            </div>
                            <a href="about.html" class="theme-btn btn-style-one"><span class="txt">{{trans('HomePage/HomePage.More')}}</span></a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img style="border-radius: 15px; margin: 15px;" src="{{URL::asset('WebSite/images/resource/image-3.png')}}"  alt="" />
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End Health Section -->

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon flaticon-doctor-stethoscope"></div>
                            <h3><a href="#">{{trans('HomePage/HomePage.MarkHead1')}}</a></h3>
                        </div>
                        <div class="text">{{trans('HomePage/HomePage.MarkSubHead1')}}</div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon flaticon-ambulance-side-view"></div>
                            <h3><a href="#">{{trans('HomePage/HomePage.MarkHead2')}}</a></h3>
                        </div>
                        <div class="text">{{trans('HomePage/HomePage.MarkSubHead2')}}</div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon fas fa-user-md"></div>
                            <h3><a href="#">{{trans('HomePage/HomePage.MarkHead3')}}</a></h3>
                        </div>
                        <div class="text">{{trans('HomePage/HomePage.MarkSubHead3')}}</div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon fas fa-briefcase-medical"></div>
                            <h3><a href="#">{{trans('HomePage/HomePage.MarkHead4')}}</a></h3>
                        </div>
                        <div class="text">{{trans('HomePage/HomePage.MarkSubHead4')}}</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- Department Section Three -->
    <section class="department-section-three">
        <div class="image-layer" style="background-image: url({{ URL::asset('WebSite/images/background/6.png') }})"></div>
        <div class="auto-container">
            <!-- Department Tabs-->
            <div class="department-tabs tabs-box">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <!-- Sec Title -->
                        <div class="sec-title light">
                            <h2>الاقسام</h2>
                            <div class="separator"></div>
                        </div>
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#tab-urology" class="tab-btn active-btn">{{trans('HomePage/HomePage.Sec1')}}</li>
                            <li data-tab="#tab-department" class="tab-btn">{{trans('HomePage/HomePage.Sec2')}}</li>
                            <li data-tab="#tab-gastrology" class="tab-btn">{{trans('HomePage/HomePage.Sec3')}}</li>
                            <li data-tab="#tab-cardiology" class="tab-btn">{{trans('HomePage/HomePage.Sec4')}}</li>
                            <li data-tab="#tab-eye" class="tab-btn">{{trans('HomePage/HomePage.Sec5')}}</li>
                        </ul>
                    </div>
                    <!--Column-->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <!--Tabs Container-->
                        <div class="tabs-content">

                            <!-- Tab -->
                            <div class="tab" id="tab-urology">
                                <div class="content">
                                    <h2>{{trans('HomePage/HomePage.Sec1')}}</h2>
                                    <div class="title">{{trans('HomePage/HomePage.SecHead1')}}</div>
                                    <div class="text">
                                        <p>{{trans('HomePage/HomePage.SecDesc1')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec1.1')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc1.1')}}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec1.2')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc1.2')}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{trans('HomePage/HomePage.ViewMore')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab active-tab" id="tab-department">
                                <div class="content">
                                    <h2>{{trans('HomePage/HomePage.Sec2')}}</h2>
                                    <div class="title">{{trans('HomePage/HomePage.SecHead2')}}</div>
                                    <div class="text">
                                        <p>{{trans('HomePage/HomePage.SecDesc2')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec2.1')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc2.1')}}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec2.2')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc2.2')}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{trans('HomePage/HomePage.ViewMore')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab" id="tab-gastrology">
                                <div class="content">
                                    <h2>{{trans('HomePage/HomePage.Sec3')}}</h2>
                                    <div class="title">{{trans('HomePage/HomePage.SecHead3')}}</div>
                                    <div class="text">
                                        <p>{{trans('HomePage/HomePage.SecDesc3')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec3.1')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc3.1')}}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec3.2')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc3.2')}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{trans('HomePage/HomePage.ViewMore')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab" id="tab-cardiology">
                                <div class="content">
                                    <h2>{{trans('HomePage/HomePage.Sec4')}}</h2>
                                    <div class="title">{{trans('HomePage/HomePage.SecHead4')}}</div>
                                    <div class="text">
                                        <p>{{trans('HomePage/HomePage.SecDesc4')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec4.1')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc4.1')}}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec4.2')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc4.2')}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{trans('HomePage/HomePage.ViewMore')}}</span></a>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div class="tab" id="tab-eye">
                                <div class="content">
                                    <h2>{{trans('HomePage/HomePage.Sec5')}}</h2>
                                    <div class="title">{{trans('HomePage/HomePage.SecHead5')}}</div>
                                    <div class="text">
                                        <p>{{trans('HomePage/HomePage.SecDesc5')}}</p>
                                    </div>
                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec5.1')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc5.1')}}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>{{trans('HomePage/HomePage.Sec5.2')}}</h3>
                                            <div class="column-text">{{trans('HomePage/HomePage.SecDesc5.2')}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{trans('HomePage/HomePage.ViewMore')}}</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Department Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ trans('HomePage/HomePage.TeamHead') }}</h2>
                <div class="separator"></div>
            </div>

            <div class="row clearfix">

                <!-- Team Block 1 -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/team-1.jpg') }}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{ trans('HomePage/HomePage.MakeAppointment') }}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ trans('HomePage/HomePage.Team1Name') }}</a></h3>
                            <div class="designation">{{ trans('HomePage/HomePage.Team1Title') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Block 2 -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/team-2.jpg') }}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{ trans('HomePage/HomePage.MakeAppointment') }}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ trans('HomePage/HomePage.Team2Name') }}</a></h3>
                            <div class="designation">{{ trans('HomePage/HomePage.Team2Title') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Block 3 -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/team-3.jpg') }}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{ trans('HomePage/HomePage.MakeAppointment') }}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ trans('HomePage/HomePage.Team3Name') }}</a></h3>
                            <div class="designation">{{ trans('HomePage/HomePage.Team3Title') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Block 4 -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/team-4.jpg') }}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">{{ trans('HomePage/HomePage.MakeAppointment') }}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ trans('HomePage/HomePage.Team4Name') }}</a></h3>
                            <div class="designation">{{ trans('HomePage/HomePage.Team4Title') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Team Section -->


    <!-- Video Section -->
    <section class="video-section" style="background-image: url({{ URL::asset('WebSite/images/background/5.jpg') }})">
        <div class="auto-container">
            <div class="content">
                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-box">
                    <span class="flaticon-play-button"><i class="ripple"></i></span>
                </a>
                <div class="text">
                    {{ trans('HomePage/HomePage.VideoDesc') }}
                    <h2>{{ trans('HomePage/HomePage.VideoHead') }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Video Section -->


    <!-- Appointment Section Two -->
    <section class="appointment-section-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{ URL::asset('WebSite/images/resource/doctor-2.png') }}" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ trans('HomePage/HomePage.Appointment') }}</h2>
                                <div class="separator"></div>
                            </div>

                            <!-- Appointment Form -->
                            <div class="appointment-form">
                                <livewire:appointments.create />
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section Two -->
    <section class="testimonial-section-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ trans('HomePage/HomePage.TestimonialHead') }}</h2>
                <div class="separator"></div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme">

                <!-- Tesimonial Block 1 -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/author-4.jpg') }}" alt="" />
                        </div>
                        <div class="text">{{ trans('HomePage/HomePage.TestimonialText1') }}</div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{ trans('HomePage/HomePage.TestimonialName1') }}</h3>
                                        <div class="author">{{ trans('HomePage/HomePage.TestimonialRole1') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block 2 -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/author-4-1.jpg') }}" alt="" />
                        </div>
                        <div class="text">{{ trans('HomePage/HomePage.TestimonialText2') }}</div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{ trans('HomePage/HomePage.TestimonialName2') }}</h3>
                                        <div class="author">{{ trans('HomePage/HomePage.TestimonialRole2') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block 3 -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/author-4-2.jpg') }}" alt="" />
                        </div>
                        <div class="text">{{ trans('HomePage/HomePage.TestimonialText3') }}</div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{ trans('HomePage/HomePage.TestimonialName3') }}</h3>
                                        <div class="author">{{ trans('HomePage/HomePage.TestimonialRole3') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block 4 -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ URL::asset('WebSite/images/resource/author-4-3.jpg') }}" alt="" />
                        </div>
                        <div class="text">{{ trans('HomePage/HomePage.TestimonialText4') }}</div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-right">
                                    <div class="author-info">
                                        <h3>{{ trans('HomePage/HomePage.TestimonialName4') }}</h3>
                                        <div class="author">{{ trans('HomePage/HomePage.TestimonialRole4') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Testimonial Section Two -->
    <!-- Counter Section -->
    <section class="counter-section style-two" style="background-image: url({{URL::asset('WebSite/images/background/pattern-3.png') }})">
        <div class="auto-container">
            <!-- Fact Counter -->
            <div class="fact-counter style-two">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-login"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="2350">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('HomePage/HomePage.Counter1') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box alternate">
                                    +<span class="count-text" data-speed="3000" data-stop="350">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('HomePage/HomePage.Counter2') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="2150">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('HomePage/HomePage.Counter3') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon flaticon-logout"></div>
                                <div class="count-outer count-box">
                                    +<span class="count-text" data-speed="2500" data-stop="225">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('HomePage/HomePage.Counter4') }}</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Counter Section -->

    <!-- Doctor Info Section -->
    <section class="doctor-info-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Doctor Block -->
                    <div class="doctor-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{ trans('HomePage/HomePage.DoctorTimesTitle') }}</h3>
                            <ul class="doctor-time-list">
                                <li>{{ trans('HomePage/HomePage.DoctorTimesMonFri') }}</li>
                                <li>{{ trans('HomePage/HomePage.DoctorTimesSat') }}</li>
                                <li>{{ trans('HomePage/HomePage.DoctorTimesSun') }}</li>
                            </ul>
                            <h4>{{ trans('HomePage/HomePage.EmergencyTitle') }}</h4>
                            <div class="phone">{{ trans('HomePage/HomePage.EmergencyCall') }} <strong>+898 68679 575 09</strong></div>
                        </div>
                    </div>

                    <!-- Doctor Block -->
                    <div class="doctor-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{ trans('HomePage/HomePage.DoctorScheduleTitle') }}</h3>
                            <div class="text">
                                {{ trans('HomePage/HomePage.DoctorScheduleText') }}
                            </div>
                            <a href="#" class="detail">{{ trans('HomePage/HomePage.MoreDetails') }}</a>
                        </div>
                    </div>

                    <!-- Doctor Block -->
                    <div class="doctor-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{ trans('HomePage/HomePage.PrimaryCareTitle') }}</h3>
                            <div class="text">{{ trans('HomePage/HomePage.PrimaryCareText') }}</div>
                            <a href="#" class="detail">{{ trans('HomePage/HomePage.CallNow') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Doctor Info Section -->


    <!-- News Section Two -->
    <section class="news-section-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ trans('HomePage/HomePage.NewsHead') }}</h2>
                <div class="separator style-three"></div>
            </div>
            <div class="row clearfix">

                <!-- News Block Two -->
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="blog-detail.html"><img src="{{ URL::asset('WebSite/images/resource/news-4.jpg') }}" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="content">
                                <ul class="post-info">
                                    <li>
                                        <span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span>
                                        {{ trans('HomePage/HomePage.NewsComments1') }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-heart"></span> {{ trans('HomePage/HomePage.NewsLikes1') }}
                                    </li>
                                </ul>
                                <ul class="post-meta">
                                    <li>{{ trans('HomePage/HomePage.NewsDate1') }}</li>
                                    <li>{{ trans('HomePage/HomePage.NewsPostedBy1') }}</li>
                                </ul>
                                <h3><a href="blog-detail.html">{{ trans('HomePage/HomePage.NewsTitle1') }}</a></h3>
                                <div class="text">
                                    {{ trans('HomePage/HomePage.NewsText1') }}
                                </div>
                                <a href="blog-detail.html" class="theme-btn btn-style-five">
                                    <span class="txt">{{ trans('HomePage/HomePage.ReadMore') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- News Block Two -->
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="blog-detail.html"><img src="{{ URL::asset('WebSite/images/resource/news-5.jpg') }}" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="content">
                                <ul class="post-info">
                                    <li>
                                        <span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span>
                                        {{ trans('HomePage/HomePage.NewsComments2') }}
                                    </li>
                                    <li>
                                        <span class="icon flaticon-heart"></span> {{ trans('HomePage/HomePage.NewsLikes2') }}
                                    </li>
                                </ul>
                                <ul class="post-meta">
                                    <li>{{ trans('HomePage/HomePage.NewsDate2') }}</li>
                                    <li>{{ trans('HomePage/HomePage.NewsPostedBy2') }}</li>
                                </ul>
                                <h3><a href="blog-detail.html">{{ trans('HomePage/HomePage.NewsTitle2') }}</a></h3>
                                <div class="text">
                                    {{ trans('HomePage/HomePage.NewsText2') }}
                                </div>
                                <a href="blog-detail.html" class="theme-btn btn-style-five">
                                    <span class="txt">{{ trans('HomePage/HomePage.ReadMore') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Clients Section-->
    <section class="clients-section">
        <div class="outer-container">

            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!--End Clients Section-->
    @endsection