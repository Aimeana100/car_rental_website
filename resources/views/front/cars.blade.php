@extends('front.layoult')
@section('cars_selected', 'active')

@section('content')



  <!-- inner-apge-banner start -->
  <section class="inner-page-banner bg_img overlay-3" data-background="{{asset('front_assets/assets/images/inner-page-bg.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-title"> @lang('layoult.cars') </h2>
          <ol class="page-list">
            <li><a href=" {{ route('front.home')}} "><i class="fa fa-home"></i> @lang('layoult.home')  </a></li>
            <li><a href="#0"> @lang('layoult.car_list') </a></li>
            <li> @lang('forms.rent_car') </li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->

  <!-- car-search-section start -->
  <section class="car-search-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="car-search-filter-area">
            <div class="car-search-filter-form-area">

              <form method="GET"  class="car-search-filter-form">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="cart-sort-field">
                      <span class="caption"> @lang('cars.sort_by') : </span>
                      <select name="sort" id="sortBy_value">
                        <option value="" > @lang('cars.sort_default') </option>
                        <option value="name" > @lang('cars.sort_name') </option>
                        <option value="price-high" > @lang('cars.sort_price_high') </option>
                        <option value="price-low" > @lang('cars.sort_price_low') </option>
                      </select>
                    {{-- <form action="" method="GET" id="frmSort" > <input type="hidden" name="sort" id="sort"> </form> --}}

                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-6 d-flex">
                    <input type="text" name="car_search" id="car_search" placeholder=" @lang('cars.serch_what_you_want') ">
                    <button class="search-submit-btn"> @lang('cars.search') </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="view-style-toggle-area">
              <button class="view-btn list-btn"><i class="fa fa-bars"></i></button>
              <button class="view-btn grid-btn active"><i class="fa fa-th-large"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-70">
        <div class="col-lg-8">
          <div class="car-search-result-area grid--view row mb-none-30">

            @foreach ($cars as $car)


            <div class="col-md-6 col-12">
              
              <div class="car-item">
                <div class="thumb bg_img" data-background="{{asset('/uploads/images')}}/{{$car->car_image}}"></div>
                <div class="car-item-body">
                  <div class="content">
                    <h4 class="title"> {{$car->car_name}} </h4>
                    <div class="car-desk row">

                      <div class="col-6">
                        <span class="price"> <b>{{$car->per_day}} $ </b> @lang('carCards.per_day')</span>
                        <br>
                        <span class="price"> <b>{{$car->per_month}} $</b> @lang('carCards.per_month')</span>
                      </div>
                      <div class="col-6">
                        <p><i class="fas fa-gas-pump"></i> {{ \Illuminate\Support\Str::limit($car->description, 100, $end='...') }}</p>
                      </div>
                    </div>

            
                    <a href="#0" car_id="{{$car->id}}" data-car_id="{{$car->id}}" class="cmn-btn rent-car btn-rent-car">@lang('forms.rent_car')</a>
                  </div>
                  <div class="car-item-meta">
                    <ul class="details-list">
                      <li><i class="fa fa-car"></i> {{$car->model}} </li>
                      <li><i class="fa fa-tachometer"></i> {{$car->seats }} @lang('carCards.seats')</li>
                      <li><i class="fa fa-sliders"></i> {{ $car->transmission}} </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div><!-- car-item end -->
              
            @endforeach
          </div>

          {{-- @if ($cars->hasPages()) --}}
          <div class="d-flex justify-content-center">
            {!! $cars->links() !!}
        </div>
          {{-- @endif --}}

   
          {{-- <nav class="d-pagination" aria-label="Page navigation example"> --}}

            {{-- <ul class="pagination justify-content-center">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul> --}}
          {{-- </nav> --}}

        </div>
        <div class="col-lg-4">
          <aside class="sidebar">
            <div class="widget widget-reservation">
              <h4 class="widget-title">reservation</h4>
              <div class="widget-body">
                <form class="car-search-form" id="frmReserve">
                  <div class="row">
                    <div class="col-lg-12 form-group">

                      <select name="car_id_1" id="car_id" required>
                        <option > @lang('forms.choose_your_car_type') </option>
                        @foreach ($cars as $item)
                        <option value="{{$item->id}}"> {{$item->car_name}} / {{$item->category->name}} </option>
                        @endforeach

                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-map-marker"></i>
                      <input id="pickup" name="pickup" class="form-control has-icon" type="text" placeholder="@lang('forms.pickup_location')" required>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-map-marker"></i>
                      <input id="pickoff" name="pickoff" class="form-control has-icon" type="text" placeholder="@lang('forms.dropoff_location')" required>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-calendar"></i>
                      <input id="pickup-date" name="pickup-date" type='text'  class='form-control has-icon datepicker-here' data-language='en' placeholder="@lang('forms.pickup_date')" required>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-clock-o"></i>
                      <input id="pickup-time" name="pickup-time" type="text"  class="form-control has-icon timepicker" placeholder="Pickup Time" required>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-calendar"></i>
                      <input id="pickoff-date" name="pickoff-date" type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="@lang('forms.dropoff_date')" required>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-clock-o"></i>
                      <input id="pickoff-time" name="pickoff-time"type="text" class="form-control has-icon timepicker" placeholder="Drop Off Time" required>
                    </div>
                  </div>
                  <button type="submit" class="cmn-btn">@lang('forms.book_now')</button>
                </form>
              </div>
            </div><!-- widget end -->

            {{-- <div class="widget widget-price-filter">
              <h4 class="widget-title">price filter</h4>
              <div class="widget-body">
                <div id="slider-range"></div>
                <div class="filter-price-result">
                  <input type="text" id="amount" class="slider_amount" value><span>(@lang('carCards.per_day'))</span>
                </div>
              </div>
            </div> --}}


            <!-- widget end -->

            {{-- <div class="widget widget-testimonial">
              <h4 class="widget-title">testimonial</h4>
              <div class="widget-body">
                <div class="testimonial-slider owl-carousel">
                  <div class="testimonial-item">
                    <div class="testimonial-item--header">
                      <div class="thumb"><img src="assets/images/testimonial/1.jpg" alt="image"></div>
                      <div class="content">
                        <h6 class="name">martin hook</h6>
                        <span class="designation">business man</span>
                      </div>
                    </div>
                    <div class="testimonial-item--body">
                      <p>Tristique consequat, lorem sed vivamus donec eget, nulla pharetra lacinia wisi diamaliquam velit nec.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            
            <!-- widget end -->
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- car-search-section end -->





  
  <!-- rent-step-section start -->
  <section class="rent-step-section pb-120">
    <div class="element-one"> <img src="{{ asset('front_assets/assets/images/cars/toyota-picnic.png') }} " alt="image"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block-area">
            <div class="block-header">
              <h2 class="title"> @lang('cars.welcome_to_company')  </h2>
              <p>
                @lang('cars.welcome_to_company_desc')
              </p>
            </div>
            <div class="block-body">
              <ul class="num-list">
                <li><span class="num">01</span> @lang('cars.guide_step1') </li>
                <li><span class="num">02</span> @lang('cars.guide_step2') </li>
                <li><span class="num">03</span> @lang('cars.guide_step3') </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- rent-step-section end -->


  

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
          <div class="thumb bg_img" data-background="{{ asset('front_assets/assets/images/cars/2.jpg')}}">
            <img id="selected_car" src="{{asset('front_assets/assets/images/cars/2.jpg')}}" alt="" srcset="">
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

            <button type="submit" class="cmn-btn btn-radius">@lang('forms.book_now')</button>
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
            'backdrop': false,
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
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
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
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 6000
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

  // fileter search

  $('#sortBy_value').on('change',function(e){
    $(this).closest('form').submit();
  });

  // $('.slider_amount').on('change',function(e){
  //   alert();
  // });


</script>
  
@endsection