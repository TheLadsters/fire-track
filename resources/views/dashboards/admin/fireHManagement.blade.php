@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Fire Hydrant Management')

@section('content')

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<div class="container-hydrant">
    <div id="firehydrantmap"></div>

    <div id="sidebarHydrantBurger" style="cursor:pointer">
        <i class='bx bx-menu bx-md' style='color:#6c63ff'></i>
    </div>

    <div class="right-sidebar-hydrant">

        <div class="top-details-hydrant">
            <div class="hamburger-hydrant">
                <i class="bx bx-menu bx-x bx-md" style='color:#6c63ff'></i>
            </div>


            <div class="for-title-hydrant">
                <div>
                    <img src="images/hydrant_white.png" id="hydrant_logo" width="40%" height="35%"/>
                </div>
                <p>Fire Hydrant Management</p>
            </div>
        </div>

        <div class="middle-details-hydrant">
        </div>


        <div class="bottom-details-hydrant">
            <p id="menu-title">Menu</p>
            <ul class="map-controls-hydrant">
                <li> 
                    <a id="add-firehydrant">
                        <i class="fas fa-plus-circle"></i>
                        Add Fire Hydrant
                    </a>
                </li>

                <li>
                    <a id="edit-firehydrant">
                        <i class='bx bxs-edit'></i>
                        Edit Fire Hydrant
                    </a>
                </li>

                <li>
                    <a id="delete-firehydrant">
                        <i class="fas fa-trash-alt"></i>
                        Delete Fire Hydrant
                    </a>
                </li>

                <li>
                    <a id="firehydrant-manager">
                        <i class="fas fa-fire-extinguisher"></i>            
                        Fire Hydrant Manager
                    </a>
                </li>
               
            </ul>
           
        </div>

    </div>  
</div>

<input id="hydrantSearchBox" type="text" placeholder="Search Box"/>

@include("modals.addHydrant")
@include("modals.editHydrant")
@include("modals.deleteHydrant")
@include("modals.fireHydrantManager")
@endsection