<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

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
    <link href="css/adminCSS/fireAlertManagement-admin.css" rel="stylesheet">
    <link href="css/adminCSS/fireAlertMgmtSidebar.css" rel="stylesheet">
    <link href="css/adminCSS/fireHydrantMap-admin.css" rel="stylesheet">

    <title>FireTrack App</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="head_logo"> <img src="images/fire_track_final.png" id="firetrack_logo" alt="fire track logo"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-user nav_logo-icon'></i> <span class="nav_user-name">John Doe</span> </a>
                <div class="nav_list"> 
                  <a class="nav_link dropdown_links"> 
                    <i class='bx bx-user-circle nav_icon'></i>
                    <span class="nav_name dropdown-btn-user">User Management
                      <i class="fa fa-caret-down mx-1"></i>
                      </span> 
                  </a> 

                  <div class="dropdown-container-user mb-3 d-none" id="dropdown-user">
                    <a href="/user-management-user" class="py-5">User</a>
                    <br>
                    <a href="/user-management-admin">Admin</a>
                  </div>
                  
                  <a class="nav_link dropdown_links mt-1"> 
                    <i class='bx bx-map-alt nav_icon'></i>
                    <span class="nav_name dropdown-btn-hydrant">Hydrant 
                      <i class="fa fa-caret-down mx-3"></i>
                      <br>Management
                    </span> 
                  </a> 

                  <div class="dropdown-container-firealert mb-3 d-none" id="dropdown-firealert">
                    <a href="/admin-hydrant-map">Hydrant Map</a>
                    <br>
                    <a href="/fire-hydrant-type-management">Add Hydrant Type</a>
                  </div>
                  
                  <a href="/fire-alert-management" class="nav_link"> 
                    <i class='bx bxs-hot nav_icon'></i> 
                    <span class="nav_name">Fire Alert 
                      <br>Management
                    </span> 
                  </a> 
                  <a href="/generate-reports" class="nav_link"> 
                    <i class='bx bxs-report'></i>
                    <span class="nav_name">Generate Reports</span> 
                  </a> 
                  
                  <a href="/bulletin-management" class="nav_link"> 
                    <i class='bx bx-news nav_icon'></i>
                    <span class="nav_name">Bulletin 
                      <br>Management
                    </span> 
                  </a> 
                  
                </div>
            </div> <a href="/" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
        @yield('userManagementUser')
        @yield('userManagementAdmin')
        @yield('addFireHydrantManagement')
        @yield('fireHydrantManagementType')
        @yield('fireAlertManagement')
        @yield('generateReport')
        @yield('bulletinManagement')
    <!--Container Main end-->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript" src="/app.js"></script>      
      <script type="text/javascript" src="/firealertmngmt-admin.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA99w4u68A-ong_I5xg9gs88aYKHntFRQ0&map_ids=c887c451d0ae25a6&callback=initMap"></script></body>
      <script type="text/javascript">let assetUrl = '{{ URL::asset('storage') }}';</script>
      <script type="text/javascript" src="/fireHydrantMap.js"></script>
      <script type="text/javascript" src="/fireHydrantType.js"></script>

</body>
</html>