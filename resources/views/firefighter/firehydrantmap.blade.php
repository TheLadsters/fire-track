@extends('firefighter/layoutFirefighter')

@section('fireHydrantMap')
<head>
    <link rel="stylesheet" href="css/firefighterCSS/firehydrantmap-firefighter.css">
</head>
<input type="text" id="searchHydrantMap" placeholder="Enter a Location">
<div id="firehydrantmap"></div>

@endsection