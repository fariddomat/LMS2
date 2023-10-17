 <!-- Footer -->
 <footer id="footer" class="footer" >
    <div class="footer-widget-area">
        <div class="container pt-90 pb-60">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="tm-widget-contact-info contact-info-style1 contact-icon-theme-colored1">
                        <div class="thumb" style="margin-top: -15px;">
                            <img alt="Logo" src="{{ asset('logo.png') }}" style="width: 100px">
                        </div>
                    </div>
                    <div class="tm-sc-unordered-list list-style2">
                        <ul>
                            <li><strong>رقم الهاتف :</strong> <a href= "tel:{{setting('site_phone')}}">{{setting('site_phone')}}</a></li>
                            <li><strong>رقم الهاتف2:</strong> <a href="tel:{{setting('site_phone2')}}">{{setting('site_phone2')}}</a></li>
                            <li><strong>البريد الالكتروني:</strong> <a
                                    href="mailto:{{setting('site_email')}}">{{setting('site_email')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">وسائل الدفع المتاحة</h4>
                        <ul>
                            <li>
                                <img src="{{ asset('paymentslogo/pngwing.com.png') }}" style="max-width: 140px" alt="">
                            </li>
                            {{-- <li>
                                <img src="{{ asset('paymentslogo/tabby_logo.webp') }}" style="max-width: 100px;margin-top: -15px;" alt="">
                            </li>
                            <li>
                                <a href="https://tajir.maroof.sa/stores/299220">
                                    <img src="{{ asset('paymentslogo/maroof.svg') }}" style="max-width: 140px;margin-top: -15px" alt="">
                                </a>
                               <a href="https://eauthenticate.saudibusiness.gov.sa/inquiry?certificateRefID=0000024848">
                                <img src="{{ asset('paymentslogo/saudiWork.png') }}" style="max-width: 190px;margin-top: -7px" alt="">
                               </a>
                            </li> --}}



                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="widget">
                        <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">الدورات التدريبية
                        </h4>
                        <div class="opening-hours border-dark">
                            <ul>

                            @foreach ($courses_count as $course)

                            <li><a href="{{ route('courses.show', $course->title) }}">{{ $course->title }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                        <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                            <li><a class="social-link" data-tm-bg-color="#A8CDD1" href="{{ setting('site_email') }}"><i class="fa fa-envelope"></i></a></li>
                            <li><a class="social-link" data-tm-bg-color="#A8CDD1" href="{{ setting('instagram2_link') }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a class="social-link" data-tm-bg-color="#A8CDD1" href="{{ setting('twitter_link') }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="social-link" data-tm-bg-color="#A8CDD1" href="{{ setting('whatsapp_link') }}"><i class="fab fa-whatsapp"></i></a></li>

                          </ul>

                        <div class="description" style="padding-top: 10px">{!! setting('site_about') !!}</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" data-tm-bg-color="#f2fffd">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-sm-6">
                        <div class="footer-paragraph">
                            © 2023. All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-paragraph text-right">
                            By <a href="https://Joudtech.sa/">Joudtech</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="{{ asset('home/js/custom.js') }}"></script>


<script></script>
<script id="dsq-count-scr" src="//holistichealth-sa.disqus.com/count.js" async></script>
     @extends('layouts._noty')
@stack('scripts')
