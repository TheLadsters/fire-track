<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image" href="images/Firetrack.png">  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/sideBarLayout.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.1/css/dataTables.dateTime.min.css">
    <link href="css/adminCSS/fireAlertManagement-admin.css" rel="stylesheet">
    <link href="css/adminCSS/fireAlertMgmtSidebar.css" rel="stylesheet">
    <link href="css/adminCSS/fireHydrantMap-admin.css" rel="stylesheet">
    <link href="css/adminCSS/bulletinManagement-admin.css" rel="stylesheet">

    <title>FireTrack App</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="head_logo"> <img src="images/fire_track_final.png" id="firetrack_logo" alt="fire track logo"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a class="nav_logo"> <i class='bx bx-user nav_logo-icon'></i> <span class="nav_user-name">{{Auth::user()->fname}} {{Auth::user()->lname}}</span> </a>
                <div class="nav_list"> 
                  <a href="{{ route('admin.userManagementUser')}}" class="nav_link {{ (request()->is('admin/userManagementUser*')) ? 'active' : '' }}">
                    <i class='bx bx-user-circle nav_icon'></i> 
                    <span class="nav_name">User 
                      <br>Management
                    </span> 
                  </a> 

                  <a class="nav_link dropdown_links mt-1"> 
                    <i class='bx bx-map-alt nav_icon'></i>
                    <span class="nav_name dropdown-btn-hydrant">Hydrant 
                      <i class="fa fa-caret-down mx-3"></i>
                      <br>Management
                    </span> 
                  </a> 

                  <div class="dropdown-container-firealert mb-3 d-none" id="dropdown-firealert">
                  <a href="{{ route('admin.fireHManagement')}}" class="{{ (request()->is('admin/admin-hydrant-map*')) ? 'active' : '' }}">Hydrant Map</a>
                    <br>
                    <a href="{{ route('admin.fireHTypeManagement')}}" class="{{ (request()->is('admin/fire-hydrant-type-management*')) ? 'active' : '' }}">Add Hydrant Type</a>
                  </div>
                  
                  <a href="{{ route('admin.fireAlertManagement')}}" class="nav_link {{ (request()->is('admin/fireAlertManagement*')) ? 'active' : '' }}">
                    <i class='bx bxs-hot nav_icon'></i> 
                    <span class="nav_name">Fire Alert 
                      <br>Management
                    </span> 
                  </a> 
             
                  <a href="{{ route('admin.bulletinManagement')}}" class="nav_link {{ (request()->is('admin/bulletinManagement*')) ? 'active' : '' }}"> 
                    <i class='bx bx-news nav_icon'></i>
                    <span class="nav_name">Bulletin 
                      <br>Management
                    </span> 
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
    <!--Container Main start-->
        <!-- @yield('userManagementUser')
        @yield('userManagementAdmin')
        @yield('addFireHydrantManagement')
        @yield('fireHydrantManagementType')
        @yield('fireAlertManagement')
        @yield('bulletinManagement') -->
        @yield('content')
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="/app.js"></script>      
      <script type="text/javascript" src="/firealertmngmt-admin.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCTlPLuYKbfZ9k5kbW8unSjRxJ9bsp8zz4&map_ids=8e3fd305cac0bf6&callback=initMap"></script>
      <script type="text/javascript">let assetUrl = '{{ URL::asset('storage') }}';</script>
      <script type="text/javascript" src="/fireHydrantMap.js"></script>
      <script type="text/javascript" src="/fireHydrantType.js"></script>
      <script type="text/javascript" src="/rightSidebar.js"></script>
      <script type="text/javascript" src="/bulletinNews.js"></script>
      <script type="text/javascript" src="/userManagement.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.colVis.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.3.1/js/dataTables.dateTime.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @include('sweetalert::alert')


</body>
</html>