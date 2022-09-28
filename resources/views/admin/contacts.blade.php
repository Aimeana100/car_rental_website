@extends('admin.layout')

@section('page_title','Contacts')
@section('contacts_select','active')

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

              <li class="breadcrumb-item text-dark active" aria-current="page">Contacts</li>
            </ol>

          </nav>
      
   </div>

  <div style="margin: 50px" class="container mt-30">
    <div class="row">

        <table id="SchoolTable" class="display nowrap mt-3 " style="width:100%">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Names </th>
                    <th> Email </th>
                    <th> Comment </th>
                    <th> Contact Date </th>
                   
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
@include('admin.includes_modal.contacts_modal');
@endsection

@section('js')
<script>

    var table;
    var manageTable = $('#SchoolTable');

    //  Data table population Function

    function myFunc() {
        var defaultUrl = "{{ route('admin.contacts.generalList') }}";

                table = manageTable.DataTable({
                    ajax: {
                        url: defaultUrl,
                        dataSrc: 'contacts'
                    },
                    searching: true,
                    // ordering: true,
                    paging: true,
                    columns: [
                        {data: 'id'},
                        {data: 'contact_name'},
                        {data: 'contact_email'},
                        {data: 'contact_comment'},
                        {data: 'contact_date'},
                        {
                            data: 'car_id',
                            render: function (data, type, row) {

                                return "<button class='btn btn-success btn-sm btn-flat js-edit' data-id='" + data +
                                    "' data-url='/admin/contacts/show/" + row.id + "'> <i class='fa fa-pen'></i>View</button>";

                        
                            }
                        }
                    ]
                });
            }


        $(document).ready(function(){
            myFunc();

        $('.spinner-border-add').hide();
        // add

     

    })



    </script>

    @endsection
