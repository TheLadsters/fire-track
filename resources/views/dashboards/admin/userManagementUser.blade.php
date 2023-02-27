@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','userManagementUser')

@section('content')

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/adminCSS/userManagementUser-admin.css">
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
						<a class="btn btn-success" data-bs-toggle="modal" data-bs-target=".adminUserAddModal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target=""><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover" id="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAllUser">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Username</th>
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
						<td>{{$user->gender}}</td>
                        <td>{{$user->status}}</td>
						<td>
							<!-- <a class="edit" data-bs-toggle="modal" data-bs-target="#userManagementEditModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a> -->
							<a href="{{ route('admin.userManagementGetID', [$user->user_id]) }}" class="edit">
								<i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i>
                            </a>
							<!-- <a class="delete" data-bs-toggle="modal" data-bs-target="#userManagementDeleteModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a> -->
							<form method="POST" action="{{ route('admin.userManagementDelete',[$user->user_id])}}">
								@csrf
								@method('DELETE')
								<button type="submit" style="border:none; outline: none;">
									<i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i>
                                </button> 
							</form>
						</td>
					</tr>
                    <tr>
					@endforeach
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
			</div> -->
		</div>
	</div>        
</div>
<!--  
<div id="userManagementDeleteModal" class="modal fade userManagementDeleteModal">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content px-3">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row text-center">
            <div class="col-12 mb-2">
              <h4>Delete User</h4>
            </div>
          </div>

            <p>Are you sure you want to delete this User? </p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
            

        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
          
     
			<form method="POST" action="{{ route('admin.userManagementDelete',[$user->user_id])}}">
                @csrf
                @method('DELETE')
				<input type="submit" class="btn btn-danger" id="" value="Delete"> 
            </form>

        </div>
      </div>
    </div>
  </div> -->

@include("modals.adminUserAdd")
@include("modals.userManagementEdit")
<!-- @include("modals.userManagementDelete") -->

@endsection