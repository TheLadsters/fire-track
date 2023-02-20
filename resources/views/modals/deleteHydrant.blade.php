<div class="modal fade deleteHydrantModal" tabindex="-1" role="dialog" aria-labelledby="deleteHydrantModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
            <h4>Delete Fire Hydrant</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this Fire Hydrant? </p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
            

        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
          
            <form method="POST" action="{{ route('admin.deleteFireHydrant')}}">
            @csrf
                <input type="hidden" name="firehydrant_key_id" id="firehydrant_key_id">
                <input type="submit" class="btn btn-danger" id="deleteHydrantBtn" value="Delete">   
            </form> 

        </div>
      </div>
    </div>
  </div>