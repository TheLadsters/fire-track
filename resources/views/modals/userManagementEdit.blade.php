<!-- Edit Modal HTML -->
<div id="userManagementEditModal" class="modal fade userManagementEditModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{route('admin.userManagementEdit')}}">
				@csrf
	
				<input type="hidden" name="user_id" id="user_id">
				<div class="modal-header">							
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" id="username-edit">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" id="email-edit">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" id="address-edit">
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="text" class="form-control" name="contact_no" id="contact_no-edit">
					</div>					
					<div class="form-group">
						<label>Status</label>
						<div class="col-sm-6">
                            <select class="form-select" name="status" id="status-edit" aria-label="status-selector">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                    	</div>
					</div>				
				<br>
				<br>

				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<button type="submit" class="btn btn-primary send-edit-alert">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>