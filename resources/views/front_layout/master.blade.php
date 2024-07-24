<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    
    <!-- fonts -->
    <link rel="stylesheet" href="{{asset('lure/fonts/satoshi/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('lure/fonts/Nohemi/stylesheet.css')}}">
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('lure/css/custom.css')}}">
    <link rel="shortcut icon" href="{{ asset('admin/images/lure_logo.svg') }}">

    <title>LURE</title>
</head>

<body>
    @php 
       $siteContent = App\Models\SiteContent::first();
    @endphp
    <div id="loading-screen">
        <div id="logo-container">
            <div class="GIF_LOGO" id="display">
                <img src="{{asset('lure/images/gif_logo.gif')}}" alt="Lure">
            </div>
        </div>
    </div>
    <header class="site_header" id="site_header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        @if (isset($siteContent->site_logo) && $siteContent->site_logo != null)
                            <img src="{{ asset('lure/images') }}/{{ $siteContent->site_logo ?? 'logo_pink.svg' }}" alt="">
                        @else
                            <img src="{{ asset('lure/images/logo_pink.svg')}}" alt="">
                        @endif
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ request()->routeIs('home') ? '#about_section' : url('/#about_section') }}">About</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ request()->routeIs('home') ? '#services_section' : url('/#services_section') }}">Services</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ request()->routeIs('home') ? '#result_section' : url('/#result_section') }}">Results</a>
                        </li>
                        <!-- <li class="nav-item active">
                            <a class="nav-link" href="{{ request()->routeIs('home') ? '#model_section' : url('/#model_section') }}" >Our Models </a>
                        </li> -->
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ request()->routeIs('home') ? '#footer_section' : url('/#footer_section') }}" >Contact</a>
                        </li>
                    </ul>
                    <div class="header_btn">
                        <a href="{{ route('apply.now') }}" class="cta_btn">Apply Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </header> 

    @yield('content')

    <footer class="footer_sec p_140" id="footer_section">
        <div class="container">
            <div class="footer_wrapper">
                <div  class="row align-items-center">
                    <div class="col-md-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <div class="footer-head">
                            <h2>{{ $siteContent->subscribe_sec_heading ?? 'Email Updates'}}</h2>
                            <p>{{ $siteContent->subscribe_sec_text ?? 'Enter your email below to subscribe to our monthly newsletter.'}}</p>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <div id="subscribesection" class="email_wrapper">
                            <div class="webflow-style-input">
                                <input class="" id="subEmail" type="email" placeholder="Your email address">
                                <button type="button" id="subscribe-now">Subscribe Now</button>
                            </div>
                            <p class="text-danger" id="email-error-subscribe"></p>
                        </div>
                        <div style="display:none" id="thankyousection" class="email_wrapper">
                            <div class="">
                                <img src="{{ asset('lure/images/Group_35177.png') }}" alt="">
                            </div>
                            <p>Thanks for subscribe.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site_footer p_100">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-details">
                            <div class="footer-logo" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                @if (isset($siteContent->footer_logo) && $siteContent->footer_logo != null)
                                    <img src="{{ asset('lure/images') }}/{{ $siteContent->footer_logo ?? 'footer-log.png' }}" alt="">
                                @else
                                    <img src="{{ asset('lure/images/footer-log.png') }}" alt="">
                                @endif
                            </div>
                            <p data-aos="fade-up" data-aos-anchor-placement="top-bottom">{{ $siteContent->about_team ??  'Our highly experienced team aids our clients in achieving their full potential on social
                                media platforms. We strive to make your dreams a reality by maximizing your online
                                traffic, growing your personal brand awareness, and ultimately reaching your highest
                                earning potential.'}}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="link_footer">
                            <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom">Quick Links</h5>
                            <ul>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ route('home') }}">Home</a></li>
                                <!-- <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ request()->routeIs('home') ? '#model_section' : url('/#model_section') }}">Our Models</a></li> -->
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ request()->routeIs('home') ? '#about_section' : url('/#about_section') }}">About</a></li>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ request()->routeIs('home') ? '#services_section' : url('/#services_section') }}">Services</a></li>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ request()->routeIs('home') ? '#footer_section' : url('/#footer_section') }}#footer_section">Contact</a></li>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ request()->routeIs('home') ? '#result_section' : url('/#result_section') }}">Results</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="link_footer connect_us">
                            <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom">Connect with us</h5>
                            <ul>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ $siteContent->facebook_link ?? '#' }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ $siteContent->facebook_link ?? '#' }}"><i class="fa-brands fa-instagram"></i></a></li>
                                <li data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{ $siteContent->linkedin_link ?? '#' }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="marque_section">
            <div class="lemon_slide2 marquee-block" data-aos="flip-down">
                <div class="marquee-item-list ">
                    <div class="lemon_cont2">
                        <h2>{{ $siteContent->site_message ?? 'Achieve More, Together.' }}</h2>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="bottom_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copy_right" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <p>{{ $siteContent->site_copyrights ?? '© 2024 LURE. All Rights Reserved.' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="arrow_top" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <a href="#site_header">Back to top <img src="{{asset('lure/images/arrow.png')}}" alt=""></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function validateEmail(email) {
            const re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        $(document).ready(function () {
            $('#subscribe-now').on('click', function () {
                const userEmail = $('#subEmail').val();

                if (userEmail) {
                    if (validateEmail(userEmail)) {
                        $.ajax({
                            url: "{{ route('subscribe') }}",
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Get CSRF token if using Laravel
                            },
                            data: JSON.stringify({ email: userEmail }),
                            success: function (response) {
                                console.log(response);
                                if (response.success) {
                                    $('#subscribesection').hide();
                                    $('#thankyousection').show();
                                } else {
                                    $('#email-error-subscribe').show().text('Email is already registered.');
                                }
                            },
                            error: function (error) {
                                $('#email-error-subscribe').show().text('An error occurred. Please try again.');
                            }
                        });
                    } else {
                        $('#subEmail').addClass('error');
                        $('#email-error-subscribe').show().text('Please enter a valid email.');
                    }
                } else {
                    $('#subEmail').addClass('error');
                    $('#email-error-subscribe').show().text('Email is required.');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.before_btn').on('click', function () {
                $('.before_btn').addClass('active');
                $('.after_btn').removeClass('active');
                $('#beforeimage').show();
                $('#afterimage').hide();
                $('#lotie_abs').removeClass('open_image');
            });

            $('.after_btn').on('click', function () {
                $('.after_btn').addClass('active');
                $('.before_btn').removeClass('active');
                $('#beforeimage').hide();
                $('#afterimage').show();
                $('#lotie_abs').addClass('open_image');
            });
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{ asset('lure/js/custom.js') }}" ></script>
    <script>
        AOS.init({
            duration: 1200,
        })
    </script>
   
    
</body>
</html>