
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href=" {{ asset('front_assets/assets/images/TTTR.jpg') }}">
  <link rel="icon" type="image/png" href=" {{ asset('front_assets/assets/images/TTTR.jpg') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    Admin| @yield('page_title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />


  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
 
  <!-- CSS Files -->
  <link href=" {{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href=" {{ asset('admin_assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

  @yield('css')

</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="/admin/dashboard" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('admin_assets/img/logo-small.png') }}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="/admin/dashboard" class="simple-text logo-normal">
          {{auth()->User()->name}}
           <div class="logo-image-big">
            <img width="80" src="{{ asset('images/TTTR.jpg') }}">
            {{-- <a href="{{url('/dashboard')}}"> <span>Logo</span> </a> --}}
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="@yield('dashboard_select')">
            <a href="{{url('/dashboard')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="@yield('homeSlides_select')">
            <a href="{{url('/admin/slides')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Home Slides</p>
            </a>
          </li>

          <li class="@yield('category_select')">
            <a href="{{url('/admin/categories')}}">
              <i class="nc-icon nc-paper"></i>
              <p>Car Categories</p>
            </a>
          </li>

          <li class="@yield('car_select')">
            <a href="{{url('/admin/cars')}}">
              <i class="nc-icon nc-shop"></i>
              <p>Cars</p>
            </a>
          </li>

          {{-- <li class="@yield('feature_select')">
            <a href="{{url('/admin/features')}}">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Car Feature</p>
            </a>
          </li> --}}

          <li class="@yield('order_select')">
            <a href="{{url('/admin/orders')}}">
              <i class="nc-icon nc-badge"></i>
              <p>Orders</p>
            </a>
          </li>

          <li class="@yield('contacts_select')">
            <a href="{{url('/admin/contacts')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Client Contacts</p>
            </a>
          </li>

          <li class="@yield('_select')">
            <a target="_blank" href="https://analytics.google.com/analytics/web/#/p300312144/reports/reportinghub">
              <i class="nc-icon nc-single-02"></i>
              <p> Web analytics</p>
            </a>
          </li>


          <li class="@yield('setting_select')">
            <a target="_blank" onclick= "return confirm('Do you want to open web mail??')" href="http://trustedcarrental.com/webmail">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>Web Mails</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Logged In as : Admin </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a id="profile-link" class="dropdown-item" href="#">Profile</a>
                  {{-- <a id="change-pass-link" class="dropdown-item" href="#">Change password</a> --}}
                   <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('frmLogaut').submit();">Logaut</a>
                   <form id="frmLogaut" method="post" action="{{route('logout')}}"> @csrf</form>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

@yield('content')




      <footer style="position: fixed; bottom:0px" class="footer footer-black   footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="/admin/dashboard" target="_blank"> © Trusted Tours Travels Rwanda Ltd</a></li>
                <li><a href="{{ route('front.blogs')}} " target="_blank">Blog</a></li>
                {{-- <li><a href="http://santechrwanda.com/" target="_blank">by San Tech</a></li> --}}
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> 
                <a href="http://santechrwanda.com/" target="_blank">by San Tech</a>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>






  {{--  Change Password Modal  --}}


{{-- add new --}}

<div class="modal fade" id="changePassword">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle">Change Password </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
          </div>

          <div class="modal-body shadow-sm vh-40">
       
              <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">

                  <div class="col-sm-12">
                   <h1> <b>1.</b> Logout </h1>
                  </div>
              </div>

              <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">

                <div class="col-sm-12 ">
                  <h1> <b>2.</b> Go to Login or Home Page / down to useful links </h1>

                </div>
            </div>

            <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">

              <div class="col-sm-12">
                <h1> <b> 3. </b>  Reset password  </h1>

              </div>
          </div>
        
      </div>
  </div>
</div>
</div>






  {{--  Change Password Modal  --}}


{{-- add new --}}

<div class="modal fade" id="updateProfile">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle">Change Password </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
          </div>

          <div class="modal-body shadow-sm vh-40">
          <fieldset>
              <legend> </legend>

              {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

              <form id="frmChange-pass" class="form-horizontal p-sm-3 p-md-4" method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data" >
              @csrf
              <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">
                  <label for="profileNames" class="col-sm-4 col-md-4 control-label"> Names</label>

                  <div class="col-sm-7 col-md-8">
                    <input type="text" class="form-control border-1 shadow-inner  rounded-md" id="profileNames" name="names"   required>
                  </div>
              </div>

              <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">
                <label for="profileEmail" class="col-sm-4 col-md-4 control-label"> Email</label>

                <div class="col-sm-7 col-md-8">
                  <input type="text" class="form-control border-1 shadow-inner  rounded-md" id="profileEmail" name="email"  required>
                </div>
            </div>

            <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">
              <label for="profileTelphone" class="col-sm-4 col-md-4 control-label"> Telphone</label>

              <div class="col-sm-7 col-md-8">
                <input type="text" class="form-control border-1 shadow-inner  rounded-md" id="profileTelphone" name="profileTelphone" required>
              </div>
          </div>

          <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">
            <label for="password" class="col-sm-4 col-md-4 control-label"> Password</label>

            <div class="col-sm-7 col-md-8">
              <input type="password" class="form-control border-1 shadow-inner  rounded-md" id="password" name="password" required>
            </div>
          </div>

          <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">
            <label for="password_confirmation" class="col-sm-4 col-md-4 control-label"> Re-Password</label>

            <div class="col-sm-7 col-md-8">
              <input type="password" class="form-control border-1 shadow-inner  rounded-md" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>
         <div class="d-flex justify-content-center align-items-center align-content-center  "> <span class="error text-danger">  </span> </div>


              <div class="d-flex justify-content-center btn-container-change-pass m-auto">
              <button id="btnChange-pass" type="submit" class="btn btn-info bg-blue uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-l transition duration-150 ease-in-out btnChange-pass" name="add">
                <i class="fa fa-save"></i> Update</button>

              </div>

             <div class="d-flex justify-content-center">
                 <div style="margin: auto" class="spinner-border  spinner-border-change-pass" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
              </div>

          </form>
          <div id="change-pass-messages"></div>


          </fieldset>
          <div class="modal-footer mt-40">
            <button type="button" class="btn btn-default px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          </div>
      </div>
  </div>
</div>
</div>

@yield('modals')


  <!--   Core JS Files   -->
  {{-- <script src="{{ asset('admin_assets/js/core/jquery.min.js') }}"></script> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="{{ asset('admin_assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!-- Chart JS -->
  <script src="{{ asset('admin_assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('admin_assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin_assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>

  {{-- <!-- Paper Dashboard DEMO methods, don't include it in your ') }}project! --> --}}

  {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.js"></script>

  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>  --}}


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- parsley validation --}}
  <script src="{{ asset('js/parsley/parsley.min.js') }}"></script>

