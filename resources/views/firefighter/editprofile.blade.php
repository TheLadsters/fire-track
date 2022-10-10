@extends('firefighter/layoutFirefighter')

@section('editProfile')



<div class="body-editprofile mb-5">
    <div class="container container-form">
        <form>
        <div class="row text-center">
            <div class="col-6 col-md-6 col-lg-6">
                <h3 id="edit-profile-title">Edit Profile</h3>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <img src="images/tempo_img.png" />
                <p class="mt-2"><a href="#">Change Profile Photo</a></p>
            </div>
        </div>

        <div class="container">
                <div class="row">
                    <div class="col-md-6 my-2">
                            <div class="form-group">
                                <input type="text" class="form-control form-inputs" id="firstNameInput" placeholder="First Name" name="firstName">
                            </div>
                    </div>

                    <div class="col-md-6 my-2">
                            <div class="form-group">
                                <input type="text" class="form-control form-inputs" id="lastNameInput" placeholder="Last Name" name="lastName">
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 my-2">
                        <input type="text" class="form-control form-inputs" id="homeAddressInput" placeholder="Home Address" name="homeAddress">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 my-2">
                        <input type="text" class="form-control form-inputs" id="mobileNumberInput" placeholder="Mobile Number" name="mobileNumber">
                    </div>
                    <div class="col-md-6 my-2">
                        <input type="email" class="form-control form-inputs" id="emailAddressInput" placeholder="Email Address" name="emailAddress">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <button class="btn-editprofile">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


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