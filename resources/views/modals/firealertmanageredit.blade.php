<div class="modal fade editFireAlertModal" tabindex="-1" role="dialog" aria-labelledby="editFireAlertModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content px-3">
        <div id="modal-head" style="background-image:url('images/rectangles_background.png');">
          <div class="row py-2 px-2">
            <div class="col-12">
              <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
            </div>	
          </div>
  
          <div class="row" style="margin-left: 3%;">	
              <h4 class="modal-title col-12">
                <i class='bx bxs-message-rounded-edit head-icon'></i>
                Edit Fire Alert
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
              Edit a fire hydrant on the map to edit the existing information.
            </div>
          </div>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{ route('admin.editFireAlert') }}">
            @csrf
            <input type="hidden" id="firealert_hidden_id" name="firealarm_id">
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->user_id}}">

          <div class="row justify-content-end">
            <div class="col-md-3">
              <button type="button" class="btn btn-primary edit-longlat">
                <i class='bx bx-map' ></i>                 
                  Edit on Map
              </button>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6">
              <label for="longitude">
                Longitude<span style="color:red;">*</span>
              </label>
              <input type="text" class="form-control" name="longitude" 
              id="edit-longitude" placeholder="Longitude">
            </div>
            <div class="col-md-6">
              <label for="latitude">
                Latitude<span style="color:red;">*</span>
              </label>
              <input type="text" class="form-control" name="latitude" 
                id="edit-latitude" placeholder="Latitude">
            </div>
            
          </div>

          <div class="row">

            <div class="col-md-6">
              <label for="location-details">
                Location Details<span style="color:red;">*</span>
              </label>
              <input type="text" class="form-control" name="fire_location" 
              id="edit-location" placeholder="Location Details">
            </div>
            <div class="col-md-6">
              <label for="Status">
                Status<span style="color:red;">*</span>
              </label>
              <select class="form-select" id="status-selector" name="status" aria-label="status-selector">
                <option value="First Alarm">First Alarm</option>
                <option value="Second Alarm">Second Alarm</option>
                <option value="Third Alarm">Third Alarm</option>
                <option value="Fourth Alarm">Fourth Alarm</option>
                <option value="Fifth Alarm">Fifth Alarm</option>
                <option value="Task Force Alpha">Task Force Alpha</option>
                <option value="Task Force Bravo">Task Force Bravo</option>
                <option value="Task Force Charlie">Task Force Charlie</option>
                <option value="Task Force Delta, Echo, Hotel, India">Task Force Delta, Echo, Hotel, India</option>
                <option value="General Alarm">General Alarm</option>
                <option value="Under Control">Under Control</option>
                <option value="Fire Out">Fire Out</option>
              </select>
            </div>

          </div>

          <div class="row">

            <div class="col-md-6">
              <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn-edit-alert send-edit-alert">Submit</button>
            </div>

          </div>
  
          <input type="text" style="display: none;" class="form-control" name="user_id" value="1">

                 
          </form>
        </div>
      </div>
    </div>
  </div>