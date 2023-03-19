<div class="modal fade editFireHydrantModal" id="editFireHydrantModal" tabindex="-1" role="dialog" aria-labelledby="editFireHydrantModalCenter" aria-hidden="true">
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
                <i class='bx bxs-message-edit head-icon'></i>                
                Edit Fire Hydrant
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
              Edit the details of a fire hydrant located on the map.
            </div>
          </div>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{ route('admin.editFireHydrant') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="firehydrant_hidden_id" name="hydrant_id">
            <input type="hidden" name="user_id" id="user_id">
            

          <div class="row justify-content-end">
            <div class="col-md-3">
              <button type="button" class="btn btn-primary edit-hydrant-longlat">
                <i class='bx bx-map'></i>                 
                  Edit on Map
              </button>
            </div>
          </div>


          <div class="row">
            
            <div class="col-md-6">
              <label for="longitude">
                Longitude<span style="color:red;">*</span>
              </label>
              <input type="text" readonly class="form-control" name="longitude" id="edit-longitude" placeholder="Longitude">
            </div>

            <div class="col-md-6">
              <label for="latitude">
                Latitude<span style="color:red;">*</span>
              </label>
              <input type="text" readonly class="form-control" name="latitude" 
                id="edit-latitude" placeholder="Latitude">
            </div>

          </div>

          <div class="row">
            
            <div class="col-md-6">
              <label for="hydrant-address">
                Address<span style="color:red;">*</span>
              </label>
              <input type="text" class="form-control" name="address" id="edit-hydrant-address" placeholder="Hydrant Address">
            </div>
            
            <div class="col-md-6">
              <label for="Status">
                Status<span style="color:red;">*</span>
              </label>
              <select class="form-select" name="status" id="status-selector" aria-label="status-selector">
                <option value="working">working</option>
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
              <select class="form-select" name="hydrant_type_id" id="type-selector" aria-label="status-selector">                
                @foreach($allHydrantTypes as $types)

                <option value="{{ $types->hydrant_type_id }}">{{ $types->name }}</option>
                
                @endforeach
            </select>
            </div>
            
            <div class="col-md-6">
              <label for="hydrantImg" class="form-label">
                Image of Location
              </label>
              <input class="form-control hydrantImg" name="img_url" type="file" id="hydrantImg">
            </div>

          </div>

            <div class="row text-center mb-3">
              <div class="col-12">
                <img class="img-fluid img-thumbnail" height="250" width="200">
              </div>
            </div>

            <input type="text" id="user_id" style="display: none;" class="form-control" name="user_id" value="{{Auth::user()->user_id}}">

            <div class="row">
              <div class="col-md-6">
                <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn-edit-hydrant send-edit-alert" id="HydrantSubmit">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>