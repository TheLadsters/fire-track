@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Add admin user')

@section('content')

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="css/adminCSS/userManagementUser-admin.css">
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
	rel="stylesheet"
	/>
	
</head>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">	
							<a href="{{route('admin.userManagementUser')}}"style="color:white;"><i class='bx bx-arrow-back' style='color:#ffffff'  ></i> Back</a>	
					</div>
				</div>
			</div> <br>
			<div id="modal-head" style="background-image:url('images/rectangles_background.png');">
				<div class="row " style="margin-left: 8%;">	
						<h4 class="modal-title">
							<i class='bx bxs-user bx-md head-icon'></i>				
							Add New User
						</h4>
				</div>
				
				<div class="row" style="margin-left: 13%;">
					<div class="col-10">
						Add a new user to be a firefighter to use the FireTrack App.
					</div>
				</div>
			</div>
			<form action="{{ route('admin.addAdminUser')}}" class="my-login-validation" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body mt-4">

					<div class="row justify-content-center">
						<div class="form-group col-md-5 mb-4">
							<label>First Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="fname"  name="fname" value="{{ old('fname') }}">
							<div><span class="text-danger">@error('fname'){{ $message }}@enderror</span></div>
						</div>
						<div class="form-group col-md-5 mb-4">
							<label>Last Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="lname"  name="lname" value="{{ old('lname') }}">
							<div><span class="text-danger">@error('lname'){{ $message }}@enderror</span></div>
						</div>	
					</div>

					<div class="row justify-content-center">
						<div class="form-group col-md-5 mb-4">
							<label>Password<span style="color:red;">*</span></label>
							<input type="password" class="form-control" id="password"  name="password" value="{{ old('password') }}">
							<div><span class="text-danger">@error('password'){{ $message }}@enderror</span></div>
						</div>
						
						<div class="form-group col-md-5 mb-4">
							<label for="lname">Confirm Password</label>
                        	<input type="password" class="form-control" id="password" name="password_confirmation">
							<div><span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span></div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="form-group col-md-5 mb-4">
							<label>Email<span style="color:red;">*</span></label>
							<input type="email" class="form-control" id="email"  name="email" value="{{ old('email') }}">
							<div><span class="text-danger">@error('email'){{ $message }}@enderror</span></div>
						</div>
						
						<div class="form-group col-md-5 mb-4">
							<label>Mobile Number<span style="color:red;">*</span></label>
							<input type="number" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no') }}">
							<div><span class="text-danger">@error('contact_no'){{ $message }}@enderror</span></div>
						</div>
						
					</div>

					<div class="row justify-content-center">
						<div class="form-group col-md-5 mb-4">
							<label>Address<span style="color:red;">*</span></label>
							<input class="form-control" type="text" id="address"  name="address" value="{{ old('address') }}">
							<div><span class="text-danger">@error('address'){{ $message }}@enderror</span></div>
						</div>
						
						<div class="form-group col-md-5 mb-7">
							<label>Gender<span style="color:red;">*</span></label>
							<select class="form-select" id="gender" name="gender"  value="{{ old('gender') }}">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>		
					</div>	
					<!-- <br><br> -->
					<div class="row justify-content-center">
						<div class="col-md-5 mb-3">
							<button type="submit" class="btn-add-user" id="form-submit">Submit</button>
						</div>
					</div>
					<br>

				</div>

			</form>
		</div>
			
		</div>
	</div>        
</div>
@endsection