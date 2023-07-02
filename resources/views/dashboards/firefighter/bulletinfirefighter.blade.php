@extends('dashboards.firefighter.layouts.layoutFirefighter')
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
    

  </div>

  <h3 class="mb-4">Announcements</h3>
  
  @foreach($allAnnouncements as $announcement)

  <div class="card announce-container" style="width: 50%;">
          <div class="content-ann">
          <input type="hidden" class="bulletin_ID" id="bulletinID" value="{{$announcement->bulletin_id}}"></input>
           <h4 class="card-title">{{$announcement->title}}</h4>
           

           <p class="card-text">by: {{$announcement->author_name}}</p>
            <img class="card-img-top" src="{{$announcement->img_url}}" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Posted on: {{$announcement->created_at->format('m-d-Y')}}</p>
                <p class="card-text">{{$announcement->summary}}</p>
              </div>
            </div>
      </div>

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

@include("modals.addAnnouncementFirefighter")
@include("modals.bulletinManager")
@include("modals.addAnnouncement")
@include("modals.editAnnouncement")
@include("modals.deleteAnnouncement")





@endsection