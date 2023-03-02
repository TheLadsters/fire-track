<div class="modal fade addFireAlertModal" tabindex="-1" role="dialog" aria-labelledby="addFireAlertModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('admin.addFireAlert')}}">
            @csrf
            <div class="row text-center">
              <div class="col-12">
                <h4>Add Fire Alert</h4>
              </div>
            </div>

            <div class="row text-center">
              <div class="col-12 mb-3">
              <span> <b>Note:</b> The fields with a red asterisk <span style="color:red;">*</span> are required.</span>
              </div>
            </div>

            <div class="row align-items-center px-5">
              <div class="col-3">
                    <label for="longitude">
                      <b>
                        Longitude<span style="color:red;">*</span>
                      </b>
                    </label>
              </div>

              <div class="col-6">
                <input type="text" readonly class="form-control" name="longitude" id="longitude-input" placeholder="Longitude">
              </div>

            </div>

            <div class="row align-items-center my-3 px-5">
              <div class="col-3">
                    <label for="latitude">
                      <b>
                        Latitude<span style="color:red;">*</span>
                      </b>
                    </label>
              </div>

              <div class="col-6">
                <input type="text" readonly class="form-control" name="latitude" 
                id="latitude-input" placeholder="Latitude">
              </div>
            </div>

            <div class="row align-items-center px-5">
              <div class="col-3">
                    <label for="location-details">
                      <b>
                        Location Details<span style="color:red;">*</span>
                      </b>
                    </label>
              </div>

              <div class="col-6">
                <input type="text" class="form-control" name="fire_location" id="locationdetails-input" placeholder="Location Details">
              </div>
            </div>

            <div class="row align-items-center my-3 px-5">
              <div class="col-3">
                    <label for="Status">
                      <b>
                        Status<span style="color:red;">*</span>
                      </b>
                    </label>
              </div>

              <div class="col-6">
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

            <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
            <button type="submit" class="btn btn-primary send-alert">SUBMIT</button>
            </div>
            

          </form>
        </div>
      </div>
    </div>
  </div>