<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title> Trusted Tour Travel Car Rental Rwanda </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> Trusted Tour Travel Car Rental </title>


          <!-- Og Description || Max 65 characters -->
    <meta 
    property="og:description" 
    content="trusted Tours travel car rental Rwanda  providing both tourists and residents with the most extensive selection of vehicles to hire. customers can choose to hire a car on a dairy,weekly,monthly ,or long term basis we do serve Self drive car rental, Chauffeur hire, Event transportation, Event transportation, Taxi hire">

    <!-- Og Image --> 
    <meta property="og:image" content="{{asset('images/TTTR.jpg')}}">
    <meta property="og:image:secure_url" content="{{asset('images/TTTR.jpg')}}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="300">
    <meta property="og:image:alt" content=" Trusted Tours Travels Rwanda ">
    <!-- Og Type -->
    <meta property="og:type" content="website" />





<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/jpg" href=" {{ asset('front_assets/assets/images/TTTR.jpg')}} "/>
  <!-- fontawesome css link -->
  <link rel="stylesheet" href="{{ asset('front_assets/assets/css/fontawesome.min.css') }} ">
  <!-- bootstrap css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/bootstrap.min.css') }} ">
  <!-- lightcase css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/lightcase.css') }} ">
  <!-- animate css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/animate.css') }} ">
  <!-- nice select css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/nice-select.css') }} ">
  <!-- datepicker css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/datepicker.min.css') }} ">
  <!-- wickedpicker css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/wickedpicker.min.css') }} ">
  <!-- jquery ui css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/jquery-ui.min.css') }} ">
  <!-- owl carousel css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/owl.carousel.min.css') }} ">
  <!-- main style css link -->
  <link rel="stylesheet" href=" {{ asset('front_assets/assets/css/main.css') }} ">
