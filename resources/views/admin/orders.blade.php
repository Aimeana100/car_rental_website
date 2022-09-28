@extends('admin.layout')
@section('css')

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
@endsection

@section('page_title','Cars')
@section('order_select','active')
@section('content')

<div class="content">

    <div  class="row breadcrumb-container d-flex justify-content-between pr-30">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb min-w-full bg-info">
              <li class="breadcrumb-item "><a href="#" class="text-dark">Dashboard</a></li>

              <li class="breadcrumb-item text-dark active" aria-current="page">Orders</li>
            </ol>
          </nav>
          {{-- <div class="mr-30">
            <a  href="#" data-toggle="modal" class="btn btn-primary btn-sm btn-flat btn-Add"><i class="fa fa-plus"></i> New Cars</a>
          </div> --}}
   </div>

  <div style="margin: 50px" class="container mt-30">
    <div class="row">

        <table id="SchoolTable" class="display nowrap mt-3 " style="width:100%">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Names </th>
                    {{-- <th> Email </th> --}}
                    <th> Telphone </th>
                    <th> Item Ordered </th>
                    <th> Request Date </th>
                    <th> Status </th>
                    {{-- <th> Tools </th> --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
  </div>
</div>


@endsection
@section('modals')
@include('admin.includes_modal.order_modal');
@endsection

@section('js')
<script>

    var table;
    var manageTable = $('#SchoolTable');

    //  Data table population Function

    function myFunc() {
        var defaultUrl = "{{ route('admin.orders.generalList') }}";

                table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'orders'
                    },
                    searching: true,
                    // ordering: true,
                    paging: true,
                    columns: [
                        {data: 'id'},
                        {data: 'names'},
                        // {data: 'email'},
                        {data: 'telphone'},
                        {data: 'id',
                        render: function (data, type, row){
                            return '<img width="90" src="../uploads/images/'+row.car.image+'">'
                        }
                         },
                        {data: 'orderDate'},


                        {
                            data: 'id',
                            render: function (data, type, row) {

                                return "<button class='btn btn-success btn-sm btn-flat js-view' data-id='" + data +
                                       "' data-url='/admin/orders/show/" + row.id + "'> <i class='fa fa-pen'></i>View</button>";

                                  

                            }
                        }
                    ]
                });
            }


        $(document).ready(function(){
            myFunc();

        $('.spinner-border-add').hide();
        // add

    $('.btn-Add').on('click', function(){
        var addNew_button = '<div class="add_field"><button class="btn btn-sm btn-add-field">add</button></div>';
        $("#addnew").modal({
            backdrop: 'static',
            keyboard: false
        });

        });

        //Edit and update
                manageTable.on('click', '.js-view', function () {
                    $('#edit').modal('show');
                    $('.btn-container-update').removeClass('d-flex');
                    $('.btn-container-update').addClass('d-none');
                    $('.spinner-border-update').show();

                    var url = $(this).attr('data-url');
                    var id = $(this).attr('data-id');
                    console.log(url);
                    console.log(id);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        // data: {id: id},
                        dataType: 'json',
                        success: function (response) {
                        
                         console.log(response.order[0]);
                         var order = response.order[0];


                        $('.btn-container-update').removeClass('d-none');
                        $('.btn-container-update').addClass('d-flex');
                        $('.spinner-border-update').hide();

                        $("#names").val(order.names);
                        $("#emails").val(order.email);
                        $("#telphone").val(order.telphone);
                        $("#pickup_place").val(order.pickup_place);
                        $("#pickoff_place").val(order.pickoff_place);
                       
                        $("#pickup_date").val(order.pickup_date);
                        $("#pickoff_date").val(order.pickoff_date);

                        $("#pickup_time").val(order.pickup_time);
                        $("#pickoff_time").val(order.pickoff_time);
                        $('#order_date').val(order.orderDate);
                        $('#car_name').val(order.car.name);



                        if(order.car.image){
                        $("#order_car").attr( 'src', '../uploads/images/' + order.car.image);
                        }

                        // else{
                        // $("#stamp-placeholder").attr( 'src', '../admin_assets/img/ur_logo.png');
                        // }
                            // add hidden id
                            $('#id').val(order.car.id);
                            // update - form
                            $('#frmUpdate').unbind('submit').bind('submit', function (e) {
                                e.preventDefault();
                                var form = $(this);
                                console.log(form);

                                // form.parsley().validate();
                                // if (!form.parsley().isValid()) {
                                //     return false;
                                // }

                                formData = new FormData(form[0]);

                                // for(var pair of formData.entries() ){
                                //     console.log(pair[0], pair[1])
                                // } 

                                // console.log(form.attr('action'));
                                
                                // return false;

                                $('.spinner-border-add').show();

                                $.ajax({
                                    url: form.attr('action'),
                                    type: 'POST',
                                    data: formData,
                                    cache:false,
                                    contentType: false,
                                    processData: false,
                                }).done(function (response) {
                                    console.log(response);

                                   form[0].reset();
                                    // reload the table
                                    table.destroy();
                                    myFunc();
                                    $('#update-messages').html('<div class="alert alert-success alert-success-update">' +
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Cars  successfully updated. </div>');

                                    $(".alert-success-update").delay(500).show(10, function () {
                                        $(this).delay(3000).hide(10, function () {
                                            $(this).remove();
                                        });
                                    }); //.alert


                                    setTimeout(function() {
                                        $('#edit').modal('hide');
                                    }, 3000);




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

                                return false;
                            }); // /update - form

                        } // /success
                    }); // ajax function

                    
                });


    })



    </script>

    @endsection
