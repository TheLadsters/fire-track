@extends('signlayout')

@section('loginsection')
{{-- 


            

            <a href="layout">
                <button type="button" class="btn btn-primary">Sign In</button>
            </a>

          

                   
    </form> --}}
<div class="login-body">
    
    <div class="login">

        <div class="text-center">
            <img src="images/signinLogo.png" id="signInLogo"/>
        </div>
        
        <form class="needs-validation">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Username" id="usernameInput">
                <div class="invalid-feedback">
                    Please enter your username
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="passwordInput" placeholder="Password">
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>

            <a href="layout"><input id="signInBtn" class="w-100" type="button" value="SIGN IN"></a>
            
            <div class="form-group text-center">
                <a href="#" id="forgotPassword">
                    Forgot Password?
                </a>
            </div>

            <div class="form-group text-center mt-5">
                Don't have an account? <a href="#">Sign Up</a> here! 
            </div>
       
        </form>
    </div>

</div>
@endsection