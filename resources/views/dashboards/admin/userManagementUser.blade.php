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
						<a class="btn btn-info" data-bs-toggle="modal" data-bs-target=".adminUserAddModal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						<a class="btn btn-success" href="{{route('admin.export_users_pdf')}}"><i class="material-icons">&#xE15C;</i> <span>Export</span></a>						
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover" id="table-striped">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAllUser">
								<label for="selectAll"></label>
							</span>
						</th>
						<th style="font-weight: bold;">Username</th>
						<th style="font-weight: bold;">Name</th>
						<th style="font-weight: bold;">Email</th>
						<th style="font-weight: bold;">Mobile No.</th>
						<th style="font-weight: bold;">Address</th>
						<th style="font-weight: bold;">Role</th>
                        <th style="font-weight: bold;">Status</th>
                        <th style="font-weight: bold;">Action</th>
					</tr>
				</thead>
				<tbody class="tbl-body-user">
				@foreach($users as $user)
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>{{$user->username}}</td>
						<td>{{$user->fname}} {{$user->lname}}</td>
						<td>{{$user->email}}</td>
                        <td>{{$user->contact_no}}</td>
						<td>{{$user->address}}</td>
						<td>{{$user->role}}</td>
                        <td>
							<span class="badge badge-success rounded-pill d-inline">{{$user->status}}</span>
						</td>
						<td>
							<a class="edit" data-bs-toggle="modal" data-bs-target="#userManagementEditModal{{ $user->user_id }}"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
							
							<!-- <a href="{{ route('admin.userManagementGetID', [$user->user_id]) }}" class="edit" >
								<i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i>
                            </a> -->
							<a class="delete" data-bs-toggle="modal" data-bs-target="#userManagementDeleteModal{{ $user->user_id }}"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
							<!-- <form method="POST" action="{{ route('admin.userManagementDelete',[$user->user_id])}}">
								@csrf
								@method('DELETE')
								<button type="submit" style="border:none; outline: none;">
									<i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i>
                                </button> 
							</form> -->
						</td>
					</tr>
					@include("modals.userManagementDelete")
                    <tr>
					@include("modals.userManagementEdit")	
					
				</tbody>
				
				@endforeach
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
			</div> -->
		</div>
	</div>        
</div>

@include("modals.adminUserAdd")


@endsection