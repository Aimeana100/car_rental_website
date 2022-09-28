

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Car</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Car Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

                <form id="frmUpdate" class="form-horizontal" method="POST" action="{{route('admin.cars.update')}}">
                 @csrf

                <div class="row">

                    <div id="entry_1" class="form-group row form-content col-md-6">
                        <label for="edit_name" class="col-lg-4 control-label">Car Name</label>
    
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


                <div  class="entry_0 form-group row form-content">
                    <label for="category_id" class="col-lg-4 control-label">Choose Category</label>
                    <div class="col-lg-7">
                        <select name="category_id" id="edit_category_id" class="form-control" >
                            <option value=""> -- select category -- </option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id}}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="edit_seats" class="col-lg-4 control-label">Car Seats number</label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="edit_seats" name="edit_seats" required>
                        </div>
                    </div>

                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="edit_price_hour" class="col-lg-4 control-label">price / per hour </label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="edit_price_hour" name="edit_price_hour" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="edit_price_day" class="col-lg-4 control-label"> price / @lang('carCards.per_day')  </label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="edit_price_day" name="edit_price_day" required>
                        </div>
                    </div>

                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="edit_price_month" class="col-lg-4 control-label"> price / @lang('carCards.per_month')  </label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="edit_price_month" name="edit_price_month" required>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="edit_transmission" class="col-lg-4 control-label"> Transmission </label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="edit_transmission" name="edit_transmission" required>
                        </div>
                    </div>

                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="edit_luggage" class="col-lg-4 control-label"> Luggage </label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="edit_luggage" name="edit_luggage" required>
                        </div>
                    </div>
                </div>


                <div id="" class="entry_2 form-group row form-content">
                    <label for="edit_desc" class="col-lg-4 control-label"> Car Description </label>

                    <div class="col-lg-7">
                        <textarea name="edit_desc" class="form-control" id="edit_desc" cols="30" rows="70"></textarea>
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
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Car</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body vh-30">
            <fieldset>
                <legend>Car Info</legend>
                {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}

                <form id="frmSave" class="form-horizontal" method="POST" action="{{route('admin.cars.create')}}">
                 @csrf
 
                <div class="row d-flex justify-center col-lg-10">
                    <div id="entry_1" class="form-group row form-content col-md-6">
                        <label for="name" class="col-lg-6 control-label">Car Name</label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div id="entry_1" class="form-group row form-content col-md-6">
                        <label for="model" class="col-lg-6 control-label">Car Model</label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="model" name="model" required>
                        </div>
                    </div>
                 </div>

                 <div  class="form-group row form-content entry_2 col-md-10 ">
                    <label for="image" class="col-lg-6 control-label"> Descptive Image </label>
                    <div class="col-lg-7">
                      <input style="border: 1px black solid; " type="file" class="form-control" id="image" name="image" required >
                    </div>

                    <div class="image-edit-placeholder-container text-center d-flex justfy-content-center pt-30 m-30">
                        <img class="m-auto" height="60" src="" alt="" id="stamp-placeholder">
                    </div>
                </div>


                <div  class="entry_0 form-group row form-content col-lg-10 d-flex justify-center">
                    <label for="category_id" class="col-lg-4 control-label">Choose Category</label>

                    <div class="col-lg-7">
                        <select name="category_id" id="category_id" class="form-control" required >
                            <option value=""> -- select category -- </option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id}}"> {{ $item->name }} </option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div class="row">
                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="number_of_people" class="col-lg-4 control-label">Car Seats number</label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="number_of_people" name="number_of_people" required>
                        </div>
                    </div>

                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="price_hour" class="col-lg-4 control-label">price / per hour </label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="price_hour" name="price_hour" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="price_day" class="col-lg-4 control-label"> price / @lang('carCards.per_day')  </label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="price_day" name="price_day" required>
                        </div>
                    </div>

                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="price_month" class="col-lg-4 control-label"> price / @lang('carCards.per_month')  </label>
    
                        <div class="col-lg-7">
                          <input type="number" class="form-control" id="price_month" name="price_month" required>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="transmission" class="col-lg-4 control-label"> Transmission </label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="transmission" name="transmission" required>
                        </div>
                    </div>

                    <div id="" class="entry_1 form-group row form-content col-md-6">
                        <label for="luggage" class="col-lg-4 control-label"> Luggage </label>
    
                        <div class="col-lg-7">
                          <input type="text" class="form-control" id="luggage" name="luggage" required>
                        </div>
                    </div>
                </div>

                <div id="" class="entry_2 form-group row form-content">
                    <label for="desc" class="col-lg-4 control-label"> Car Description </label>

                    <div class="col-lg-7">
                        <textarea name="desc" class="form-control" id="desc" cols="30" rows="80"></textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-center btn-container-add m-auto">
                <button id="btnSave" type="submit" class="btn btn-primary btn-flat btnSave" name="add"><i class="fa fa-save"></i> Save</button>
                </div>

               <div class="d-flex justify-content-center">
                   <div style="margin: auto" class="spinner-border  spinner-border-add" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </div>
            </form>
            <div id="add-messages">  </div>
            </fieldset>
            <div class="modal-footer mt-40">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
</div>

<style>
 .edit_feature input{
  width: 40px; height: 40px;
  border-radius: 50%;
  transition: box-shadow .3s;
  background: lightgrey;
  cursor: pointer;
  border: 0;
  appearance: none; -webkit-appearance: none;
 }

.edit_feature input:checked{ box-shadow: inset 0 0 0 20px blue; }

.edit_feature label{
  font: 25px Girassol;
  color: black;
  text-shadow: 1px 1px 0 blue;
  cursor: pointer;
}
</style>


{{--  add a Car categories --}}

<!-- Edit -->

<div class="modal fade edit_feature" id="edit_feature">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Edit Ca Features</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body vh-30">
                <fieldset>
                    <legend> Car Feaures </legend>
                    {{-- <div style="max-width: 800px;" class="add_field d-flex justify-content-end display-auto "><button class="btn btn-sm btn-add-field"><i class="fa fa-plus"></i> New entery</button></div> --}}


                    <form id="frmUpdate-features" class="form-horizontal" method="POST" action="{{route('car.features.create')}}">
                    @csrf

                       <div class="row form-group d-flex pr-lg-3 pl-lg-3 " id="cat_features_container">
                           {{--  Features listings  --}}

                
                        
                       </div>




                    <input type="hidden" id="car-id" name="id">

                    <div class="d-flex justify-content-center btn-container-add m-auto">
                        <button id="btnSave" type="submit" class="btn btn-primary btn-flat btnSave" name="add"><i class="fa fa-save"></i> Save</button>
                        </div>
        
                       <div class="d-flex justify-content-center">
                           <div style="margin: auto" class="spinner-border  spinner-border-add" role="status">
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
