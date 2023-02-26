<!-- Add Modal HTML -->
<div id="adminUserAddModal" class="modal fade adminUserAddModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">						
				<h4 class="modal-title">Add Admin User</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				
			</div>
			<form action="admin/userManagementUser/addAdminUser" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" id="username" name="username" required value="{{ old('username') }}">
					</div>					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" id="fname" required name="fname" value="{{ old('fname') }}">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" id="lname" required name="lname" value="{{ old('lname') }}">
					</div>
					<div class="form-group">
						<label>Password</l abel>
						<input type="password" class="form-control" id="password" required name="password" value="{{ old('password') }}">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" id="email" required name="email" value="{{ old('email') }}">
					</div>
                    <div class="form-group">
						<label>Mobile Number</label>
						<input type="number" class="form-control" id="contact_no" required name="contact_no" value="{{ old('contact_no') }}">
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address" required name="address" value="{{ old('address') }}"></textarea>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<input type="text" class="form-control" id="gender" name="gender" required value="{{ old('gender') }}">
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<button type="submit" class="btn btn-success">SUBMIT</button>
				</div>
			</form>
		</div>
	</div>
</div>