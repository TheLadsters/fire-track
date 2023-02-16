@extends('admin/layoutAdmin')

@section('addFireHydrantManagement')
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<div class="container-hydrant">
    <div id="firehydrantmap"></div>

    <div class="right-sidebar-hydrant">

        <div class="top-details-hydrant">
            <div class="hamburger-hydrant">
                <i class='bx bx-menu bx-sm' style='color:#6c63ff'></i>
            </div>

            <div class="search-bar-hydrant">
                <label class="visually-hidden" for="autoSizingInputGroup">Search</label>
                <div class="input-group">
                <input type="text" class="form-control" id="input-mapsearch" placeholder="Search">
                    <div class="input-group-text btn-search">
                            <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

            <div class="for-title-hydrant">
                <h4>Fire Hydrant Management</h4>
            </div>
        </div>

        <div class="middle-details-hydrant">
        </div>


        <div class="bottom-details-hydrant">
            <ul class="map-controls-hydrant">
                <li> 
                    <a id="add-firehydrant">
                        <i class='bx bx-alarm-add'></i>
                        Add Fire Hydrant
                    </a>
                </li>

                <li>
                    <a id="edit-firehydrant">
                        <i class='bx bx-edit'></i>
                        Edit Fire Hydrant
                    </a>
                </li>

                <li>
                    <a id="delete-firehydrant">
                        <i class="far fa-trash-alt"></i>
                        Delete Fire Hydrant
                    </a>
                </li>

                <li>
                    <a id="firehydrant-manager" data-toggle="modal" data-target="">
                        <i class='bx bxs-hot'></i>             
                        Fire Hydrant Manager
                    </a>
                </li>
               
            </ul>
           
        </div>

    </div>  
</div>

@include("modals.addHydrant")
@include("modals.editHydrant")

@endsection