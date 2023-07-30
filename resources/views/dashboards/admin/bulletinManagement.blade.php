@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Bulletin Management')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>


<style>


</style>



<div class="tab" style="margin-top: 58px;">
  <button class="tablinks" id="announcement_tab" onclick="openCity(event, 'Announcements')">Announcements</button>
  <button class="tablinks" onclick="openCity(event, 'News')">News</button>
</div>

<div id="Announcements" class="tabcontent">
  <div class="addManagerGroup">
    <a class="btn btn-primary addBtn"  id="addAnnouncement">
      <i class='bx bxs-message-square-add' ></i>
      Add New
    </a>
    <!-- to be fixed -->
    <a class="btn btn-success managerBtn" id="OpenManager">
      <i class='bx bxs-bar-chart-alt-2'></i>
      Manager
    </a>
  </div>

  <h2 class="mb-4" style="margin-top: -5vh;">Announcements</h2>

  @foreach($allAnnouncements as $announcement)

      <!-- <a href="{{$announcement->article_url}}" target="_blank"> -->
      <div class="card announce-container" style="width: 50%;">
            <div class="btn-group mb-3">
              <a class="editAnnouncement" value="{{$announcement->bulletin_id}}" id="{{$announcement->bulletin_id}}">  
              <i class="bx bxs-edit-alt bx-sm" style="color:#6b66f5" title="Edit"></i>
              </a>

              <a class="deleteAnnouncement" value="{{$announcement->bulletin_id}}" id="{{$announcement->bulletin_id}}">
              <i class="bx bxs-x-circle bx-sm deleteBtn" style="color:#ff0000" data-toggle="tooltip" title="Delete"></i>
              </a>
            </div>
          <div class="content-ann">
          <input type="hidden" class="bulletin_ID" id="bulletinID" value="{{$announcement->bulletin_id}}"></input>
           <h4 class="card-title">{{$announcement->title}}</h4>
           

           <p class="card-text">by: {{$announcement->author_name}}</p>
            <img class="card-img-top" src="{{$announcement->img_url}}" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><b>Posted on:</b> {{$announcement->created_at->format('m-d-Y')}}</p>
                <p class="card-text">{{$announcement->summary}}</p>
              </div>
            </div>
      </div>

      
    <!-- </a> -->

  @endforeach
</div>

<div id="News" class="tabcontent">
        <div class="container-news">

            <div class="news-list">
               {{-- <ul class="news-list">
                </ul> --}}
            </div>

        </div>
</div>

@include("modals.bulletinManager")
@include("modals.addAnnouncement")
@include("modals.editAnnouncement")
@include("modals.deleteAnnouncement")








@endsection