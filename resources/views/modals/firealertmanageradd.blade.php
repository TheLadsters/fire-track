<div class="modal fade addFireAlertModal" tabindex="-1" role="dialog" aria-labelledby="addFireAlertModalCenter" aria-hidden="true">
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
                <i class='bx bxs-hot head-icon'></i>
                Add Fire Alert
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
              Add a new fire alert on the map to locate places where fire just occured.
            </div>
          </div>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{ route('admin.addFireAlert')}}">
            @csrf

          <div class="row">
            
            <div class="col-md-6">
              <label for="longitude">
                Longitude<span style="color:red;">*</span>
              </label>
              <input type="text" readonly class="form-control" name="longitude" 
              id="longitude-input" placeholder="Longitude">
            </div>

            <div class="col-md-6">
              <label for="latitude">
                Latitude<span style="color:red;">*</span>
              </label>
              <input type="text" readonly class="form-control" name="latitude" 
              id="latitude-input" placeholder="Latitude">
            </div>

          </div>

          <div class="row">
            
            <div class="col-md-6">
              <label for="location-details">
                Location Details<span style="color:red;">*</span>
              </label>
              <input type="text" class="form-control" name="fire_location" 
              id="locationdetails-input" placeholder="Location Details">
            </div>
            <div class="col-md-6">
              <label for="Status">
                Status<span style="color:red;">*</span>
              </label>
              <select class="form-select" name="status" aria-label="status-selector">
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

            <input type="text" style="display: none;" class="form-control" name="user_id" value="{{Auth::user()->user_id}}">

          <div class="row">

            <div class="col-md-6">
              <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
            </div> 
            <div class="col-md-6">
              <button type="submit" class="btn-add-alert send-alert">Submit</button>
            </div> 

          </div>

          </form>
        </div>
      </div>
    </div>
  </div>