@extends('front.layoult')
@section('contact_selected', 'active')

@section('content')


  
  <!-- inner-apge-banner start -->
  <section class="inner-page-banner bg_img overlay-3" data-background=" {{asset('front_assets/assets/images/inner-page-bg.jpg')}} ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-title"> @lang('contact.get_in_touch') </h2>
          <ol class="page-list">
            <li><a href=" {{ route('front.home')}} "><i class="fa fa-home"></i>  @lang('layoult.home') </a></li>
            <li> @lang('layoult.contact') </li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->




  <!-- call-action-section start -->
  <section class="call-action-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="call-action-img text-lg-left text-center">
            <img src=" {{ asset('front_assets/assets/images/elements/call-action-personj-modified.png') }} " alt="image">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="call-cation-content">
            <h3 class="top-title"> @lang('contact.call_us_for_support') </h3>
            <span class="call-number"> +250790558704 / +250784459626 </span>
            <p>
              @lang('contact.call_us_for_support_desc')
            </p>
            <a href="tel:+250790558704" class="cmn-btn"> @lang('contact.call_us') </a>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- call-action-section end -->

  <!-- contact-section start -->
  <section class="contact-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="contact-item text-center">
            <div class="icon"><i class="fa fa-home"></i></div>
            <div class="content">
              <h4 class="title"> @lang('contact.address')</h4>
              <p> Kigali Rwanda 
              <br> 24/7 @lang('contact.online_support') </p>
               
            </div>
          </div>
        </div><!-- contact-item end -->
        <div class="col-lg-4">
          <div class="contact-item text-center">
            <div class="icon"><i class="fa fa-phone"></i></div>
            <div class="content">
              <h4 class="title"> @lang('contact.telphone') </h4>
              <p>+250 790 558 704<br/> +250 784 459 626 <br/></p>
            </div>
          </div>
        </div><!-- contact-item end -->
        <div class="col-lg-4">
          <div class="contact-item text-center">
            <div class="icon"><i class="fa fa-envelope-o"></i></div>
            <div class="content">
              <h4 class="title"> @lang('contact.email') </h4>
              <p>info@trustedcarrental.com <br>
                 trustedtourscarrental@gmail.com 
                
              </p>
            </div>
          </div>
        </div><!-- contact-item end -->
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-form-area">
            <h3 class="title"> @lang('contact.send_your_message') </h3>

            <form id="contact-form" method="POST" class="contact-form">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="frm-group">
                    <input type="text" name="contact_name" id="contact_name" placeholder="@lang('contact.name*')">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="frm-group">
                    <input type="email" name="contact_email" id="contact_email" placeholder="@lang('contact.email*')">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="frm-group">
                    <textarea name="contact_comment" placeholder="@lang('contact.write_your_comment')"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="frm-group">
                    <input type="submit" name="contact_submit" id="contact_submit" value="@lang('contact.send_your_message')">
                  </div>
                </div>
              </div>
              <h3 style="color: green" id="lmsgSubmit" class="text-success"></h3>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact-section end -->

    
@endsection

@section('js')

{{-- <script src="assets/js/jquery.validate.min.js"></script> --}}
<script src="{{ asset('front_assets/assets/js/jquery.validate.min.js') }}"></script>


<script>


//  contacts us  form


$('#contact-form').validate({
  rules:{
    contact_name: 'required',
    contact_comment: 'required',
    contact_email: {
      "required": true,
      "email": true
    }
  },
  messages: {
    contact_name: "Your names required",
    contact_email: "Enter a valid email",
    contact_comment: 'Leave you comment',
  },
submitHandler: function(form,event) {
    event.preventDefault();
    // $(form).ajaxSubmit();
    // console.log($('#subscribe-frm').serialize());

    $.ajax({
        type: "POST",
        url: "{{route('front.contact.store')}}",
        data: new FormData($('#contact-form')[0]),
        processData: false,
        contentType: false,
        // cache: false,
      }).done(function (data_back ) {
        console.log(data_back);
        lformSuccess();

      }).fail(function(error){
        console.log(error);
        lformError();
      });


    function lformSuccess() {
      $("#contact-form")[0].reset();
      lsubmitMSG(true, 'Thank you for contacting us we will reach out of you via email');
      $("input").removeClass('notEmpty'); // resets the field label after submission
  }

  function lformError() {
      $("#contact-form").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass();
      });
}

  function lsubmitMSG(valid, msg) {
      if (valid) {
          var msgClasses = "h3 text-center tada animated";
      } else {
          var msgClasses = "h3 text-center bg-success";
      }
      $("#lmsgSubmit").removeClass().addClass(msgClasses).text(msg);
  }

  }
});




</script>
 
@endsection