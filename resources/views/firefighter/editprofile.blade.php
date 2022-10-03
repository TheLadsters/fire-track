@extends('./layout')

@section('editProfile')



Edit profile body





{{-- <div class="editprofile-body">
    
    <div class="editprofile">

        <div class="text-center">
            <h1 id="editprofile-title">Edit Profile</h1>
            <p><b>Edit your account credentials and then click the save button.</b></p>
        </div>
        
        <form class="row">

            <div class="col-md-6 form-group py-1">
                <input class="form-control inputForm" type="text" placeholder="First Name">
            </div>
            <div class="col-md-6 form-group py-1">
                <input class="form-control inputForm" type="text" placeholder="Last Name">
            </div>

            <div class="row">
                <div class="col-md-12 py-2">
                    <input class="form-control inputForm" type="text" placeholder="Email or mobile number">
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mt-2">
                        <div class="form-group">
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control inputForm" placeholder="Password" type="password">
                                <span class="input-group-text togglePasswordArea">
                                    <a><i class="bi bi-eye-slash"></i></a>
                                </span>
                            </div>
                        </div>
                </div>

                <div class="col-md-4 py-2">
                    <input class="w-100 mt-1" type="button" id="resetPasswordBtn" value="Reset Password">
                </div>

              </div>

            <div class="row">
                <div class="col-md-12 py-2">
                    <input class="form-control inputForm" type="text" placeholder="Address Line 1">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 py-2">
                    <input class="form-control inputForm" type="text" placeholder="Address Line 2">
                </div>
            </div>

            <div class="row mt-3">
                <h4>Gender</h4>
                <div class="col-md-6 genderSelect">
                    <input class="form-check-input" type="radio" name="gender" id="maleInput">
                    <label class="form-check-label" for="maleInput">
                        Male
                      </label>
                </div>
                <div class="col-md-6 genderSelect">
                    <input class="form-check-input" type="radio" name="gender" id="femaleInput">
                    <label class="form-check-label" for="femaleInput">
                        Female
                      </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 my-4">
                    Edit Image: 
                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0 mt-2">
                </div>
            </div>

            <div class="image-area mt-4">
                <img id="imageResult" src="#" alt="Image Preview" class="img-fluid rounded shadow-sm mx-auto d-block">
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="/"><input id="saveProfile" class="w-100" type="button" value="Save"></a>
                </div>
            </div>
        </form>
    </div>
</div> --}}

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