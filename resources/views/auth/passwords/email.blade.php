<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/forgot-password.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/forgot-password.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
                                @csrf
                                @if (session('status'))
                                    <input type="hidden" id="email_sent" value="1" />
                                @endif
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    
                    <div class="form-group">
                                    <label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                                    <button type="submit" class="btn-submit btn-block send-passlink">
										Send Password Link
									</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="/forgotPassword.js"></script>
</body>
</html>