@extends('admin/layoutAdmin')

@section('fireAlertManagement')
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<div class="container" id="content">
    <div id="firelertmapmanagement"></div>
    <div class="right-sidebar">

        <div class="top-details">
            <div class="hamburger">
                <i class='bx bx-menu bx-sm' style='color:#6c63ff'></i>
            </div>

            <div class="search-bar">
                <label class="visually-hidden" for="autoSizingInputGroup">Search</label>
                <div class="input-group">
                <input type="text" class="form-control" id="input-mapsearch" placeholder="Search">
                    <div class="input-group-text btn-search">
                            <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

            <div class="for-title">
                <h4>Fire Alert Management</h4>
            </div>
        </div>

        <div class="middle-details">
            <!-- <div class="alarm-details px-2">

                <div class="alarm-name py-3 row">
                    <div class="col-12">
                        <input type="text" class="form-control" value="hello" placeholder="Place of Fire">
                    </div>
                </div>

                <div class="alarm-status py-3 row text-center">
                    <div class="col-12">
                        <div class="dropdown">
                            <button class="dropdown-toggle btn-dropdown" type="button" style="width:95%"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 95%">
                            <li><a class="dropdown-item" href="#">Fire Out</a></li>
                            <li><a class="dropdown-item" href="#">Ongoing Fire</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
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
@include("modals.firealertmanagerdelete")
@endsection