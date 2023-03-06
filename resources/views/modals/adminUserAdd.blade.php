<!-- Add Modal HTML -->
<div id="adminUserAddModal" class="modal fade adminUserAddModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div id="modal-head">
				<div class="row py-2 px-2">
					<div class="col-12">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>		
					</div>	
				</div>

				<div class="row" style="margin-left: 3%;">	
						<h4 class="modal-title col-12">
							<i class='bx bxs-user bx-md'></i>				
							Add New User
						</h4>
				</div>
				
				<div class="row" style="margin-left: 8%;">
					<div class="col-12">
						Add a new user to be an admin or firefighter to use the FireTrack App.
					</div>
				</div>
			</div>

			<form action="admin/userManagementUser/addAdminUser" method="post" enctype="multipart/form-data">
				@csrf
<<<<<<< HEAD
				<div class="modal-body">
					<div class="form-group">
						<label id="label-form">Username</label>
						<input type="text" class="form-control" id="username" name="username" required value="{{ old('username') }}">
					</div>					
					<div class="form-group">
						<label  id="label-form">First Name</label>
						<input type="text" class="form-control" id="fname" required name="fname" value="{{ old('fname') }}">
					</div>
					<div class="form-group">
						<label  id="label-form">Last Name</label>
						<input type="text" class="form-control" id="lname" required name="lname" value="{{ old('lname') }}">
					</div>
					<div class="form-group">
						<label  id="label-form">Password</l abel>
						<input type="password" class="form-control" id="password" required name="password" value="{{ old('password') }}">
					</div>
					<div class="form-group">
						<label  id="label-form">Email</label>
						<input type="email" class="form-control" id="email" required name="email" value="{{ old('email') }}">
					</div>
                    <div class="form-group">
						<label id="label-form">Mobile Number</label>
						<input type="number" class="form-control" id="contact_no" required name="contact_no" value="{{ old('contact_no') }}">
					</div>
					<div class="form-group">
						<label  id="label-form">Address</label>
						<textarea class="form-control" id="address" required name="address" value="{{ old('address') }}"></textarea>
					</div>
					<div class="form-group"> <br>
						<select class="form-select" name="gender" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<button type="submit" class="btn btn-success">SUBMIT</button>
=======
				<div class="modal-body mt-4">

					<div class="row">
						<div class="form-group col-6">
							<label>Username<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="username" name="username" required value="{{ old('username') }}">
						</div>	
						
						<div class="form-group col-6">
							<label>Password<span style="color:red;">*</span></label>
							<input type="password" class="form-control" id="password" required name="password" value="{{ old('password') }}">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-6">
							<label>First Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="fname" required name="fname" value="{{ old('fname') }}">
						</div>
						<div class="form-group col-6">
							<label>Last Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="lname" required name="lname" value="{{ old('lname') }}">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-6">
							<label>Email<span style="color:red;">*</span></label>
							<input type="email" class="form-control" id="email" required name="email" value="{{ old('email') }}">
						</div>
						<div class="form-group col-6">
							<label>Mobile Number<span style="color:red;">*</span></label>
							<input type="number" class="form-control" id="contact_no" required name="contact_no" value="{{ old('contact_no') }}">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-6">
							<label>Address<span style="color:red;">*</span></label>
							<input class="form-control" type="text" id="address" required name="address" value="{{ old('address') }}">
						</div>
						<div class="form-group col-6">
							<label>Gender<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="gender" name="gender" required value="{{ old('gender') }}">
						</div>		
					</div>	

					<div class="row">
						<div class="col-6">
							<input type="button" class="btn-cancel" data-bs-dismiss="modal" value="Cancel">
						</div>

						<div class="col-6">
							<button type="submit" class="btn-add-user">Submit</button>
						</div>
					</div>

>>>>>>> 6dcec9a859d19adf4b374a44ece5090c9e982cf6
				</div>

			</form>
		</div>
	</div>
</div>