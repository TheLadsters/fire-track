<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="icon" type="image" href="images/Firetrack.png">
    <title>FireTrack App</title>
</head>

<body id="login-body">
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 contents">
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                    <div class="d-flex justify-content-center mt-3">
                                        <img src="images/fire_track_logo_clear.png" alt="firetracklogo" class="fireTrackLogo"/>
                                    </div>

                                     <div class="mb-5">
                                        <h3 id="signUp-title">Sign Up</h3>
                                        <p id="signup-info" class="mb-4">Sign Up to create an account for the FireTrack App.</p>
                                    </div>
                                            <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">
                                                    @if ( Session::get('success'))
                                                        <div class="alert alert-success">
                                                            {{ Session::get('success') }}
                                                        </div>
                                                    @endif
                                                    @if ( Session::get('error'))
                                                        <div class="alert alert-danger">
                                                            {{ Session::get('error') }}
                                                        </div>
                                                    @endif
                                                    @csrf
                                 
                                                    <div class="forms-inputs md-12 mb-4"> 
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                                                        <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                                                    </div>

                                                    <div class="forms-inputs row">
                                                        <div class="form-inputs col-md-6 mb-4">
                                                            <label for="fname">First Name</label>
                                                            <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname')}}">  
                                                            <span class="text-danger">@error('fname'){{ $message }}@enderror</span>                                                      
                                                        </div>                                                        
                                                                                            
                                                        <div class="col-md-6 mb-4 forms-inputs">
                                                            <label for="lname">Last Name</label>
                                                            <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}">
                                                            <span class="text-danger">@error('lname'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="forms-inputs row">
                                                        <div class="form-inputs col-md-6 mb-4">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">  
                                                            <!-- <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> -->
                                                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>                                                      
                                                        </div>                                                        
                                                                                            
                                                        <div class="col-md-6 mb-4 forms-inputs">
                                                            <label for="lname">Confirm Password</label>
                                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                            <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>

                                                    <div class="forms-inputs row">
                                                        <div class="forms-inputs col-md-6 mb-4">
                                                        <label for="contact_no">Contact Number</label>
                                                        <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no')}}"> 
                                                        <span class="text-danger">@error('contact_no'){{ $message }}@enderror</span>                                                        
                                                    </div>                                                        
                                                                                            
                                                        <div class="col-md-6 mb-4 forms-inputs">
                                                            <label for="email">Email Address</label>
                                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>

                                                    <div class="forms-inputs md-12 mb-4"> 
                                                        <label for="address">Home Address</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                                                        <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                                                    </div>


                                                    <div class="row mb-2 forms-inputs">
                                                        <div class="col-md-6 mb-4">
                                                            <select class="form-select" name="gender" id="gender" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>

                                                            <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="mb-2"> 
								                        <button id="button" type="submit" class="btn btn-dark w-100">Login</button> 
							                        </div>

													<div class="mt-4 text-center">
														Already have an account? <a href="{{route('login')}}">Login</a>
													</div>
                                          </form>
                            </div>
                        </div>
                    
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
        
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script type="text/javascript" src="app.js"></script>
      <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

    </script>
</body>


</html>
