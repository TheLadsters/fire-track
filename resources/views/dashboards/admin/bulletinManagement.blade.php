@extends('dashboards.admin.layouts.layoutAdmin')
@section('title','Bulletin Management')

@section('content')

<h1>Welcome to Bulletin Management</h1>

<div class="container-news">
    <form class="search" action="">
        <div>
            <label for="News">News</label>
        </div>

        <div>
            <input type="text" class="input-news" /> 
        </div>

        <div>
            <input type="submit" />
        </div>
    </form>

    <div class="container">
        <ul class="news-list">
        </ul>
    </div>

</div>

@endsection