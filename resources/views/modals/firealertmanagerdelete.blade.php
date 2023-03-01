<div class="modal fade deleteFireAlertModal" tabindex="-1" role="dialog" aria-labelledby="deleteFireAlertModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
            <h4>Delete Fire Alarm</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this Fire Alarm? </p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
            

        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
          
            <form method="POST" action="{{ route('admin.deleteFireAlert') }}">
            @csrf
            @METHOD('DELETE')
                <input type="hidden" name="firealert_key_id" id="firealert_key_id">
                <input type="submit" class="btn btn-danger" id="deleteAlertBtn" value="Delete">   
            </form> 

        </div>
      </div>
    </div>
  </div>