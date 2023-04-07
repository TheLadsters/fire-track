<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FireTrack App</title>


    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA99w4u68A-ong_I5xg9gs88aYKHntFRQ0&map_ids=c887c451d0ae25a6&callback=initMap"  defer></script>   
    
    <link rel="icon" href="images/Firetrack.png" type="image">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    
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
                 
                        @endguest
      
                            </ul>
                        </div>
                    </div>
                </nav>
            
       <!-- Masthead-->   
       <header class="masthead bg-primary text-white text-center">

       
        </header>
        <!-- Portfolio Section-->


        <div id="Announcements" class="tabcontent">

  <h3 class="mb-4">Announcements</h3>
  
  @foreach($allAnnouncements as $announcement)

  <div class="announce-container">
    <div class="first-content">
      <input type="hidden" class="bulletin_ID" id="bulletinID" value="{{$announcement->bulletin_id}}"></input>
      <h2><b>{{$announcement->title}}</b></h2>
      <h5>Posted on: {{$announcement->created_at->format('m-d-Y')}}</h5>
      <h6>by: {{$announcement->author_name}}</h6>
      <p class="summary-content">{{$announcement->summary}}</p>
    </div>

    <div class="second-content">
      <div class="btn-group mb-3">
        <a class="editAnnouncement" value="{{$announcement->bulletin_id}}" id="{{$announcement->bulletin_id}}">  
          <i class="bx bxs-edit-alt bx-sm" style="color:#6b66f5" title="Edit"></i>
        </a>

        <a class="deleteAnnouncement" value="{{$announcement->bulletin_id}}" id="{{$announcement->bulletin_id}}">
        <i class="bx bxs-x-circle bx-sm deleteBtn" style="color:#ff0000" data-toggle="tooltip" title="Delete"></i>
        </a>
      </div>

      <div class="img_bulletin">
        <img src="{{$announcement->img_url}}" width="200" height="200"  />

      </div>
    </div>
  </div>

  @endforeach
</div>


        <section class="page-section" id="portfolio">
            <div class="container position-relative"> 
                <!-- <h1>Fire Alert Map</h1> -->
                <h1 class="text-center text-uppercase text-black mb-3">Fire Alert Map</h1>
               
                <div id="firealertmap"></div>
                <input id="searchAlertMap" class="position-absolute top-0 start-50 translate-middle-x" type="text" placeholder="Search Box"/>
            
                <!-- Portfolio Section Heading-->
                <!-- <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">FUNCTIONALITY</h2> -->
                <!-- Icon Divider-->
                <!-- <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> -->
                <!-- Portfolio Grid Items-->
                <!-- <div class="row justify-content-center"> -->
                    <!-- Portfolio Item 1-->
                    <!-- <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/user.png" alt="..." />
                        </div>
                    </div> -->
                    <!-- Portfolio Item 2-->
                    <!-- <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/report.png" alt="..." />
                        </div>
                    </div> -->
                    <!-- Portfolio Item 3-->
                    <!-- <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/hydrant.png" alt="..." />
                        </div>
                    </div> -->
                    <!-- Portfolio Item 4-->
                    <!-- <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/fire.png" alt="..." />
                        </div>
                    </div> -->

                    <!-- Portfolio Item 5-->
                    <!-- <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/bulletin3.png" alt="..." />
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">ABOUT US</h2>
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
       
        <!-- Footer-->
        <!-- <footer class="footer text-center">
            <div class="container">
                <div class="row"> -->
                    <!-- Footer Location-->
                    <!-- <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            2215 John Daniel Drive
                            <br />
                            Clark, MO 65243
                        </p>
                    </div> -->
                       <!-- Footer Additional-->
                       <!-- <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">LOREM IPSUM</h4>
                        <p class="lead mb-0">
                            2215 23123123123
                            <br />
                           123213123123
                        </p>
                    </div>
                  
                    
                </div>
            </div>
        </footer> -->
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2022</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <!-- <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center"> -->
                                <!-- <div class="col-lg-8"> -->
                                    <!-- Portfolio Modal - Title-->
                                    <!-- <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">USER</h2> -->
                                    <!-- Icon Divider-->
                                    <!-- <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div> -->
                                    <!-- Portfolio Modal - Image-->
                                    <!-- <img class="img-fluid rounded mb-5" src="images/user.png" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <!-- <p class="mb-4">It contains the list of Registered ADMIN and Firefighter it also contains all the personal information of the user.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Portfolio Modal 2-->
        <!-- <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8"> -->
                                    <!-- Portfolio Modal - Title-->
                                    <!-- <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">GENERATE REPORT</h2> -->
                                    <!-- Icon Divider-->
                                    <!-- <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div> -->
                                    <!-- Portfolio Modal - Image-->
                                    <!-- <img class="img-fluid rounded mb-5" src="images/report.png" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <!-- <p class="mb-4">Provide insight that would be beneficial for the fire department of Cebu City upon clicking the drop-down menu in the system it will generate the fire fighter desired report.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Portfolio Modal 3-->
        <!-- <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8"> -->
                                    <!-- Portfolio Modal - Title-->
                                    <!-- <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Fire Hydrant Management</h2> -->
                                    <!-- Icon Divider-->
                                    <!-- <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div> -->
                                    <!-- Portfolio Modal - Image-->
                                    <!-- <img class="img-fluid rounded mb-5" src="images/hydrant.png" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <!-- <p class="mb-4">Manage details are  provided for the location using google map API to pinpoint the  location of the hydrant.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Portfolio Modal 4-->
        <!-- <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8"> -->
                                    <!-- Portfolio Modal - Title-->
                                    <!-- <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">FIRE ALERT MANAGEMENT</h2> -->
                                    <!-- Icon Divider-->
                                    <!-- <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div> -->
                                    <!-- Portfolio Modal - Image-->
                                    <!-- <img class="img-fluid rounded mb-5" src="images/fire.png" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <!-- <p class="mb-4">Fire Alert Management pertains to the location of fire incidents in Cebu City. it also contains CRUD functionality, create, read, update delete.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Portfolio Modal 5-->
        <!-- <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8"> -->
                                    <!-- Portfolio Modal - Title-->
                                    <!-- <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Bulletin Management Report</h2> -->
                                    <!-- Icon Divider-->
                                    <!-- <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div> -->

                                    <!-- Portfolio Modal - Image-->
                                    <!-- <img class="img-fluid rounded mb-5" src="images/bulletin3.png" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <!-- <p class="mb-4">Provide updates or announcements for the fighters about what event is going to happen and at the same time it provides news to become aware of what is happening within the City.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Portfolio Modal 6-->
        <!-- <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script type="text/javascript" src="/landing.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script type="text/javascript" src="/firealertmap-landing.js"></script>
        <script type="text/javascript" src="/firealertmap-marker-landing.js"></script>
        <script type="text/javascript" src="/bulletin-firefighter.js"></script>
        <script type="text/javascript" src="/bulletinNews.js"></script>
        <!-- <script type="text/javascript" src="/firealertmap-firefighter.js"></script> -->
    
</body>
</html>