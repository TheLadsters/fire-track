@extends('signlayout')

@section('loginsection')

<div class="login-body">
    
    <div class="login">

        <div class="text-center">
            <img src="images/signinLogo.png" id="signInLogo"/>
        </div>
        
        <form class="needs-validation">
            <div class="form-group">
                <input class="form-control inputForm" type="text" placeholder="Username" id="usernameInput">
                <div class="invalid-feedback">
                    Please enter your username
                </div>
            </div>
            <div class="form-group">
                <input class="form-control inputForm" type="password" id="passwordInput" placeholder="Password">
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>

            <a href="edit-profile"><input id="signInBtn" class="w-100" type="button" value="SIGN IN"></a>
            
            <div class="form-group text-center">
                <a href="#" id="forgotPassword">
                    Forgot Password?
                </a>
            </div>

            <div class="form-group text-center mt-5">
                Don't have an account? <a href="/signup">Sign Up</a> here! 
            </div>
       
        </form>
    </div>

</div>


{{-- start of modal code --}}

<!-- Modal -->
<div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
  </div>

{{-- end of modal code --}}
@endsection