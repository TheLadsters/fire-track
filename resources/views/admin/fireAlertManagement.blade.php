@extends('admin/layoutAdmin')

@section('fireAlertManagement')
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<div class="container">
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
            <div class="alarm-details px-2">

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
            </div>
        </div>


        <div class="bottom-details">

            <a id="add-firealert">
                <i class='bx bx-alarm-add'></i>
                Add Fire Alert
            </a>

            <a id="edit-firealert">
                <i class='bx bx-edit'></i>
                Edit Fire Alert
            </a>

            <a id="delete-firealert">
                <i class="far fa-trash-alt"></i>
                Delete Fire Alert
            </a>

            <a id="firealert-manager" data-toggle="modal" data-target=".fireAlertManagerModal">
                <i class='bx bxs-hot'></i>             
                Fire Alert Manager
            </a>
        </div>

    </div>  
</div>

{{-- start of modal code --}}

<!-- Modal -->
<div class="modal fade fireAlertManagerModal" tabindex="-1" role="dialog" aria-labelledby="fireAlertManagerModalModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content px-3">
        <div class="modal-header forgetPasswordHeader">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Fire Alert Manager</h2>
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover alert-table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAllUser">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th>
                                    <th>Fire Location</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="tbl-body-user">
                                                         
                            </tbody>

                        </table>
                        <div class="clearfix">
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
                        </div>
                    </div>
                </div>    
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary">SUBMIT</button>
        </div>
      </div>
    </div>
  </div>

{{-- end of modal code --}}

@endsection