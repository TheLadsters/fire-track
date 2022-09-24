<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/app.css">
    <title>FireTrack App</title>
</head>

<body id="body-pd">


      <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
          <div class="header-box px-2 pt-4 pb-2 d-flex justify-content-between">
              <h1 class="fs-4"><span class="px-2 me-2"><i class="fas fa-user"></i></span><span style="color:#C0371B;">John Doe</span></h1>
              <button class="btn d-md-none d-block close-btn px-2 py-0"><i class="fas fa-bars"></i></button>
          </div>
          
          <hr class="h-color mx-2">

          <ul class="list-unstyled px-2">
            <li class="active"><a href="/edit-profile" class="text-decoration-none d-block"><i class="fas fa-user-edit"></i>Edit Profile</a></li>
            <li class=""><a href="#" class="text-decoration-none d-block"><i class="fas fa-map-marker-alt"></i>Fire Hydrant Map</a></li>
            <li class=""><a href="#" class="text-decoration-none d-block"><i class="fa-solid fa-fire"></i>Fire Alert Map</a></li>
            <li class=""><a href="#" class="text-decoration-none d-block"><i class="fa-regular fa-file"></i>Generate Report</a></li>
            <li class=""><a href="#" class="text-decoration-none d-block"><i class="fa-regular fa-newspaper"></i>Bulletin</a></li>
            <li class=""><a href="/" class="text-decoration-none d-block"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
          </ul>
        </div>

        <div class="content">

          <nav class="navbar navbar-expand-md navbar-light" style="background-color: #C0371B;">
            <div class="container-fluid">
              <div class="d-flex justify-content-between d-md-none d-block">
                <button class="btn px-2 py-0 open-btn me-2"><i class="fas fa-bars"></i></button>
                  <a class="navbar-brand fs-4" href="#">
                    <img src="images/firetracklogo.png" alt="FireTrack" width="100" height="24" id="firetrack_logo">
                  </a>
              </div>
              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                      <img src="images/firetracklogo.png" alt="FireTrack" width="100" height="24" id="firetrack_logo">
                    </a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>

          <div class="main-content px-3 pt-4">
            @yield('editProfile')
          </div>

      </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript" src="/app.js"></script>
</body>


</html>