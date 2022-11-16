@extends('loginLayout')

@section('loginsection')

<div class="d-flex justify-content-center align-items-center mt-5">

  <div class="card mb-4">
    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
      <li class="nav-item text-center">
        <button class="nav-link active btl" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="true">Login</button>
      </li>
      <li class="nav-item text-center">
        <button class="nav-link btr" id="pills-signup-tab" data-bs-toggle="pill" data-bs-target="#pills-signup" type="button" role="tab" aria-controls="pills-signup" aria-selected="false">Signup</button>
      </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 contents">
              <div class="row justify-content-center">
                <div class="col-sm-10">

                  <div class="d-flex justify-content-center mt-3">
                    <img src="images/fire_track_logo_clear.png" alt="firetracklogo" class="fireTrackLogo"/>
                  </div>

                  <div class="mb-4">
                  <h3 id="signIn-title">Sign In</h3>
                  <p id="signin-info" class="mb-4">Sign in to the FireTrack App and use our services.</p>
                </div>
                <form>
                  <div class="form-group first mb-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="signInUsernameInput">
                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="signInPasswordInput">
                    
                  </div>
                  
                  <div class="d-flex mb-4 align-items-center">
                    <span class="ml-auto"><a data-bs-toggle="modal" data-bs-target="#forgetPasswordModal" class="forgot-pass">Forgot Password</a></span> 
                  </div>
    
                  {{-- this submit button to be used later --}}
                  {{-- <input type="submit" value="Log In" class=" btn-submit btn-block"> --}}


                  {{--  temporary submit button --}}
                  <button class="btn-submit btn-block">Login</button>
                </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
    <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
      <div class="container">
        <div class="row px-2">
          <div class="col-sm-12 signup-contents">
            <div class="row justify-content-center">
              <div class="col-sm-10">
                  <div class="d-flex justify-content-center mt-3">
                    <img src="images/fire_track_logo_clear.png" alt="firetracklogo" class="fireTrackFinal"/>
                  </div>

                  <div class="mb-4">
                    <h3 id="signUp-title">Sign Up</h3>
                    <p id="signup-info" class="mb-4">Sign Up to create an account for the FireTrack App.</p>
                  </div>

                  <form>
                    <div class="row justify-content-evenly">
                      <div class="col-md-5 mb-3 form-group first">
                        <label for="firstname">First Name</label>
                          <input type="text" class="form-control" id="firstNameInput"/>
                      </div>
      
                      <div class="col-md-6 mb-3 form-group last">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastNameInput" />
                      </div>
                    </div>    

                    <div class="row justify-content-evenly">
                      <div class="col-md-5 mb-3 form-group first">
                        <label for="contactnumber">Contact Number</label>
                          <input type="text" class="form-control" id="contactNumberInput" />
                      </div>
      
                      <div class="col-md-6 mb-3 form-group last">
                        <label for="emailaddress">Email Address</label>
                        <input type="text" class="form-control" id="emailAddressInput"/>
                      </div>
                    </div>

                    <div class="row justify-content-evenly">
                      <div class="col-md-5 mb-3 form-group first">
                        <label for="password">Password</label>
                          <input type="password" class="form-control" id="passwordInput" />
                      </div>
      
                      <div class="col-md-6 mb-3 form-group last">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPasswordInput"/>
                      </div>
                    </div>

                    <div class="row justify-content-evenly">
                      <div class="col-md-11 mb-3 form-group first">
                        <label for="homeAddress">Home Address</label>
                          <input type="text" class="form-control" id="homeAddressInput" />
                      </div>
                    </div>

                    <div class="row mb-2 genderArea">
                      <div class="col-sm-2">
                        Gender
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-sm-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="chooseGender" id="genderMale">
                          <label class="form-check-label" for="chooseGender">
                            Male
                          </label>
                        </div>
                      </div>
  
                      <div class="col-sm-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="chooseGender" id="genderFemale">
                          <label class="form-check-label" for="chooseGender">
                            Female
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <p class="text-center" id="signup-info">
                          By clicking Sign Up, you agree to our Terms, Data Policy and Cookies Policy. 
                          You may receive Email Notifications from us and can opt out any time.
                        </p>
                      </div>
                    </div>

                    <button class="btn-signUp btn-block-signup mb-2" >Sign Up</button>
                  </form>

              </div>
            </div>
          </div>
      </div>
      </div>
      
      </div>
    </div>
  </div>
  

</div>



{{-- start of modal code --}}

<!-- Modal -->
<div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgetPasswordModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content px-3">
        <div class="modal-header forgetPasswordHeader">
          <h4 class="modal-title" id="forgetPasswordTitle">Reset Your Password</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body forgetPasswordArea">
            <div class="row my-3">
                <div class="col-md-12 text-center">
                    <h5>
                    Please enter your registered email and we will send you an
                    email request to reset your password.
                    </h5>
                </div>
            </div>

            <div class="row my-3 mb-3">
                <div class="col-md-12 form-group">
                  <label for="homeAddress">Email Address</label>
                    <input class="form-control first" type="email">
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" id="forgetPasswordSubmit" class="btn-block">SUBMIT</button>
        </div>
      </div>
    </div>
  </div>

{{-- end of modal code --}}
@endsection