@extends('firefighter/layoutFirefighter')

@section('fireHydrantMap')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/firefighterCSS/firehydrantmap-firefighter.css">
</head>
<input id="searchbox" type="text" placeholder="Search Box"/>
<div id="firehydrantmap"></div>

@endsection