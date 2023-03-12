@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Bulletin Management')

@section('content')

<h1>Welcome to Bulletin Management</h1>

<style>

</style>



<div class="tab">
  <button class="tablinks" id="announcement_tab" onclick="openCity(event, 'Announcements')">Announcements</button>
  <button class="tablinks" onclick="openCity(event, 'News')">News</button>
</div>

<div id="Announcements" class="tabcontent">
  <h3>Announcements</h3>
  <p>Announcements is the capital city of England.</p>
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