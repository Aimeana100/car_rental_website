

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Order Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

                <form id="frmUpdate" class="form-horizontal" method="POST" action="">
                 @csrf


                 <div class="row">

                <div class="row col-7 card">

                    <div class="form-group form-content col-md-12 ">
                        <label for="order_date" class="col-lg-12 control-label"> Order Customer Order Date </label>
    
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="order_date" name="order_date" required>
                        </div>
                    </div>

                    <div class="form-group form-content col-md-12 ">
                        <label for="names" class="col-lg-12 control-label"> Order Customer Names </label>
    
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="names" name="names" required>
                        </div>
                    </div>

                    <div class="form-group form-content col-md-12 ">
                        <label for="emails" class="col-lg-12 control-label"> Order Customer Email </label>
    
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="emails" name="emails" required>
                        </div>
                    </div>
                 </div>


                 <div class="row col-md-4 card">

                    <div class="form-group form-content col-md-12 ">
                        <label for="order_date" class="col-lg-12 control-label"> Order Car </label>
    
                        <div class="col-lg-12">
                            <img sr="" id="order_car" >
                        </div>
                    </div>

                    <div class=" form-content col-md-12 ">
                        <label for="car_name" class="col-lg-12 control-label"> Order Car name </label>
    
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="car_name" name="car_name" required>
                        </div>
                    </div>

                 </div>


                 </div>
           


                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="telphone" class="col-lg-5 control-label"> Order Customer Telphone </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="telphone" name="telphone" required>
                        </div>
                    </div>

                 </div>



                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="pickup_place" class="col-lg-5 control-label"> Order Pickup Place </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="pickup_place" name="pickup_place" required>
                        </div>
                    </div>

                 </div>


                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="pickoff_place" class="col-lg-5 control-label"> Order pick-off Place </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="pickoff_place" name="pickoff_place" required>
                        </div>
                    </div>

                 </div>


                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="pickup_date" class="col-lg-5 control-label"> Order Pickup Date  </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="pickup_date" name="pickup_date" required>
                        </div>
                    </div>

                 </div>



                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="pickoff_date" class="col-lg-5 control-label"> Order Pickoff Date </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="pickoff_date" name="pickoff_date" required>
                        </div>
                    </div>

                 </div>


                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="pickup_time" class="col-lg-5 control-label"> Order Pick-up time </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="pickup_time" name="pickup_time" required>
                        </div>
                    </div>

                 </div>


                 <div class="row card">

                    <div class="form-group form-content col-md-10 ">
                        <label for="pickoff_time" class="col-lg-5 control-label"> Order Pic Time </label>
    
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="pickoff_time" name="pickoff_time" required>
                        </div>
                    </div>

                 </div>




             
                <input type="hidden" id="id" name="id">

                {{-- <div class="d-flex justify-content-center btn-container-update- m-auto">
                <button id="btnUpdate" type="submit" class="btn btn-primary btn-flat btnUpdate" name="update"><i class="fa fa-save"></i> Update</button>

                </div> --}}

               <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border spinner-border-update" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </div>

            </form>

            <div id="update-messages"></div>

            <div class="modal-footer mt-40">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
</div>

