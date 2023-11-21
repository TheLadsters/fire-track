@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','User Management')

@section('content')

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="css/adminCSS/userManagementUser-admin.css">
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
	rel="stylesheet"
	/>
	
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
						<a class="btn btn-info" href="{{ route('admin.addUserAdmin')}}"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover user_table" id="user_table" >
				<thead>
					<tr>
						<th style="font-weight: bold;">Name</th>
						<th style="font-weight: bold;">Email</th>
						<th style="font-weight: bold;">Mobile No.</th>
						<th style="font-weight: bold;">Address</th>
						<th style="font-weight: bold;">Role</th>
                        <th style="font-weight: bold;">Status</th>
                        <th style="font-weight: bold; display: hidden;">Created At</th>
                        <th style="font-weight: bold;">Action</th>
					</tr>
				</thead>
				<tbody class="tbl-body-user">
					
				</tbody>
				
			</table>
		</div>
	</div>        
</div>

@include("modals.userManagementDelete")

@include("modals.adminUserAdd")	

 
@include("modals.userManagementEdit")



@endsection