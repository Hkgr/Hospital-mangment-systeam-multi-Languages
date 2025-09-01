<footer class="main-footer style-two">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo-3.png" alt="" /></a>
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="footer-title  clearfix">
                                <h2>{{ trans('Layout/Footer.Sections') }}</h2>
                                                                    <div class="separator"></div>
                                </div>
                                <ul class="footer-list">
                                    <li><a href="http://127.0.0.1:8000/deps/Urology">{{trans('HomePage/HomePage.Sec1')}}</a></li>
                                    <li><a href="http://127.0.0.1:8000/deps/Neurology">{{trans('HomePage/HomePage.Sec2')}}</a></li>
                                    <li><a href="http://127.0.0.1:8000/deps/Gastroenterology">{{trans('HomePage/HomePage.Sec3')}}</a></li>
                                    <li><a href="http://127.0.0.1:8000/deps/Cardiology">{{trans('HomePage/HomePage.Sec4')}}</a></li>
                                    <li><a href="http://127.0.0.1:8000/deps/eye">{{trans('HomePage/HomePage.Sec5')}}</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget news-widget">
                                <div class="footer-title  clearfix">
                                <h2>{{ trans('Layout/Footer.LatestArticles') }}</h2>
                                                                    <div class="separator"></div>
                                </div>

                                <!--News Widget Block-->
                                <div class="news-widget-block">
                                    <div class="widget-inner">
                                        <div class="image">
                                            <img src="{{URL::asset('WebSite/images/articals/1/min.png')}}" alt="photo" />
                                        </div>
                                        <h3><a href="blog-detail.html">{{ trans('Layout/Footer.Article1Title') }}</a>
                                                                            </h3>
                                                                            <div class="post-date">{{ trans('Layout/Footer.Article1Date') }}</div>
                                                                                                            </div>
                                </div>

                                <!--News Widget Block-->
                                <div class="news-widget-block">
                                    <div class="widget-inner">
                                        <div class="image">
                                            <img src="{{URL::asset('WebSite/images/articals/2/min.png')}}" alt="" />
                                        </div>
                                        <h3><a href="blog-detail.html">{{ trans('Layout/Footer.Article2Title') }}</a></h3>
                                        <div class="post-date">{{ trans('Layout/Footer.Article2Date') }}</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <div class="footer-title  clearfix">
                                <h2>{{ trans('Layout/Footer.ContactUs') }}</h2>
                                                                    <div class="separator"></div>
                                </div>

                                <ul class="contact-list">
                                <li><span class="icon flaticon-placeholder"></span>{!! trans('Layout/Footer.Address') !!}</li>
                                    <li><span class="icon flaticon-call"></span>{{ trans('Layout/Footer.WorkHours') }}<br> <a href="tel:{{ trans('Layout/Footer.Phone') }}">{{ trans('Layout/Footer.Phone') }}   </a></li>
                                    <li><span class="icon flaticon-message"></span>{{ trans('Layout/Footer.HaveQuestion') }} <a href="mailto:{{ trans('Layout/Footer.Email') }}">{{ trans('Layout/Footer.Email') }}</a></li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">Helth Care &copy; All Rights Reserved By Free Aleepo University with love <i class="flaticon-heart heart-icon"></i>
            </div>
        </div>
    </div>

</footer>