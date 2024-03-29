 
<div id="userManagementDeleteModal" class="modal fade userManagementDeleteModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div id="modal-head" style="background-image:url('images/rectangles_background.png');">
          <div class="row py-2 px-2">
            <div class="col-12">
              <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
            </div>	
          </div>
  
          <div class="row" style="margin-left: 3%;">	
              <h4 class="modal-title col-12">
                <i class='bx bxs-trash-alt bx-md head-icon'></i>
                Delete User
              </h4>
          </div>
          
          <div class="row" style="margin-left: 9%;">
            <div class="col-12">
              Delete an existing user from the application.
            </div>
          </div>
        </div>

        <div class="modal-body">

          <div class="row">
						<div class="col-12 text-warning-title">
              Are you sure you want to delete this User?
            </div>
					</div>

          <div class="row mb-5">
						<div class="col-12">
              <p class="text-warning">This action cannot be undone.</p>
            </div>
					</div>
      
          <div class="row">
            <div class="col-md-6">
              <input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
            </div>

            <div class="col-md-6">
              <form method="POST" action="{{ route('admin.userManagementDelete')}}">
                @csrf
                <input type="hidden" name="user_id" id="user_id">
                <input type="submit" class="btn btn-danger" id="deleteUser" value="Delete"> 
              </form>
            </div>
          </div>
          
        </div>

      </div>
    </div>
  </div>
