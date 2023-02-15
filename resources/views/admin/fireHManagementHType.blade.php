@extends('admin/layoutAdmin')

@section('fireHydrantManagementType')

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/adminCSS/fireHydrantType.css">


{{-- <script>
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
</script> --}}
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
						{{-- <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editFireHydrantTypeModal"><i class="material-icons">&#xE147;</i> <span>Add Type</span></a>
						<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteFireHydrantTypeModal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 --}}
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Fire Hydrant Type</th>
						<th>Fire Hydrant Image</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Type 1</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px; border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>Type 2</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px;border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
						<td>Type 3</td>
						<td><img src="images/wetbarrel.jpg" style="width:50px;height:50px;border-radius: 50%;border: 1px solid #555;"></td>
                        <td>Wet Barrel</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
						</td>
					</tr>
                    <tr>
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

		</div>
	</div>
</div>
@endsection