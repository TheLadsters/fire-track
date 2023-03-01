 
<div id="userManagementDeleteModal{{$user->user_id}}" class="modal fade userManagementDeleteModal" value="{{$user->user_id}}">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row text-center">
            <div class="col-12 mb-2">
              <h4>Delete User</h4>
            </div>
          </div>

            <p>Are you sure you want to delete this User? </p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
            

        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
          
     
			<form method="POST" action="{{ route('admin.userManagementDelete',[$user->user_id])}}">
                @csrf
                @method('DELETE')
				<input type="submit" class="btn btn-danger" id="" value="Delete"> 
            </form>

        </div>
      </div>
    </div>
  </div>
