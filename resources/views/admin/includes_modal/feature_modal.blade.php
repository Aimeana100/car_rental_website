


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Feature</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend> Feature Info </legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

                
                <form id="frmUpdate" class="form-horizontal" method="POST" action="{{route('admin.features.update')}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group row form-content entry_1">
                    <label for="edit_feature_name" class="col-sm-4 control-label">Car Feature Name</label>

                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_feature_name" name="edit_feature_name" required>
                    </div>

                </div>



                <input type="hidden" id="id" name="id">

                <div class="d-flex justify-content-center btn-container-update- m-auto">
                <button id="btnUpdate" type="submit" class="btn btn-primary btn-flat btnUpdate" name="update"><i class="fa fa-save"></i> Update</button>
                </div>

               <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border spinner-border-update" role="status">
                     <span class="sr-only">Loading...</span>
                   </div>
                </div>

            </form>
            <div id="update-messages"></div>

            </fieldset>
            <div class="modal-footer mt-40">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>
</div>


{{-- add new --}}

<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Add Car Feature</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            </div>

            <div class="modal-body shadow-sm vh-40">
            <fieldset>
                <legend>Car Feature Info</legend>

                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

                <form id="frmSave" class="form-horizontal p-sm-3 p-md-4" method="POST" action="{{route('admin.features.create')}}" enctype="multipart/form-data" >
                @csrf
                <div id="" class="entry_1 form-group row form-content m-md-2 rounded-md border-slate-200 shadow-inner">
                    <label for="feature_name" class="col-sm-4 col-md-4 control-label">Car Feature Name</label>

                    <div class="col-sm-7 col-md-8">
                      <input type="text" class="form-control border-1 shadow-inner  rounded-md" id="feature_name" name="feature_name" required>
                    </div>
                </div>

           
                <div class="d-flex justify-content-center btn-container-add m-auto">
                <button id="btnSave" type="submit" class="btn px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out btn-flat btnSave" name="add"><i class="fa fa-save"></i> Save</button>

                </div>

               <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border  spinner-border-add" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </form>
            <div id="add-messages"></div>


            </fieldset>
            <div class="modal-footer mt-40">
              <button type="button" class="btn btn-default px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
</div>


