<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

	<link rel="icon" type="image" href="images/Firetrack.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>FireTrack App</title>
</head>

<body id="login-body">

		<div class="container mt-5">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6">
					<div class="card px-5 py-1" id="form1">
						<div class="d-flex justify-content-center mt-3">
							<img src="images/fire_track_logo_clear.png" alt="firetracklogo" class="fireTrackLogo"/>
						</div> 
						<div class="mb-1">
									<h3 id="signIn-title">Sign In</h3>
									<p id="signin-info" class="mb-4">Sign in to the FireTrack App and use our services.</p>
						</div>
						<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
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
							<div class="forms-inputs mb-4 mt-4"> 
								<span>Email</span> 
								<input autocomplete="off" name="email" type="text" required v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
								<div class="invalid-feedback">A valid email is required!</div>
							</div>
							<div class="forms-inputs mb-4"> 
								<span>Password</span> 
								<input autocomplete="off" name="password" type="password" required v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
								<div class="invalid-feedback">Password must be at least 8 characters!</div>
							</div>
							<div class="d-flex mb-4 align-items-center">
								<a href="{{route('password.request')}}" class="float-right" style="font-size: 15px;">
									Forgot Password?
								</a>
							</div>
							<div class="mb-2"> 
								<button id="button" type="submit" class="btn btn-dark w-100">Login</button> 
							</div>
						</form>
						<div class="mt-2 mb-2 text-center">
								Don't have an account? <a href="{{route('register')}}">Create One</a>
						</div>
					</div>
				</div>
			</div>
		</div>
  	
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
      <script type="text/javascript" src="my-login.js"></script>
	 
</body>


</html>



