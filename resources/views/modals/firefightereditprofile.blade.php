<!-- Edit Modal HTML -->
<div class="modal fade ChangePasswordModal" id="ChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="addFireHydrantModalCenter" aria-hidden="true">
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
                <i class="fas fa-key  fas-md head-icon"></i>	
                Change Your Password
              </h4>
          </div>
          
          <div class="row" style="margin-left: 7.5%;">
            <div class="col-12">
              Change your existing password and make a new one.
            </div>
          </div>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{ route('firefighterChangePassword') }}" enctype="multipart/form-data" id="changePasswordFirefighterForm">
            @csrf
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" class="form-control" required name="oldpassword">
                <span class="text-danger error-text oldpassword_error"></span>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" required name="newpassword"> 
                <span class="text-danger error-text newpassword_error"></span>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" class="form-control" required name="cnewpassword">
                <span class="text-danger error-text cnewpassword_error"></span>
            </div>	

            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn-cancel mb-2" data-bs-dismiss="modal">Cancel</button>
                </div>

                <div class="col-6">
                    <button type="submit" class="btn-change-pass" id="password-id">Update password</button>                
                </div>
            </div>
        </div>

          </form>
        </div>
      </div>
    </div>
  </div>
