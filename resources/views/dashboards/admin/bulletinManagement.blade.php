@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Bulletin Management')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>


<style>


</style>



<div class="tab">
  <button class="tablinks" id="announcement_tab" onclick="openCity(event, 'Announcements')">Announcements</button>
  <button class="tablinks" onclick="openCity(event, 'News')">News</button>
</div>

<div id="Announcements" class="tabcontent">
  <div class="addManagerGroup">
    <a class="btn btn-primary addBtn"  id="addAnnouncement">
      <i class='bx bxs-message-square-add' ></i>
      Add New
    </a>

    <button class="btn btn-success managerBtn">
      <i class='bx bxs-bar-chart-alt-2'></i>
      Manager
    </button>
  </div>

  <h3 class="mb-4">Announcements</h3>
  
  @foreach($allAnnouncements as $announcement)

  <div class="announce-container">
    <div class="first-content">
      <input type="hidden" class="bulletin_ID" id="bulletinID" value="{{$announcement->bulletin_id}}"></input>
      <h2><b>{{$announcement->title}}</b></h2>
      <h5>Posted on: {{$announcement->created_at->format('m-d-Y')}}</h5>
      <h5>by: {{$announcement->author_name}}</h5>
      <p>{{$announcement->summary}}</p>
    </div>

    <div class="second-content">
      <div class="btn-group mb-3">
        <a class="editAnnouncement" data-id="{{$announcement->bulletin_id}}">  
          <i class="bx bxs-edit-alt bx-sm" style="color:#6b66f5" title="Edit"></i>
        </a>

        <i class="bx bxs-x-circle bx-sm deleteBtn" style="color:#ff0000" data-toggle="tooltip" title="Delete"></i>
    
      </div>

      <div>
        <img src="{{$announcement->img_url}}" width="200" height="200"  />

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

@include("modals.addAnnouncement")
@include("modals.editAnnouncement")








@endsection