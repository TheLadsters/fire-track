@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','fireAlertManagement')

@section('content')
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<div class="container-firealert" id="content">
    <div id="firelertmapmanagement"></div>
    <div class="right-sidebar">

        <div class="top-details">
            <div class="hamburger">
                <i class='bx bx-menu bx-sm' style='color:#6c63ff'></i>
            </div>

            {{-- <div class="search-bar">
                <label class="visually-hidden" for="autoSizingInputGroup">Search</label>
                <div class="input-group">
                <input type="text" class="form-control" id="input-mapsearch" placeholder="Search">
                    <div class="input-group-text btn-search">
                            <i class="fas fa-search"></i>
                    </div>
                </div>
            </div> --}}

            <div class="for-title">
                <h4>Fire Alert Management</h4>
            </div>
        </div>

        <div class="middle-details">
       
        </div>


        <div class="bottom-details">
            <ul class="map-controls">
                <li> 
                    <a id="add-firealert">
                        <i class='bx bx-alarm-add'></i>
                        Add Fire Alert
                    </a>
                </li>

                <li>
                    <a id="edit-firealert">
                        <i class='bx bx-edit'></i>
                        Edit Fire Alert
                    </a>
                </li>

                <li>
                    <a id="delete-firealert">
                        <i class="far fa-trash-alt"></i>
                        Delete Fire Alert
                    </a>
                </li>

                <li>
                    <a id="firealert-manager" data-toggle="modal" data-target=".fireAlertManagerModal">
                        <i class='bx bxs-hot'></i>             
                        Fire Alert Manager
                    </a>
                </li>
               
            </ul>
           
        </div>

    </div>  
</div>

@include("modals.firealertmanager")
@include("modals.firealertmanageradd")
@include("modals.firealertmanageredit")
@include("modals.firealertmanagerdelete")

@endsection