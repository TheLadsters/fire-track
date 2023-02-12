<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
			
					<div class="cardx fat mt-5">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<label for="email">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus placeholder="Enter Username">
                                    <span class="text-danger">@error('username'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Enter password">
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{route('register')}}">Create One</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="/my-login.js"></script>
</body>
</html>
 -->
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
    <link rel="stylesheet" href="css/login-signup.css">
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

									<div class="mb-4">
									<h3 id="signIn-title">Sign In</h3>
									<p id="signin-info" class="mb-4">Sign in to the FireTrack App and use our services.</p>
									</div>
									<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
										@csrf
										<span class="text-danger">@error('username'){{ $message }}@enderror</span>
										<div class="form-group first mb-2">
											<label for="username">Username</label>
											<input type="text" class="form-control" id="username" name="username">
											
										</div> 
										<span class="text-danger">@error('password'){{ $message }}@enderror</span>
										<div class="form-group last mb-4">
											<label for="password">Password</label>
											<input type="password" class="form-control" id="password" name="password">					
										</div>
								
										<div class="d-flex mb-4 align-items-center">
											<a href="{{route('password.request')}}" class="float-right">
												Forgot Password?
											</a>
										</div>
										<button type="submit" class="btn btn-primary btn-block">
												Login
										</button>
										<div class="mt-4 text-center">
													Don't have an account? <a href="{{route('register')}}">Create One</a>
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
      <script type="text/javascript" src="/app.js"></script>
</body>


</html>