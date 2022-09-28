@extends('front.layoult')
@section('home_selected', 'active')

@section('content')

  <!-- banner-section start  -->
  <section class="banner-section bg_img" data-background="{{ asset('front_assets/assets/images/banner.jpg')}}">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div   class="banner-content ">
            <h1 class="title"> @lang('home.rent_car_in_rwanda') </h1>
            <p>
              @lang('home.rent_car_in_rwanda_desc')

            </p>
            <a href="{{route('front.cars')}}" class="cmn-btn"> @lang('home.see_all_vehicles') </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="banner-img">
            {{-- <img src="{{asset('front_assets/assets/images/elements/car.png')}}" alt="image"> --}}
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @php
                  $count = 1;
                @endphp
                @foreach ($slides as $slide)

                @if ($count == 1)
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset('/uploads/images')}}/{{$slide->image}}" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5> {{$slide->title}} </h5>
                    <p> {{$slide->description}} </p>
                  </div>
                </div>
                @php

                $count++;
                  
                @endphp
                @else

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('/uploads/images')}}/{{$slide->image}}" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5> {{$slide->title}} </h5>
                    <p> {{$slide->description}} </p>
                  </div>
                </div> 
                @php
                $count++;
                @endphp
                @endif
                @endforeach


              </div>
              {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-section end  -->


  <!-- search-section start -->
  <section class="search-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="car-search-area">
            <h3 class="title">@lang('forms.book_your_car') </h3>

            <form class="car-search-form" id="frmReserve">

              <div class="row">
                <div class="col-lg-12 form-group">
                  <select name="car_id" id="car_id" required>
                    <option selected> @lang('forms.choose_your_car_type') </option>
                    @foreach ($cars as $item)
                    <option value="{{$item->id}}"> {{$item->name}} / {{$item->category->name}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="row">
                <div class="form-group col-md-6">
                  <i class="fa fa-map-marker"></i>
                  <input id="pickup" name="pickup" class="form-control has-icon" type="text" placeholder="@lang('forms.pickup_location')" required>
                </div>
                <div class="form-group col-md-6">
                  <i class="fa fa-map-marker"></i>
                  <input id="pickoff" name="pickoff" class="form-control has-icon" type="text" placeholder="@lang('forms.dropoff_location')" required>
                </div>
              </div>
              
              <div class="row">
                <div class="form-group col-md-6">
                  <i class="fa fa-calendar"></i>
                  <input id="pickup-date" name="pickup-date" type='text'  class='form-control has-icon datepicker-here' data-language='en' placeholder="@lang('forms.pickup_date')" required>
                </div>
                <div class="form-group col-md-6">
                  <i class="fa fa-clock-o"></i>
                  <input id="pickup-time" name="pickup-time" type="text"  class="form-control has-icon timepicker" placeholder="Pickup Time" required>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <i class="fa fa-calendar"></i>
                  <input id="pickoff-date" name="pickoff-date" type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="@lang('forms.dropoff_date')" required>
                </div>
                <div class="form-group col-md-6">
                  <i class="fa fa-clock-o"></i>
                  <input id="pickoff-time" name="pickoff-time"type="text" class="form-control has-icon timepicker" placeholder="Drop Off Time" required>
                </div>
              </div>

              <button type="submit" class="cmn-btn btn-radius">@lang('forms.book_now')</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- search-section end -->
  
  <!-- choose-car-section start -->
  <section style="background: #F39495;
  background: -webkit-radial-gradient(center, #F39495, #B18F90);
  background: -moz-radial-gradient(center, #F39495, #B18F90);
  background: radial-gradient(ellipse at center, #F39495, #B18F90);" class="choose-car-section pt-120 pb-120 section-bg">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title"> @lang('home.find_your_own_vehicle') </h2>
            <p style="" >
              @lang('home.company_desc_home')
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="choose-car-slider owl-carousel">

            @foreach ($cars as $item)

            <div style="background: #E6DAE2;
            background: -webkit-linear-gradient(top, #E6DAE2, #FFFFFF);
            background: -moz-linear-gradient(top, #E6DAE2, #FFFFFF);
            background: linear-gradient(to bottom, #E6DAE2, #FFFFFF);" class="car-item">
              <div class="thumb">
                <img src=" {{ asset('/uploads/images')}}/{{$item->image}} " alt="image">
              </div>
              <div class="car-item-body">
                <div class="content">
                  <h4 class="title"> {{ $item->category['name']}} </h4>
                  <span class="price"> <b>{{ $item->per_day }} $</b> @lang('carCards.per_day')</span>
                  <br>
                  <span class="price"> <b>{{ $item->per_month }} $</b> @lang('carCards.per_month')</span>
                  <p> {{ $item->name }} </p>
                  <a href="#0" car_id="{{$item->id}}" data-car_id="{{$item->id}}" class="cmn-btn rent-car btn-rent-car">@lang('forms.rent_car')</a>
                </div>
                <div class="car-item-meta">
                  <ul class="details-list">
                    <li><i class="fa fa-car"></i> {{ $item->model}} </li>
                    <li><i class="fa fa-tachometer"></i> {{$item->seats}}@lang('carCards.seats')</li>
                    <li><i class="fa fa-sliders"></i> {{ $item->transmission}} </li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- car-item end -->
            @endforeach
          </div>
        </div>

        <div class="col-lg-4">
        </div>

      </div>
    </div>
  </section>
  <!-- choose-car-section end -->


  <!-- overview-section start -->
  <section class="overview-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="block-area">
            <div class="block-header">
              <h2 class="title"> @lang('home.we_proveide_all_kinds') </h2>
              <p>
                @lang('home.we_proveide_all_kinds_desc')
              </p>
            </div>

            {{-- <div class="block-body">
              <div class="row">
                <div class="col-md-4 col-sm-4 col-4">  
                  <div class="counter-item">
                    <span class="title">total car</span>
                    <span>100</span>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-4">  
                  <div class="counter-item">
                    <span class="title">car rent</span>
                    <span>2000</span>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-4">  
                  <div class="counter-item">
                    <span class="title">experience</span>
                    <span>2</span><span class="counter-text">Y</span>
                  </div>
                </div>

              </div>
            </div> --}}

          </div>
        </div>
        <div class="col-lg-6">
          <div class="overview-img">
            <div class="img-container"><img src=" {{ asset('front_assets/assets/images/ciy3.jpg') }} " alt="image"></div>
            <div class="img-container"><img src=" {{ asset('front_assets/assets/images/rwanda10a-cars.jpg') }} " alt="image"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- overview-section end -->

  <!-- team-section start -->
  {{-- <section class="team-section pb-120 ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">expert support team</h2>
            <p> Augue urna molestie mi adipiscing vulputate pede sedmassa  Praesquam massa, sodales velit turpis in tellu.</p>
          </div>
        </div>
      </div>
      <div class="row mb-none-30">
        <div class="col-lg-4 col-sm-6">
          <div class="team-item">
            <div class="thumb">
              <img src=" {{ asset('front_assets/assets/images/team/1.jpg') }} " alt="image">
              <div class="content">
                <h3 class="name">William cook</h3>
                <span class="designation">Support Manager</span>
                <ul class="social-list d-flex justify-content-center">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#0"><i class="fa fa-pinterest-p"></i></a></li>
                  <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fa fa-vimeo"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div><!--team-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="team-item">
            <div class="thumb">
              <img src=" {{ asset('front_assets/assets/images/team/2.jpg') }} " alt="image">
              <div class="content">
                <h3 class="name">William cook</h3>
                <span class="designation">Support Manager</span>
                <ul class="social-list d-flex justify-content-center">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#0"><i class="fa fa-pinterest-p"></i></a></li>
                  <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fa fa-vimeo"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div><!--team-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="team-item">
            <div class="thumb">
              <img src=" {{ asset('front_assets/assets/images/team/3.jpg') }} " alt="image">
              <div class="content">
                <h3 class="name">William cook</h3>
                <span class="designation">Support Manager</span>
                <ul class="social-list d-flex justify-content-center">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#0"><i class="fa fa-pinterest-p"></i></a></li>
                  <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#0"><i class="fa fa-vimeo"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div><!--team-item end -->
        
      </div>
    </div>
  </section> --}}
  <!-- team-section end -->


  <!-- testimonial-section start -->
  {{-- <section class="testimonial-section overlay-black pt-120 pb-120 bg_img" data-background=" {{ asset('front_assets/assets/images/testimonial-bg.jpg') }} ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="testimonial-slider owl-carousel">
            <div class="testimonial-item text-center">
              <div class="testimonial-item--header">
                <div class="thumb"><img src=" {{ asset('front_assets/assets/images/testimonial/1.jpg') }} " alt="image"></div>
                <h3 class="name">martin hook</h3>
                <span class="designation">business man</span>
              </div>
              <div class="testimonial-item--body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
              </div>
              <div class="testimonial-item--ratings">
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star-half-o"></i></a>
              </div>
            </div><!-- testimonial-item end -->
            <div class="testimonial-item text-center">
              <div class="testimonial-item--header">
                <div class="thumb"><img src=" {{ asset('front_assets/assets/images/testimonial/1.jpg') }} " alt="image"></div>
                <h3 class="name">martin hook</h3>
                <span class="designation">business man</span>
              </div>
              <div class="testimonial-item--body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
              </div>
              <div class="testimonial-item--ratings">
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star-half-o"></i></a>
              </div>
            </div><!-- testimonial-item end -->
            <div class="testimonial-item text-center">
              <div class="testimonial-item--header">
                <div class="thumb"><img src=" {{ asset('front_assets/assets/images/testimonial/1.jpg') }} " alt="image"></div>
                <h3 class="name">martin hook</h3>
                <span class="designation">business man</span>
              </div>
              <div class="testimonial-item--body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
              </div>
              <div class="testimonial-item--ratings">
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star"></i></a>
                <a href="#0"><i class="fa fa-star-half-o"></i></a>
              </div>
            </div><!-- testimonial-item end -->
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- testimonial-section end -->

  <!-- blog-section start -->




  <!-- subscribe-section start -->
  {{-- <section class="subscribe-section overlay-main bg_img pt-120 pb-120" data-background="{{ asset('front_assets/assets/images/bg1.jpg') }}"> 
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="subscribe-content-area text-center">
            <h2 class="title text-white">Subscribe Our News Latters for Get Update </h2>
            <form class="subscribe-form">
              <input type="email" name="subs_email" id="subs_email" placeholder="Enter your email address">
              <button type="submit" class="form-icon"><i class="fa fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  
  <!-- subscribe-section end -->


  <!-- consulting-section start -->

  {{-- <section class="consulting-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row mb-none-30">
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src=" {{ asset('front_assets/assets/images/brand-logo/1.png') }}" alt="image">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src=" {{ asset('front_assets/assets/images/brand-logo/2.png') }}" alt="image">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src=" {{ asset('front_assets/assets/images/brand-logo/3.png') }}" alt="image">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src=" {{ asset('front_assets/assets/images/brand-logo/4.png') }}" alt="image">
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-6">
          <div class="consulting-from-area">
            <h2 class="title">Request a Free Consultation</h2>
            <form class="consulting-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" name="cons_f_name" id="cons_f_name" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="cons_l_name" id="cons_l_name" placeholder="Last Name">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="email" name="cons_email" id="cons_email" placeholder="@lang('forms.email_address')">
                </div>
                <div class="form-group col-md-6">
                  <input type="tel" name="cons_phone" id="cons_phone" placeholder="@lang('forms.phone')">
                </div>
              </div>
              <div class="form-group">
                <textarea placeholder="Message"></textarea>
              </div>
              <button type="submit" class="cmn-btn">submit now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   --}}
  <!-- consulting-section end -->


  {{-- Modals --}}
{{--  reservation modal --}}



<div class="modal fade" id="modalReserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"> Extra User Information </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="car-item">
          <div class="thumb bg_img selected-car-image"  data-background="{{ asset('front_assets/assets/images/cars/2.jpg')}}">
            <img id="selected_car" src="{{asset('front_assets/assets/images/choose-us/1.fpg')}}" alt="" srcset="">
          </div>
          <div class="car-item-body">
            
            {{-- <div class="content">
              <h4 class="title">mirage range</h4>
              <span class="price">start form $20 @lang('carCards.per_day')</span>
              <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
              <a href="#0" class="cmn-btn">@lang('forms.rent_car')</a>
            </div> --}}

            <div class="car-item-meta">
              <ul class="details-list">
                <li><i class="fa fa-car"></i>model 2014ib</li>
                <li><i class="fa fa-tachometer"></i>32000 KM</li>
                <li><i class="fa fa-sliders"></i> auto </li>
              </ul>
            </div>
          </div>
        </div>

        <form id="frm-info" method="POST" action="" >
          @csrf
  
        <div style="background:#143c66" class="content-block">
          <h3 class="title">@lang('forms.personal_info')</h3>
          <div class="row">
            <div class="col-lg-6 form-group">
              <input name="names" type="text" placeholder="@lang('forms.names')">
            </div>
            <div class="col-lg-6 form-group">
              <input name="email" type="email" placeholder="@lang('forms.email_address')">
            </div>
            <div class="col-lg-6 form-group">
              <input name="telphone" type="tel" placeholder="@lang('forms.phone')">
            </div>
            <div class="col-lg-6 form-group">
              <input name="city" type="text" placeholder="@lang('forms.city')">
            </div>
            <div class="col-lg-6 form-group">
              <input name="zipcode" type="text" placeholder="@lang('forms.zip_code')">
            </div>
            <div class="col-lg-6 form-group">
              <select name="gender" id="gender">
                <option select>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-center">
          <button type="submit" class="btn btn-primary btn-block mt-10" value="@lang('forms.send_request')"> @lang('forms.send_request') </button>

        </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('forms.close')</button>
      </div>
    </div>
  </div>
</div>

{{-- rent a Car model --}}

<div class="modal fade" id="modalRent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"> @lang('forms.booking_information') </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-lg-5">

        <div class="form-container">

          <form class="car-search-form" id="frmRent">
            @csrf

            <input type="hidden" id="car_id_rent" name="car_id">
            
            <div class="row">
              <div class="form-group col-md-6">
                <i class="fa fa-map-marker"></i>
                <input id="pickup_rent" name="pickup" class="form-control has-icon" type="text" placeholder="@lang('forms.pickup_location')" required>
              </div>
              <div class="form-group col-md-6">
                <i class="fa fa-map-marker"></i>
                <input id="pickoff_rent" name="pickoff" class="form-control has-icon" type="text" placeholder="@lang('forms.dropoff_location')" required>
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <i class="fa fa-calendar"></i>
                <input id="pickup-date_rent" name="pickup-date" type='text'  class='form-control has-icon datepicker-here' data-language='en' placeholder="@lang('forms.pickup_date')" required>
              </div>
              <div class="form-group col-md-6">
                <i class="fa fa-clock-o"></i>
                <input id="pickup-time_rent" name="pickup-time" type="text"  class="form-control has-icon timepicker" placeholder="Pickup Time" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <i class="fa fa-calendar"></i>
                <input id="pickoff-date_rent" name="pickoff-date" type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="@lang('forms.dropoff_date')" required>
              </div>
              <div class="form-group col-md-6">
                <i class="fa fa-clock-o"></i>
                <input id="pickoff-time_rent" name="pickoff-time"type="text" class="form-control has-icon timepicker" placeholder="Drop Off Time" required>
              </div>
            </div>

            <div class="row mt-5">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Extra User Information </h5>

              
            <div style="background:#143c66" class="content-block">
              <h3 class="title text-red-300">@lang('forms.personal_info')</h3>
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input name="names" type="text" placeholder="@lang('forms.names')">
                </div>
                <div class="col-lg-6 form-group">
                  <input name="email" type="email" placeholder="@lang('forms.email_address')">
                </div>
                <div class="col-lg-6 form-group">
                  <input name="telphone" type="tel" placeholder="@lang('forms.phone')">
                </div>
                <div class="col-lg-6 form-group">
                  <input name="city" type="text" placeholder="@lang('forms.city')">
                </div>
                <div class="col-lg-6 form-group">
                  <input name="zipcode" type="text" placeholder="@lang('forms.zip_code')">
                </div>
                <div class="col-lg-6 form-group">
                  <select name="gender" id="gender">
                    <option select>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>

            </div>

            <button type="submit" class="cmn-btn btn-radius">Reservation</button>
          </form>
          
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('forms.close')</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('js')

<script>

// reservation
  var form = $('#frmReserve');
  var form2 = $('#frm-info');

  form.on('submit', function(e){
    e.preventDefault();
    console.log('submit....');
    var formData = new FormData(this);

    var id = $('#car_id').val();
    var url = "{{ route('front.car.show',':id')}}";
    url = url.replace(':id',id);


    $('#modalReserve').modal({
            backdrop: false,
            'keyboard':false
          });
   $('#modalReserve').modal('show');



    console.log(id,url);

     $.ajax({
        url: url,
        type: 'GET',
        // data: {id: id},
        dataType: 'json',
        success: function (response) {
          console.log(response);
          var car = response.car;

          $('.selected-car-image').data('background','front_assets/assets/images/cars/'+car.image);


          var form2 = $('#frm-info');

          form2.on('submit',function(e){
            e.preventDefault();
            var formData2 = new FormData(this);

            for (var pair of formData2.entries()) {
                formData.append(pair[0], pair[1]);
              }

      
              $.ajax({
                    url: "{{route('front.reserve')}}",
                    type: 'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                }).done(function (response) {
                    console.log(response.result);

                    if(response.result == "ok"){

                      form[0].reset();
                      $('#modalReserve').modal('hide');

                      Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your Request has been Saved',
                        showConfirmButton: false,
                        timer: 10000
                      })
                    }


                    // reload the table

                  }).fail(function (response) {
                    console.log(response);

                    var errors = "";
                    errors+="<b>"+response.responseJSON.message+"</b>";
                    var data=response.responseJSON.errors;

                    $.each(data,function (i, value) {
                        console.log(value);
                        if (i=='name'){
                            $('#ename').html(value[0])
                        }
                        $.each(value,function (j, values) {
                            errors += '<p>' + values + '</p>';
                        });
                    });

                    $('#update-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });


                });	 // /ajax

          });


        $('.btn-container-update').removeClass('d-none');
        $('.btn-container-update').addClass('d-flex');
        $('.spinner-border-update').hide();

        $("#edit_name").val(response.car.name);
       
        if(response.car.image){
        $("#stamp-placeholder").attr( 'src', '../uploads/images/' + response.car.image);
        }

        else{
        $("#stamp-placeholder").attr( 'src', '../admin_assets/img/ur_logo.png');
        }

            // add hidden id
            $('#id').val(response.car.id);
            // update - form


        } // /success


    }); // ajax function


  })



  // @lang('forms.rent_car')
  
  $('.btn-rent-car').on('click',function(e)
  {
    e.preventDefault();

    var id = $(this).data('car_id');
    var url = "{{ route('front.car.show',':id')}}";
    url = url.replace(':id',id);

    console.log(url);
    
    $('#modalRent').modal('show');
    


    $.ajax({
        url: url,
        type: 'GET',
        // data: {id: id},
        dataType: 'json',
        success: function (response) {
          console.log(response);

            console.log(response.car.id);
          $('#car_id_rent').val(response.car.id)

          var form3 = $('#frmRent'); 

          form3.on('submit', function (e){
            e.preventDefault();
            console.log('submit....');

            var formData = new FormData(this);
            for (var pair of formData.entries()) {
                console.log(pair[0], pair[1]);
              }


              $.ajax({
                    url: "{{route('front.reserve')}}",
                    type: 'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                }).done(function (response) {
                    console.log(response.result);

                    if(response.result == "ok"){


                      form3[0].reset();
                      $('#modalRent').modal('hide');

                      Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your Request has been received',
                        showConfirmButton: false,
                        timer: 10000
                      })
                    }

                    // form[0].reset();
                    // form[0].reset();
                    // reload the table

                }).fail(function (response) {
                    console.log(response);

                    var errors = "";
                    errors+="<b>"+response.responseJSON.message+"</b>";
                    var data=response.responseJSON.errors;

                    $.each(data,function (i, value) {
                        console.log(value);
                        if (i=='name'){
                            $('#ename').html(value[0])
                        }
                        $.each(value,function (j, values) {
                            errors += '<p>' + values + '</p>';
                        });
                    });
                    $('#update-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-glyphicon-remove"></i></strong><b>oops:</b>'+errors+'</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });
                });	 // /ajax




          })
        }



      });


  });


</script>
  
@endsection