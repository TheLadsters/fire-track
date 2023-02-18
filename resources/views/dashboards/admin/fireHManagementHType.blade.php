@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','fireHManagementHType')

@section('content')

<head>
{{-- <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/adminCSS/fireHydrantType.css">
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}

<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	}); 
});
</script>
</head>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Fire Hydrant Type</b></h2>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editFireHydrantTypeModal"><i class="material-icons">&#xE147;</i> <span>Add Type</span></a>
						<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteFireHydrantTypeModal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>ID</th>
						<th>Picture</th>
						<th>Fire Hydrant Type</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Type 1</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px; border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Type 2</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px;border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Type 3</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px;border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Type 4</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px;border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>

				</tbody>
			</table>
			<!-- <div class="clearfix">
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
</div> -->
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add Fire Hydrant Type</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Type</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editFireHydrantTypeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Fire Hydrant Type</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Type</label>
						<input type="text" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" required>
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
<div id="deleteFireHydrantTypeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Fire Hydrant</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>				</div>
				</div>
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