<!-- Edit Modal HTML -->
<div id="userManagementEditModal" class="modal fade userManagementEditModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{route('admin.userManagementEdit')}}">
				@csrf
				<div class="modal-header">							
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" required>
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="text" class="form-control" name="contact_no" required>
					</div>					
					<div class="form-group">
						<label>Status</label>
						<input type="text" class="form-control" name="status" required>
					</div>
					<input type="text" id="user_id" style="display: none;" class="form-control" name="user_id" value="{{Auth::user()->user_id}}">
				
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<button type="submit" class="btn btn-primary send-edit-alert">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>