@extends('dashboards.firefighter.layouts.layoutFirefighter')
@section('title','Profile')

@section('content')
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/fire-hydrant-type.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="css/firefighterCSS/editprofile-firefighter.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/adminCSS/userManagementUser-admin.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
</head>
   

    <div class="container-xl px-4 mt-5">
        <div class="row">
            <div class="col-sm-4 mt-5">
                <!-- Profile picture card-->    
                <div class="card mb-4"> 
                    <div class="card-header" style="background-color:#6c63ff; color:white">Profile Picture</div>
                    <h3 class="profile-username text-center mt-3 user_name" style="padding: 0px 18px 0px;">{{Auth::user()->fname}} {{Auth::user()->lname}} </h3>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2 user_picture" 
                        
                        <?php 
                            if(Auth::user()->img_url == NULL){  
                        ?>
                            src= "images/no_img_available.png"
                        <?php
                            }else{
                        ?>
                            src= {{ Auth::user()->img_url) }}
                        <?php
                            }
                        ?>
                                             
                        alt="User profile picture" id="responsive-image">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 2 MB</div>
                        <!-- Profile picture upload button-->
                   
                            <form action="{{route('firefighterPictureUpdate')}}" method="POST" enctype="multipart/form-data" id="firefighterPictureUpdate">
                                @csrf
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Change Profile Picture</label>
                                    <input class="form-control" type="file" name="img_url"> <br>
                                    @error('img_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>    
                                <div class="mb-3">   
                                    <input type="submit" class="btn btn-primary"  style="background-color:#6c63ff;" value="Upload">
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>

            <div class="col-sm-8 mt-5">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header "  style="background-color:#6c63ff; color:white">Account Details</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('firefighterUpdateInfo') }}" id="UserInfoForm">
                             @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" id="fname"  name="fname" value="{{ Auth::user()->fname }}" >
                                    <span class="text-danger error-text fname_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" id="lname"  name="lname"value="{{ Auth::user()->lname }}">
                                    <span class="text-danger error-text lname_error"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" id="email"  name="email" value="{{ Auth::user()->email }}">		
                                    <span class="text-danger error-text email_error"></span>	
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile Number:</label>
                                    <input type="number" class="form-control" id="contact_no" name="contact_no" value="{{ Auth::user()->contact_no }}">
                                    <span class="text-danger error-text contact_no_error"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Address:</label>
                                    <input class="form-control" type="text" id="address"  name="address" value="{{ Auth::user()->address }}">
                                    <span class="text-danger error-text address_error"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                <a data-bs-toggle="modal" data-bs-target="#changePasswordModal" id="changePass"><label class="large mb-1">Change Password</label></a>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn-add-user">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include("modals.firefightereditprofile")

@include('sweetalert::alert')


@endsection
