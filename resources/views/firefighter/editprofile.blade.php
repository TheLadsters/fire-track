@extends('firefighter/layoutFirefighter')

@section('editProfile')
{{-- <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/fire-hydrant-type.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head> --}}
<head>
    <link rel="stylesheet" href="css/editprofile-firefighter.css">
</head>


    <div class="container-xl px-4">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <!-- Profile picture card-->
                <div class="card mb-4">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <div class="form-group">
                            <label class="mb-3">Upload new image</label>
                            <input type="file" class="form-control" required>
                        </div>	
                    </div>
                </div>
            </div>

            <div class="col-sm-8 mt-5">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" >
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name">
                                </div>
                            </div>
                            <!-- Form Group (Address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputAddress">Address</label>
                                <input class="form-control" id="inputAddress" type="text" placeholder="Enter your address">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3   ">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number">
                                </div>
                                <!-- Form Group (Email address-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmail">Email Address</label>
                                    <input class="form-control" id="inputEmail" type="text" name="email address" placeholder="Enter your email address">
                                </div>
                                <div class="col-md-6">
                                    <br><a data-bs-toggle="modal" data-bs-target="#changePasswordModal" id="changePass"><label class="small mb-1">Change Password</label></a>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Edit Modal HTML -->
{{-- <div id="ChangePasswordModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Change Password</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Current Password</label>
						<input type="password" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" required> 
					</div>
					<div class="form-group">
						<label>Re-type New Password</label>
                        <input type="password" class="form-control" required> 
					</div>	
				</div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Update password</button>
				</div>
			</form>
		</div>
	</div>
</div> --}}
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalCenter" aria-hidden="true">
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

@endsection