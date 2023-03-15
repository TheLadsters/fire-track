<!-- Add Modal HTML -->
<div id="adminUserAddModal" class="modal fade adminUserAddModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div id="modal-head" style="background-image:url('images/rectangles_background.png');">
				<div class="row py-2 px-2">
					<div class="col-12">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
					</div>	
				</div>

				<div class="row" style="margin-left: 3%;">	
						<h4 class="modal-title col-12">
							<i class='bx bxs-user bx-md head-icon'></i>				
							Add New User
						</h4>
				</div>
				
				<div class="row" style="margin-left: 9%;">
					<div class="col-12">
						Add a new user to be a firefighter to use the FireTrack App.
					</div>
				</div>
			</div>
			<div class="alert alert-danger" style="display:none"></div>
			<form action="{{ route('admin.addAdminUser')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body mt-4">

					<div class="row">
						<div class="form-group col-md-6">
							<label>First Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="fname"  name="fname" value="{{ old('fname') }}">
							<!-- <div><span class="text-danger">@error('fname'){{ $message }}@enderror</span></div> -->
						</div>
						<div class="form-group col-md-6">
							<label>Last Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="lname"  name="lname" value="{{ old('lname') }}">
							<!-- <div><span class="text-danger">@error('lname'){{ $message }}@enderror</span></div> -->
						</div>
						
						
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>Password<span style="color:red;">*</span></label>
							<input type="password" class="form-control" id="password"  name="password" value="{{ old('password') }}">
							<!-- <div><span class="text-danger">@error('password'){{ $message }}@enderror</span></div> -->
						</div>
						<div class="form-group col-md-6">
							<label>Email<span style="color:red;">*</span></label>
							<input type="email" class="form-control" id="email"  name="email" value="{{ old('email') }}">
							<!-- <div><span class="text-danger">@error('email'){{ $message }}@enderror</span></div> -->
						</div>
					
					</div>

					<div class="row">
						
						<div class="form-group col-md-6">
							<label>Mobile Number<span style="color:red;">*</span></label>
							<input type="number" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no') }}">
							<!-- <div><span class="text-danger">@error('contact_no'){{ $message }}@enderror</span></div> -->
						</div>
						<div class="form-group col-md-6">
							<label>Address<span style="color:red;">*</span></label>
							<input class="form-control" type="text" id="address"  name="address" value="{{ old('address') }}">
							<!-- <div><span class="text-danger">@error('address'){{ $message }}@enderror</span></div> -->
						</div>
					</div>

					<div class="row">
						
						<div class="form-group col-md-6">
							<label>Gender<span style="color:red;">*</span></label>
							<select class="form-select" id="gender" name="gender"  value="{{ old('gender') }}">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>		
					</div>	

					<div class="row">
						<div class="col-md-6">
							<input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
						</div>

						<div class="col-md-6">
							<button type="submit" class="btn-add-user" id="form-submit">Submit</button>
						</div>
					</div>

				</div>

			</form>
		</div>
	</div>
</div>