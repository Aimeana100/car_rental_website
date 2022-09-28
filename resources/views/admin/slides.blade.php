@extends('admin.layout')

@section('page_title','Slides')
@section('homeSlides_select','active')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  
@endsection
@section('content')

<div class="content">

    <div  class="row breadcrumb-container d-flex justify-content-between pr-30">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb bg-info">

              <li class="breadcrumb-item "><a href="#" class="text-dark">Dashboard</a></li>

              <li class="breadcrumb-item text-dark active" aria-current="page">Slides</li>
            </ol>
            <div class="mr-30">
                <a  href="#" data-toggle="modal" class="btn btn-primary btn-sm btn-flat btn-Add"><i class="fa fa-plus"></i> New Slide</a>
              </div>
          </nav>
      
   </div>

  <div style="margin: 50px" class="container mt-30">
    <div class="row">

        <table id="SchoolTable" class="display nowrap mt-3 " style="width:100%">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Banner Image </th>
                    <th> Title </th>
                    <th> Description </th>                   
                    <th> Tools </th>
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
@include('admin.includes_modal.slides_modal');
@endsection

@section('js')
<script>

    var table;
    var manageTable = $('#SchoolTable');

    //  Data table population Function

    function myFunc() {
        var defaultUrl = "{{ route('admin.slides.generalList') }}";

                table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'slides'
                    },
                    searching: true,
                    // ordering: true,
                    paging: true,
                    columns: [
                        {data: 'id'},
                        {data: 'id',
                        render: function (data, type, row){
                            return '<img width="120" src="../uploads/images/' + row.image+'">';
                        }
                        },
                        {data: 'title'},
                        {data: 'description'},
                        {
                            data: 'id',
                            render: function (data, type, row) {

                                return "<button class='btn btn-success btn-sm btn-flat js-edit' data-id='" + data +
                                    "' data-url='/admin/slides/show/" + row.id + "'> <i class='fa fa-pen'></i>Edit</button>"+

                                     "<button class='btn btn-danger btn-sm btn-flat js-delete' data-id='" + data +
                                    "' data-url='/admin/slides/destroy/" + row.id + "'> <i class='fa fa-pen'></i>Delete</button>";

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

        var college_info_container = $('.college-info-container:last');
        // college_info_container.append('addNew_button');

        });


manageTable.on('click', '.js-delete', function(e){
    e.preventDefault();

 Swal.fire({
  title: 'Are you sure?',
  text: "Do you rearly want to clear this slide??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   
    var url = $(this).attr('data-url');
    var id = $(this).attr('data-id');
    console.log(url);

    $.ajax({
        url: url,
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        success: function (response) {
            if(response.result == "ok"){
                Swal.fire({
                title: '<strong>Change status</strong>',
                icon: 'info',
                html: "Slide Cleared successfully" ,
                })         
                   // reload the table
                    table.destroy();
                    myFunc();
            }
        }
  });

 
  }
})

});


    //Edit and update
    manageTable.on('click', '.js-edit', function () {
                $('#edit').modal('show');
                $('.btn-container-update').removeClass('d-flex');
                $('.btn-container-update').addClass('d-none');
                $('.spinner-border-update').show();

                var url = $(this).attr('data-url');
                var id = $(this).attr('data-id');
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {id: id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);

                $('.btn-container-update').removeClass('d-none');
                $('.btn-container-update').addClass('d-flex');
                $('.spinner-border-update').hide();

                $("#edit_title").val(response.slide.title);
                $("#edit_description").val(response.slide.description);
                if(response.slide.image){
                $("#stamp-placeholder").attr( 'src', '../uploads/images/' + response.slide.image);
                }
                else{
                $("#stamp-placeholder").attr( 'src', '../uploads/images/1640520398ciy3.jpg');
                }

                        // add hidden id
                        $('#id').val(response.slide.id);
                        // update - form
                        $('#frmUpdate').unbind('submit').bind('submit', function (e) {
                            e.preventDefault();
                            var form = $(this);
                            console.log(form);
                            // console.log(form, new FormData(form).values());

                            // form.parsley().validate();
                            // if (!form.parsley().isValid()) {
                            //     return false;
                            // }
                            $('.spinner-border-add').show();

                            $.ajax({
                                url: form.attr('action'),
                                type: 'POST',
                                data: new FormData(document.getElementById('frmUpdate')),
                                cache:false,
                                contentType: false,
                                processData: false,
                            }).done(function (response) {
                               form[0].reset();
                                // reload the table
                                table.destroy();
                                myFunc();
                                $('#update-messages').html('<div class="alert alert-success alert-success-update">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Slide  successfully updated. </div>');

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




    $('#frmSave').submit(function(event){
        event.preventDefault();
                var form = $(this);
                var btn = $('#btnSave');
                var formData = new FormData(this);

                $('.btn-container-add').removeClass('d-flex');
                $('.btn-container-add').addClass('d-none');
                $('.spinner-border-add').show();

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

                    if (data.result=="ok"){
                        btn.button('reset');
                        form[0].reset();

                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success alert-message flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> QR code successfully created </div>');

                        $(".alert-message").delay(500).show(10, function () {
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

    @endsection
