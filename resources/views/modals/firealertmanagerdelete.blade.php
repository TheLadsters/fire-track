<div class="modal fade deleteFireAlertModal" tabindex="-1" role="dialog" aria-labelledby="deleteFireAlertModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
            <h4>Delete Fire Alert</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this Fire Alert? </p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
            

            <input type="input" name="firealert_key_id" id="firealert_key_id">


        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
          
            {{-- <form id="alert-form" action={{}} method="POST">
                @csrf 
                @method('DELETE') --}}
                <input type="submit" class="btn btn-danger" id="deleteAlertBtn" value="Delete">   
            {{-- </form> --}}

        </div>
      </div>
    </div>
  </div>