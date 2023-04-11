<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image" href="images/Firetrack.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
     <base href="{{ \URL::to('/') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/sideBarLayout.css') }}">
    <link href="{{ asset('css/firefighterCSS/bulletin-firefighter.css') }}" rel="stylesheet">
    
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <title>FireTrack App</title>
    
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="head_logo"> <img src="images/fire_track_final.png" id="firetrack_logo" alt="fire track logo"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a class="nav_logo"> 
              <?php
              if(Auth::user()->img_url != NULL)
              {
              ?>
                  <span class="user_img_url">
                    <img src="{{ asset('storage/' . Auth::user()->img_url) }}" width="20" height="20" class="rounded-circle">
                  </span>
              <?php
              }else{
              ?>
                  <i class='bx bx-user nav_logo-icon'></i>  
              <?php
              }
              ?>
              <span class="nav_user-name admin_name">{{Auth::user()->fname}} {{Auth::user()->lname}}</span> </a>
                <div class="nav_list"> 
                  <a href="{{ route('firefighter.editprofile')}}" class="nav_link {{ (request()->is('firefighter/editprofile*')) ? 'active' : '' }}">
                    <i class='bx bx-user-circle nav_icon'></i>
                    <span class="nav_name">Edit Profile</span> 
                  </a> 
                  
                  <a href="{{ route('firefighter.fireHydrantMap')}}" class="nav_link {{ (request()->is('firefighter/fireHydrantMap*')) ? 'active' : '' }}"> 
                    <i class='bx bx-map-alt nav_icon'></i>
                    <span class="nav_name">Fire Hydrant Map</span> 
                  </a> 
                  
                  <a href="{{ route('firefighter.fireAlertMap')}}" class="nav_link {{ (request()->is('firefighter/fireAlertMap*')) ? 'active' : '' }}">
                    <i class='bx bxs-hot nav_icon'></i> 
                    <span class="nav_name">Fire Alert Map</span> 
                  </a> 
                  
                  <a href="{{ route('firefighter.bulletinfirefighter')}}" class="nav_link {{ (request()->is('firefighter/bulletinfirefighter*')) ? 'active' : '' }}">
                    <i class='bx bx-news nav_icon'></i>
                    <span class="nav_name">Bulletin</span> 
                  </a> 

                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btnLogout"> 
                      <i class='bx bx-log-out nav_icon logoutContent'></i>
                      <span class="nav_name">
                        Sign Out
                      </span>
                    </button>
                  </form>
                </div>   
              </div>
            
        </nav>
    </div>

        @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">let assetUrl = '{{ URL::asset('storage') }}';</script>
      <script type="text/javascript" src="/app.js"></script>
      <script type="text/javascript" src="/bulletin-firefighter.js"></script>
      <script type="text/javascript" src="/bulletinNews.js"></script>
      <script type="text/javascript" src="/firealertmap-firefighter.js"></script>
      <script type="text/javascript" src="/firehydrantmap-firefighter.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA99w4u68A-ong_I5xg9gs88aYKHntFRQ0&map_ids=c887c451d0ae25a6&callback=initMap" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>       
      <script type="text/javascript" src="/ff-editprofile.js"></script>   

      <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</body>


</html>