@extends('admin/layoutAdmin')

@section('userManagementAdmin')

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/adminCSS/userManagementAdmin-admin.css">
</head>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>User</b> Management</h2>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAllUser">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile No.</th>
						<th>Address</th>
						<th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody class="tbl-body-user">
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
                        <td>09293026732</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>Male</td>
                        <td>Active</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>

		 
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Mobile Number</label>
						<input type="number" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>


@endsection