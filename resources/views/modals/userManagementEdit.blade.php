<!-- Edit Modal HTML -->
<div id="userManagementEditModal" class="modal fade userManagementEditModal">
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
							<i class='bx bxs-edit-alt bx-md head-icon'></i>				
							Edit User
						</h4>
				</div>
				
				<div class="row" style="margin-left: 9%;">
					<div class="col-12">
						Edit an existing user's details based on their existing information.
					</div>
				</div>
			</div>

			<form method="POST" action="{{route('admin.userManagementEdit')}}">
				@csrf
	
				<input type="hidden" name="user_id" id="user_id">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>First Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="edit-fname" name="fname" value="{{ old('fname') }}">
						</div>
						<div class="form-group col-md-6">
							<label>Last Name<span style="color:red;">*</span></label>
							<input type="text" class="form-control" id="edit-lname" name="lname" value="{{ old('lname') }}">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>Email<span style="color:red;">*</span></label>
							<input type="email" class="form-control" name="email" id="email-edit">
						</div>
						<div class="form-group col-md-6">
							<label>Contact Number<span style="color:red;">*</span></label>
							<input type="text" class="form-control" name="contact_no" id="contact_no-edit">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>Address<span style="color:red;">*</span></label>
							<input type="text" class="form-control" name="address" id="address-edit">
						</div>
						<div class="form-group col-md-6">
							<label>Gender<span style="color:red;">*</span></label>
							<select class="form-select" id="edit-gender" name="gender" value="{{ old('gender') }}">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>	
					</div>
					
					<div class="row">
						<div class="form-group col-md-6">
							<label>Status<span style="color:red;">*</span></label>
							<div>
								<select class="form-select" name="status" id="status-edit" aria-label="status-selector">
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
								</select>
							</div>
						</div>
					</div>	

					<div class="row">
						<div class="col-md-6">
							<input type="button" class="btn-cancel mb-2" data-bs-dismiss="modal" value="Cancel">
						</div>

						<div class="col-md-6">
							<button type="submit" class="btn-edit-user send-edit-alert">Update</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>