@extends('dashboards.firefighter.layouts.layoutFirefighter')
@section('title','profile')

@section('content')
<head>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="css/firefighterCSS/editprofile-firefighter.css">
</head>

<!-- Edit Modal HTML -->
<div id="ChangePasswordModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form class="form-horizontal" action="{{ route('firefighterChangePassword') }}" method="POST" id="changePasswordFirefighterForm">
				<div class="modal-header">						
					<h4 class="modal-title">Change Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Current Password</label>
						<input type="password" class="form-control" required name="oldpassword">
                        <span class="text-danger error-text oldpassword_error"></span>
					</div>
                    <div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" required name="newpassword"> 
                        <span class="text-danger error-text newpassword_error"></span>
					</div>
					<div class="form-group">
						<label>Confirm New Password</label>
                        <input type="password" class="form-control" required name="cnewpassword">
                        <span class="text-danger error-text cnewpassword_error"></span>
					</div>	
				</div>
				<div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update password</button>
				</div>
			</form>
		</div>
	</div>
</div>


    <div class="container-xl px-4 mt-5">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <!-- Profile picture card-->    
                <div class="card mb-4"> 
                    <div class="card-header">Profile Picture</div>
                    <h3 class="profile-username text-center admin_name">{{Auth::user()->fname}} {{Auth::user()->lname}} </h3>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2 firefighter_picture" src="{{ Auth::user()->img_url }}" alt="User profile picture">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <div class="form-group">
                            <input type="file" class="form_control" name="firefighter_image" id="firefighter_image" style="opacity: 0;height:1px;display:none"><br>      
                            <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
                        </div>	
                    </div>
                </div>
            </div>

            <div class="col-sm-8 mt-5">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('firefighterUpdateInfo') }}" id="firefighterInfoForm">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAddress">Username</label>
                                    <input class="form-control" id="username" type="text" placeholder="Enter your username" value="{{ Auth::user()->username }}" name="username">
                                    <span class="text-danger error-text username_error"></span>
                                </div>
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="fname">First name</label>
                                    <input class="form-control" id="fname" type="text" placeholder="Enter your first name" value="{{ Auth::user()->fname }}" name="fname" >
                                    <span class="text-danger error-text fname_error"></span>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="lname">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ Auth::user()->lname }}" name="lname">
                                    <span class="text-danger error-text lname_error"></span>
                                </div>
                            </div>
                            <!-- Form Group (Address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="address">Address</label>
                                <input class="form-control" id="address" type="text" placeholder="Enter your address" value="{{ Auth::user()->address }}" name="address">
                                <span class="text-danger error-text address_error"></span>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3   ">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="contact_no">Phone number</label>
                                    <input class="form-control" id="contact_no" type="tel" placeholder="Enter your phone number" value="{{ Auth::user()->contact_no }}" name="contact_no">
                                    <span class="text-danger error-text contact_no_error"></span>
                                </div>
                                <!-- Form Group (Email address-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="email">Email Address</label>
                                    <input class="form-control" id="email" type="text" placeholder="Enter your email address" value="{{ Auth::user()->email }}" name="email">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <br><a data-bs-toggle="modal" data-bs-target="#changePasswordModal" id="changePass"><label class="small mb-1">Change Password</label></a>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