</head>
<body>

  <!-- preloader start -->
  <div id="preloader"></div>
  <!-- preloader end -->   

  <!--  header-section start  -->
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3">
            <ul class="social-links">
              <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-7">
            <ul class="header-info d-flex justify-content-center">
              <li>
                <i class="fa fa-map-marker"></i>
                <p> Trusted Tour Travel Car Rental Rwanda </p>
              </li>
              <li>
                <i class="fa fa-clock-o"></i>
                <p> We are operating 24/7 </p>
                <p>+250790558704/ +250784459626</p>
              </li>
            </ul>
          </div>
          <div class="col-lg-2">
            <div class="header-action d-flex align-items-center justify-content-end">

              <div class="lag-select-area">
                <select>
                  <option>ENG</option>
                  {{-- <option>RUS</option>
                  <option>BAN</option> --}}
                </select>
              </div>

              {{-- <div class="login-reg">
                  <a href=" {{route('register')}} ">Sign Up</a>
                  <a href="  {{route('login')}} ">Sign in</a>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom ">
      <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
          <a class="site-logo site-title" href="{{ route('front.home') }}"><img src=" {{asset('front_assets/assets/images/TTTR.jpg')}} " alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu mr-auto">
              <li class=""><a href=" {{route('front.home')}} ">Home</a>
              </li>
              <li><a href="{{ route('front.about') }}">About Us</a>
                <li class=""><a href=" {{route('front.services')}} ">Our Services</a>
                </li>
               <li class=""><a href=" {{ route('front.cars') }} ">cars</a>
                
              </li>

              <li><a href=" {{route('front.contact')}} ">contact us</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- header-bottom end -->
  </header>
  <!--  header-section end  -->


  <!-- inner-apge-banner start -->
  <section class="inner-page-banner bg_img overlay-3" data-background="{{ asset('front_assets/assets/images/inner-page-bg.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-title"> Trusted Tours Travels Car Rental Rwanda </h2> 
          <ol class="page-list">
            <li><a href="{{ route('front.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li> Login </li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->



  {{ $slot }}

  

  <!-- footer-section start -->
  <footer class="footer-section">
    <div class="footer-top pt-120 pb-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8">
            <div class="footer-widget widget-about">
              <div class="widget-about-content">
                <a href="index.html" class="footer-logo">
                  <img src=" {{asset('images/TTTR.jpg')}} " alt="logo"></a>
                <h3 class="d-block "> <q>cheap car rental Rwanda </q> </h3>
                <p>

                   Trusted Tours Travels Rwanda is the best car agency in Rwanda,
                  providing both tourists and residents with the most extensive selection of vehicles
                   to hire.we have a car to suit all occasions and budgets.
                  customers can choose to hire a car on a dairy,weekly,monthly ,or long term basis.

                 </p>
                <ul class="social-links">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4">
            <div class="footer-widget widget-menu">
              <h4 class="widget-title">our cars</h4>
              <ul>
                
                @php
                use App\Models\Admin\Car;
                $cars = Car::with(['Category'])->limit(5)->get();
                // dd($cars);
                @endphp

                @foreach ($cars as $car)
                <li><a href="#"> {{$car->name }} </a></li>
                @endforeach

              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4">
            <div class="footer-widget widget-menu">
              <h4 class="widget-title"> @lang('layoult.useful_links') </h4>
              <ul>
                <li><a class="active" href=" {{ route('front.home') }} "> @lang('layoult.home') </a></li>
                <li><a href=" {{ route('front.about') }} "> @lang('layoult.about') </a></li>
                <li><a href=" {{route('front.services')  }} "> @lang('layoult.services') </a></li>
                <li><a href=" {{ route('front.cars') }} "> @lang('layoult.cars') </a></li>
                <li><a href=" {{ route('front.contact') }} "> @lang('layoult.contact') </a></li>
                <li><a href=" {{ route('login') }} "> Admin @lang('Dashboard') </a></li>

              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-sm-8">
            <div class="footer-widget widget-address">
              <h4 class="widget-title">contact with us</h4>
              <ul>
                <li>
                  <i class="fa fa-map-marker"></i>
                  <span>Kigali, KG 10012, Muhima Road , Nyarugenge RWANDA</span>
                </li>
                <li>
                  <i class="fa fa-envelope"></i>
                  <span>trustedcarrental@gmail.com oursupport.trustedcarrental.com info@trustedcarrental.com</span>
                </li>
                <li>
                  <i class="fa fa-phone-square"></i>
                  <span> +250 782 874 869 </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-sm-6">
            <p class="copy-right-text"><a href="http://santechrwanda.com/" target="_blank"> SanTech Ltd </a></p>
          </div>
          <div class="col-sm-6">
            <ul class="payment-method d-flex justify-content-end">
              <li>We accept</li>
              <li><img src="{{ asset('front_assets/assets/images/money-method/1.png') }}" alt="image"></li>
              <li><img src="{{ asset('front_assets/assets/images/money-method/2.png') }}" alt="image"></li>
              <li><img src="{{ asset('front_assets/assets/images/money-method/3.png') }}" alt="image"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-section end -->

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-rocket"></i>
    </span>
  </div>
  
  <!-- scroll-to-top end -->
  
  <!-- jquery js link -->
  <script src="{{ asset('front_assets/assets/js/jquery-3.3.1.min.js') }}"></script>
  <!-- jquery migrate js link -->
  <script src="{{ asset('front_assets/assets/js/jquery-migrate-3.0.0.js') }}"></script>
  <!-- bootstrap js link -->
  <script src="{{ asset('front_assets/assets/js/bootstrap.min.js') }}"></script>
  <!-- lightcase js link -->
  {{-- <script src="{{ asset('front_assets/assets/js/lightcase.js') }}"></script> --}}
  <!-- wow js link -->
  {{-- <script src="{{ asset('front_assets/assets/js/wow.min.js') }}"></script> --}}
  <!-- nice select js link -->
  <script src="{{ asset('front_assets/assets/js/jquery.nice-select.min.js') }}"></script>
  <!-- datepicker js link -->
  <script src="{{ asset('front_assets/assets/js/datepicker.min.js') }}"></script>
  <script src="{{ asset('front_assets/assets/js/datepicker.en.js') }}"></script>
  <!-- wickedpicker js link -->
  <script src="{{ asset('front_assets/assets/js/wickedpicker.min.js') }}"></script>
  <!-- owl carousel js link -->
  <script src="{{ asset('front_assets/assets/js/owl.carousel.min.js') }}"></script>
  <!-- jquery ui js link -->
  <script src="{{ asset('front_assets/assets/js/jquery-ui.min.js') }}"></script>

  {{-- sweet alert --}}
  <script src="{{ asset('front_assets/assets/sweetAlert/sweet.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}

  <!-- main js link -->
  <script src="{{ asset('front_assets/assets/js/main.js') }}"></script>

  @yield('js')


</body>

</html>

