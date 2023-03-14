@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Bulletin Management')

@section('content')

<style>

</style>



<div class="tab">
  <button class="tablinks" id="announcement_tab" onclick="openCity(event, 'Announcements')">Announcements</button>
  <button class="tablinks" onclick="openCity(event, 'News')">News</button>
</div>

<div id="Announcements" class="tabcontent">
  <div class="addManagerGroup">
    <button class="btn btn-primary addBtn">
      <i class='bx bxs-message-square-add'></i>      
      Add New
    </button>

    <button class="btn btn-success managerBtn">
      <i class='bx bxs-bar-chart-alt-2'></i>
      Manager
    </button>
  </div>

  <h3 class="mb-4">Announcements</h3>
  
  @foreach($allAnnouncements as $announcement)

  <div class="announce-container">
    <div class="first-content">
      <h2><b>{{$announcement->title}}</b></h2>
      <h5>Posted on: {{$announcement->created_at->format('m-d-Y')}}</h5>
      <h5>by: {{$announcement->author_name}}</h5>
      <p>{{$announcement->summary}}</p>
    </div>

    <div class="second-content">
      <div class="btn-group mb-3">
        <i class="bx bxs-edit-alt bx-sm" style="color:#6b66f5" data-toggle="tooltip" title="Edit"></i>
        <i class="bx bxs-x-circle bx-sm deleteBtn" style="color:#ff0000" data-toggle="tooltip" title="Delete"></i>
      </div>

      <div>
        <img src="{{$announcement->img_url}}" width="200" height="200" />
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










@endsection