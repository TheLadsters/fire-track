<div class="modal fade editFireAlertModal" tabindex="-1" role="dialog" aria-labelledby="editFireAlertModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
            <h4>Edit Fire Alert</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('admin.editFireAlert') }}">
            @csrf
            <input type="hidden" id="firealert_hidden_id" name="firealert_hidden_id">
            <input type="hidden" name="user_id" id="user_id">
            <div class="row align-items-center px-5">
              <div class="col-3">
                    <label for="longitude">
                      <b>
                        Longitude
                      </b>
                    </label>
              </div>
              <div class="col-6">
                <input type="text" class="form-control" name="longitude" id="edit-longitude" placeholder="Longitude">
              </div>

              <div class="col-3">
                <button type="button" class="btn btn-primary edit-longlat">
                <i class='bx bx-map' ></i>                 
                  Edit on Map
                </button>
              </div>

            </div>

            <div class="row align-items-center my-3 px-5">
              <div class="col-3">
                    <label for="latitude">
                      <b>
                        Latitude
                      </b>
                    </label>
              </div>

              <div class="col-6">
                <input type="text" class="form-control" name="latitude" 
                id="edit-latitude" placeholder="Latitude">
              </div>

            </div>

            <div class="row align-items-center px-5">
              <div class="col-3">
                    <label for="location-details">
                      <b>
                        Location Details
                      </b>
                    </label>
              </div>

              <div class="col-9">
                <input type="text" class="form-control" name="fire_location" id="edit-location" placeholder="Location Details">
              </div>
            </div>

            <div class="row align-items-center my-3 px-5">
              <div class="col-3">
                    <label for="Status">
                      <b>
                        Status
                      </b>
                    </label>
              </div>

              <div class="col-6">
                <select class="form-select" id="status-selector" name="status" aria-label="status-selector">
                  <option selected value="Ongoing Fire">Ongoing Fire</option>
                  <option value="Fire Out">Fire Out</option>
                </select>
              </div>
            </div>

            <input type="text" style="display: none;" class="form-control" name="user_id" value="1">

            
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
            <button type="submit" class="btn btn-primary send-edit-alert">SUBMIT</button>
        </div>
        
          </form>
        </div>
      </div>
    </div>
  </div>