

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Contacts messages details </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Contacts Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

                <form id="" class="form-horizontal" method="POST" action="">
                 @csrf

                <div class="row">

                    <div id="entry_1" class="form-group row form-content col-md-6">
                        <label for="edit_name" class="col-lg-4 control-label">Contact Name</label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                        </div>
                    </div>

                    <div id="entry_1" class="form-group row form-content col-md-6">
                        <label for="edit_model" class="col-lg-4 control-label">Car Model</label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="edit_model" name="edit_model" required>
                        </div>
                    </div>


                 </div>

                 <div  class="form-group row form-content entry_2 col-md-6 ">
                    <label for="edit_image" class="col-lg-4 control-label"> Descptive Image </label>
                    <div class="col-lg-7">
                      <input style="border: 1px black solid; " type="file" class="form-control" id="edit_image" name="image">
                    </div>

                    <div class="image-edit-placeholder-container text-center d-flex justfy-content-center pt-30 m-30">
                        <img class="m-auto" height="60" src="" alt="" id="stamp-placeholder">
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

