@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Fire Hydrant Type')

@section('content')

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/adminCSS/fireHydrantType.css">

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
						<a class="btn btn-success" data-bs-toggle="modal" data-bs-target=".addFireHydrantTypeModal"><i class="material-icons">&#xE147;</i> <span>Add Type</span></a>
						<!-- <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteFireHydrantTypeModal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Fire Hydrant Type</th>
						<th>Image</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>

				@if($allHydrantTypes)
					@foreach($allHydrantTypes as $types)
						<tr>
							<td>{{ $types->name }}</td>
							<td><img src="{{ $types->img_url ? asset('storage/'.$types->img_url) : asset('images/fire-hydrant.png')}}" 
							style="width:50px;height:50px; border-radius: 50%;border: 1px solid #555;"></td>
							<td>
								<a class="edit editHydrantType" ><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
								<a class="delete deleteHydrantType"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
							</td>
						</tr>
					@endforeach
					
				@else
					<tr>
						<td colspan="12" class="text-center">No Records Found!</td>
					</tr>
				@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

@include("modals.firehydranttypeadd")
@include("modals.firehydranttypeedit")
@include("modals.firehydranttypedelete")

@endsection