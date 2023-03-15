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
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover hydrantType_table" id="hydrantType_table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Image</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody class="tbl-body-user">

			
				</tbody>
			</table>
		</div>
	</div>
</div>



@include("modals.fireHydrantTypeEdit")


@include("modals.fireHydrantTypeAdd")


@include("modals.fireHydrantTypeDelete")

@endsection