<script>


$('#change-pass-link').on('click',function(e){
    $('#changePassword').modal({
      backdrop: 'static',
      show: true
    });
  });

  $('#profile-link').on('click',function(e){
    $('#updateProfile').modal({
      backdrop: 'static',
      show: true
    });
    $('.spinner-border-change-pass').removeClass('d-flex').addClass('d-none');

   

    $.ajax({
        url: "{{route('admin.profile')}}",
        method: 'GET',
        dataType: "JSON",
        contentType: false,
        cashe: false,
        processData: false,
    }).done(function (data) {
        console.log(data);
        var user = data.user;

        $('#profileEmail').val(user.email);
        $('#profileNames').val(user.name);
        $('#profileTelphone').val(user.telphone);
    });
  

    $('#frmChange-pass').submit(function(event){
        event.preventDefault();
                var form = $(this);
                var btn = $('#btnChange-pass');
                var formData = new FormData(this);

                $('.btn-container-change-pass').removeClass('d-flex');
                $('.btn-container-change-pass').addClass('d-none');
                $('.spinner-border-change-pass').show();

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cashe: false,
                    processData: false,
                }).done(function (data) {
                    console.log(data);

                    $('.btn-container-change-pass').removeClass('d-none');
                    $('.btn-container-change-pass').addClass('d-flex');
                    $('.spinner-border-change-pass').hide();

                    if(data.result=="error"){
                      let errors = "<ul>";

                      $.each(data.message,function(i, value){
                        errors += "<li>"+ value +"</li>"; 

                      })
                       errors += "</ul>";
                     $('span.error').html(errors);
                     $('')
                    }

                    if (data.result=="ok"){
                        // form[0].reset();
                        $('span.error').removeClass('text-danger').addClass('text-success').html('Successfully account Updated');

                      
                        $('#change-pass-messages').html('<div class="alert alert-success alert-message flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Profile successfully saved.</div>');

                        $("#change-pass-messages .alert-message").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });

                        $('.btn-container-add').removeClass('d-none');
                        $('.btn-container-add').addClass('d-flex');
                        $('.spinner-border-add').hide();
                    }

                }).fail(function (response) {
                    console.log(response.responseJSON);

                    btn.button('reset');
//                    showing errors validation on pages

                    var option = "";
                    option+=response.responseJSON.message;
                    var data=response.responseJSON.errors;
                    $.each(data,function (i, value) {
                        console.log(value);

                        $.each(value,function (j, values) {
                            option += '<p>' + values + '</p>';
                        });
                    });
                    $('#add-messages').html('<div class="alert alert-danger alert-message flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>'+option+'</div>');

                    $(".alert-message").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });

                    $('.btn-container-add').removeClass('d-none');
                    $('.btn-container-add').addClass('d-flex');
                    $('.spinner-border-add').hide();

                    //alert("Internal server error");
                });
                return false;
         })


  })

</script>

  @yield('js')

</body>
</html>
