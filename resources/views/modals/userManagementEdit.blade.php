<!-- Edit Modal HTML -->
<div id="userManagementEditModal{{ $user->user_id }}" class="modal fade userManagementEditModal" value="{{$user->user_id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{route('admin.userManagementEdit', [$user->user_id])}}">
				@csrf
				@method('PUT')
				<div class="modal-header">							
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : $user->username }}">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email}}">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $user->address }}">
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="text" class="form-control" name="contact_no" value="{{ old('contact_no') ? old('contact_no') : $user->contact_no }}">
					</div>					
					<div class="form-group">
						<label>Status</label>
						<!-- <input type="text" class="form-control" name="status" value="{{ old('status') ? old('status') : $user->status }}"> -->
						<div class="col-sm-6">
                            <select class="form-select" name="status" id="status">
                                <option value="{{$user->status}}"> {{$user->status}}</option>
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