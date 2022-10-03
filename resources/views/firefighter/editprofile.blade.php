@extends('./layout')

@section('editProfile')



Edit profile body


{{-- start of modal code --}}

<!-- Modal for change password-->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header forgetPasswordHeader">
          <h4 class="modal-title" id="forgetPasswordTitle">Reset Your Password</h4>
          <button type="button" id="dismissX" data-dismiss="modal" aria-label="Close">
           <b>X</b>
          </button>
        </div>
        <div class="modal-body forgetPasswordArea">

            <div class="row my-3 mb-3">
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <div class="input-group" id="show_hide_current_password">
                            <input class="form-control inputForm" placeholder="Current Password" type="password">
                            <span class="input-group-text togglePasswordArea">
                                <a><i class="bi bi-eye-slash"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3 mb-3">
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <div class="input-group" id="show_hide_new_password">
                            <input class="form-control inputForm" placeholder="Password" type="password">
                            <span class="input-group-text togglePasswordArea">
                                <a><i class="bi bi-eye-slash"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3 mb-3">
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <div class="input-group" id="show_hide_repeat_new_password">
                            <input class="form-control inputForm" placeholder="Password" type="password">
                            <span class="input-group-text togglePasswordArea">
                                <a><i class="bi bi-eye-slash"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3 mb-3">
                <div class="col-md-12">
                    <b id="forgotPassLink">Forgot Password?</b>
                </div>
            </div>
            
            <div class="container-md my-2">
                <div class="row">
                    <button type="button" id="resetPasswordBtn">Save Changes</button>
                </div>
            </div>

        </div>
      </div>
    </div>
</div>

@endsection