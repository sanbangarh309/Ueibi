<div id="addCall" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Add Call</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('calls.store')}}" id="call_form">
        <input type="hidden" value="" name="type">
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Person Name</label>
            <input type="text" class="form-control" name="person_name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone No</label>
            <input type="text" class="form-control" name="phone">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Company</label>
            <input type="text" class="form-control" name="company">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">City</label>
            <input type="text" class="form-control" name="city">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Website</label>
            <input type="text" class="form-control" name="website">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Date & Time</label>
            <input type="text" class="form-control date_time_picker" id="date_time_picker" name="date_time">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">No Of Calls</label>
            <input type="number" class="form-control" name="no_of_calls">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Remarks</label>
            <textarea class="form-control" name="remarks"></textarea>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="fill_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custommodel" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fill All Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
            <form method="post" action="">
                <input type="hidden" value="" name="id">
                @csrf
    <div class="col-md-6">
      <div class="form-group">
      <label>Order No</label>
      <input type="text" class="form-control" placeholder="Enter No" name="orderno">
    </div>
       </div>
         <div class="col-md-6">
      <div class="form-group">
      <label>Company Name</label>
      <input type="text" class="form-control" placeholder="Company Name" name="company">
    </div>
       </div>
        <div class="col-md-6">
      <div class="form-group">
      <label>Area</label>
      <input type="text" class="form-control" name="area" placeholder="Area">
    </div>
       </div>
        <div class="col-md-6">
      <div class="form-group">
      <label>City</label>
      <input type="text" class="form-control" name="city" placeholder="City">
    </div>
       </div> 
        <div class="col-md-6">
      <div class="form-group">
      <label>Hr Name</label>
      <input type="text" class="form-control" name="hr_name" placeholder="Hr Name">
    </div>
       </div>
        <div class="col-md-6">
      <div class="form-group">
      <label>Hr Contact</label>
      <input type="text" class="form-control" name="hr_contact" placeholder="Hr Contact">
    </div>
       </div> 
        <div class="col-md-6">
      <div class="form-group">
      <label>Hr Email</label>
      <input type="text" class="form-control" name="hr_email" placeholder="Hr Contact">
    </div>
       </div>
        <div class="col-md-6">
      <div class="form-group">
      <label>Offical Website</label>
      <input type="text" class="form-control" name="hr_website" placeholder="Offical Website">
    </div>
       </div>
             <div class="col-md-6">
      <div class="form-group">
      <label>Employee Strength</label>
      <input type="text" class="form-control" name="emp_strength" placeholder="Employee Strength">
    </div>
       </div>
        <div class="col-md-6">
      <div class="form-group">
      <label>Gift Quanity</label>
      <input type="number" class="form-control" min="0" value="0" name="gift_quantity" placeholder="Gift Quanity">
    </div>
       </div>
        <div class="col-md-6">
      <div class="form-group">
      <label>Gift Type</label>
      <select class="form-control" name="gift_type">
        <option value="">Select Gift Type</option>
        <option value="mug">Mug</option>
        <option  value="tshirt">T-shirt</option>
      </select>
    </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
       <label>Attacthment</label>
       <input class="form-control" type="file" name="attachment">
       <img src="" id="image_show" style="display:none">
       </div>
       </div>
           <div class="col-md-12">
         <div class="form-group">
       <label>Address</label>
          <textarea class="form-control" placeholder="Enter message" name="address" style="height:150px;"></textarea>
       </div>
       </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
       </form>
        </div>
      </div>
    </div>
  </div>