<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
       
::-webkit-scrollbar {
  width: 12px;
}


::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 

::-webkit-scrollbar-thumb {
  background:#6c63ff; 
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background:#2e2b6f; 
}

        </style>

    <title>FireTrack App</title>


    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCTlPLuYKbfZ9k5kbW8unSjRxJ9bsp8zz4&map_ids=8e3fd305cac0bf6&callback=initMap"  defer></script>   
    
    <link rel="icon" href="images/Firetrack.png" type="image">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    
    <script type="text/javascript" src="/bulletin-firefighter.js"></script>
 
    <link rel="stylesheet" href="css/firefighterCSS/firealertmap-firefighter.css">
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="css/publicCSS/landing.css" rel="stylesheet" />
</head>
<body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
                    <div class="container">
                        <img src="images/fire_track_logo_clear.png" alt="firetracklogo" class="fireTrackLogo"/>
                        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                  <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            @else
                            <!-- New options for authenticated users -->
                            <li class="nav-item">
                                <a class="nav-link"> Hello, {{Auth::user()->fname}} {{Auth::user()->lname}}! </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.userManagementUser')}}">Dashboard</a>
                            </li>
                 
                        @endguest
      
                            </ul>
                        </div>
                    </div>
                </nav>
            
       <!-- Masthead-->   
       <header class="masthead bg-primary text-white text-center">
        <div class="container position-relative"> 
            <!-- <h1>Fire Alert Map</h1> -->
            <h1 class="text-center text-uppercase text-white mb-3">Fire Alert Map</h1>
           
            <div id="firealertmap"></div>
            <input id="searchAlertMap" class="position-absolute top-0 start-50 translate-middle-x" type="text" placeholder="Search Box"/>
        </div>
        </header>
        <!-- Portfolio Section-->

        
<div class="tab" style="margin-top: 58px;">
  <button class="tablinks" onclick="openCity(event, 'Announcements')"  style="visibility: hidden">Announcements</button>
  <button class="tablinks" id="announcement_tab" onclick="openCity(event, 'News')" style="visibility: hidden">News</button>
</div>

<h1 class="text-center text-uppercase text-black mb-3">News</h1>

<div id="News" class="tabcontent">
        <div class="container-news">

            <div class="news-list">
 
            </div>

        </div>
</div>


        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading aboutUs text-center text-uppercase text-white">ABOUT US</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead"> Fire Hydrant and Alarm Tracking Web Application With Mobile Optimization For Firefighters In Cebu City </p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Improve The Safety and Effectiveness of Firefighting Operations by Poviding Real-Time Information and Resources to Firefighters on the ground.</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                 
                       
                      
                    
                </div>
            </div>
        </section>
       
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; FireTrack Team 2023</small></div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script type="text/javascript" src="/landing.js"></script>

                 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script type="text/javascript" src="/firealertmap-landing.js"></script>
        <script type="text/javascript" src="/firealertmap-marker-landing.js"></script>
        <!-- <script type="text/javascript" src="/bulletinNews.js"></script> -->
        <!-- <script type="text/javascript" src="/firealertmap-firefighter.js"></script> -->
    
</body>
</html>