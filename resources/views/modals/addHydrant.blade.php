<div class="modal fade addFireHydrantModal" tabindex="-1" role="dialog" aria-labelledby="addFireHydrantModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('admin.addFireHydrant')}}" enctype="multipart/form-data">
            @csrf
            <div class="row text-center">
              <div class="col-12">
                <h4>Add Fire Hydrant</h4>
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
                <input type="text" readonly class="form-control" name="longitude" 
                id="hydrant-longitude" placeholder="Longitude">
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
                id="hydrant-latitude" placeholder="Latitude">
              </div>
            </div>

            <div class="row align-items-center px-5">
              <div class="col-3">
                    <label for="hydrant-address">
                      <b>
                        Address<span style="color:red;">*</span>
                      </b>
                    </label>
              </div>

              <div class="col-6">
                <input type="text" class="form-control" name="address" id="hydrant-address" placeholder="Hydrant Address">
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

              <div class="col-4">
                <select class="form-select" name="status" aria-label="status-selector">             
                  <option selected value="working">working</option>
                  <option value="not working">not working</option>
                  <option value="maintenance">maintenance</option>
                </select>
              </div>
            </div>

            <div class="row align-items-center my-3 px-5">
                <div class="col-3">
                      <label for="hydrant_type">
                        <b>
                          Hydrant Type<span style="color:red;">*</span>
                        </b>
                      </label>
                </div>
  
                <div class="col-4">
                  <select class="form-select" name="hydrant_type_id" aria-label="status-selector">             
                    
                    @foreach($allHydrantTypes as $types)

                    <option value="{{ $types->hydrant_type_id }}">{{ $types->name }}</option>
                    
                    @endforeach

                </select>
                </div>
              </div>

            <div class="row align-items-center my-3 px-5">
                <div class="col-3">
                    <label for="hydrantImg" class="form-label">
                        <b>Image of Location</b>
                    </label>
                </div>

                <div class="col-6">
                    <input class="form-control" name="img_url" type="file" id="hydrantImg">
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