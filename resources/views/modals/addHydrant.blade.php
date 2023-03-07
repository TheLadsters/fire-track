<div class="modal fade addFireHydrantModal" tabindex="-1" role="dialog" aria-labelledby="addFireHydrantModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content px-3">

        <div id="modal-head" style="background-image:url('images/rectangles_background.png');">
          <div class="row py-2 px-2">
            <div class="col-12">
              <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
            </div>	
          </div>
  
          <div class="row" style="margin-left: 3%;">	
              <h4 class="modal-title col-12">
                <i class="fas fa-fire-extinguisher fas-md head-icon"></i>		
                Add Fire Hydrant
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
              Add a new fire hydrant on the map to locate places with fire hydrants.
            </div>
          </div>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{ route('admin.addFireHydrant')}}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                
                <div class="col-md-6">
                  <label for="longitude">
                    Longitude<span style="color:red;">*</span>
                  </label>
                  <input type="text" readonly class="form-control" name="longitude" 
                  id="hydrant-longitude" placeholder="Longitude">
                </div>

                <div class="col-md-6">
                  <label for="latitude">
                    Latitude<span style="color:red;">*</span>
                  </label>
                  <input type="text" readonly class="form-control" name="latitude" 
                  id="hydrant-latitude" placeholder="Latitude">
                </div>

            </div>

            <div class="row">
              
                <div class="col-md-6"> 
                  <label for="hydrant-address">
                    Address<span style="color:red;">*</span>
                  </label>
                  <input type="text" class="form-control" name="address" 
                  id="hydrant-address" placeholder="Hydrant Address">
                </div>

              <div class="col-md-6">
                  <label for="Status">
                    Status<span style="color:red;">*</span>
                  </label>
                  <select class="form-select" name="status" aria-label="status-selector">             
                    <option selected value="working">working</option>
                    <option value="not working">not working</option>
                    <option value="maintenance">maintenance</option>
                  </select>
              </div>

            </div>

            <div class="row">

              <div class="col-md-6">
                <label for="hydrant_type">
                  Hydrant Type<span style="color:red;">*</span>
                </label>
                <select class="form-select" name="hydrant_type_id" aria-label="status-selector">             
                  @foreach($allHydrantTypes as $types)

                  <option value="{{ $types->hydrant_type_id }}">{{ $types->name }}</option>
                  
                  @endforeach
              </select>
              </div>
              
              <div class="col-md-6">
                <label for="hydrantImg" class="form-label">
                  Image of Location
                </label>
                <input class="form-control" name="img_url" type="file" id="hydrantImg">
              </div>

            </div>

            <input type="text" style="display: none;" class="form-control" name="user_id" value="{{Auth::user()->user_id}}">

            <div class="row">
              <div class="col-md-6">
                <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
              </div>
  
              <div class="col-md-6">
                <button type="submit" class="btn-add-hydrant send-alert">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>