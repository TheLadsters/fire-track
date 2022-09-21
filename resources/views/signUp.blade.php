@extends('signlayout')

@section('signuppage')

<div class="signup-body">
    
    <div class="signup">

        <div class="text-center">
            <h1 id="signup-title">Sign Up</h1>
            <p><b>User Registration</b></p>
        </div>
        
        <form class="row">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <a href="/">
                        <button type="button" class="btn backtologin">
                            <i class="fa-solid fa-backward"></i> Back to Login
                        </button>
                    </a>
                </div>
            </div>

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
                <div class="col-md-12 py-2">
                    <input class="form-control inputForm" type="password" placeholder="Password">
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

            <p id="termspolicy" class="py-2 pt-3">
                By clicking Sign Up, you agree to our Terms, Data Policy and Cookies Policy. 
                You may receive Email Notifications from us and can opt out any time.
            </p>

            <div class="row">
                <div class="col-md-12">
                    <a href="/"><input id="signUpBtn" class="w-100" type="button" value="SIGN UP"></a>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection