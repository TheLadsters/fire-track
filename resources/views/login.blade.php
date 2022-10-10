@extends('loginLayout')

@section('loginsection')
  
<div class="content-login">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center mb-3">
              <img src="images/cebuMap.jpg" alt="Map of Cebu" class="img-fluid mapCebu">
            </div>
            <div class="col-md-6 contents">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-4">
                  <h3 id="signIn-title">Sign In</h3>
                  <p id="signin-info" class="mb-4">Sign in to the FireTrack App and use our services.</p>
                </div>
                <form>
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username">
    
                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                    
                  </div>
                  
                  <div class="d-flex mb-4 align-items-center">
                    <span class="ml-auto"><a href="/email" class="forgot-pass">Forgot Password</a></span> 
                  </div>
    
                  {{-- this submit button to be used later --}}
                  {{-- <input type="submit" value="Log In" class=" btn-submit btn-block"> --}}

                  {{--  temporary submit button --}}
                  <button class="btn-submit btn-block">Login</button>
                      
                  <div class="no-account-area mt-3">
                    <a href="/signup" class="no-account">Don't have an account?</a>
                  </div>

                  <div class="d-flex justify-content-center mt-5">
                    <img src="images/fire_track_logo_clear.png" alt="firetracklogo" class="img-fluid fireTrackLogo"/>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
</div>



{{-- start of modal code --}}

<!-- Modal -->
{{-- <div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgetPasswordModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header forgetPasswordHeader">
          <h4 class="modal-title" id="forgetPasswordTitle">Reset Your Password</h4>
          <button type="button" id="dismissX" data-dismiss="modal" aria-label="Close">
           <b>X</b>
          </button>
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
                <div class="col-md-12">
                    <input class="form-control inputForm" type="email" placeholder="Email">
                </div>
            </div>
            
            <div class="container-md my-2">
                <div class="row">
                    <button type="button" id="forgetPasswordSubmit">SUBMIT</button>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div> --}}

{{-- end of modal code --}}
@endsection