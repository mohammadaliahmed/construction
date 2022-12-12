<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amarat Materials</title>
    <link rel="stylesheet" href="{{url('/').'/css/bootstrap.css'}}" >
    <link rel="stylesheet" href="{{url('/').'/css/sidebar.css'}}"/>
    <script type="text/javascript" src="{{url('/').'/js/bootstrap.js'}}"></script>
    <script type="text/javascript" src="{{url('/').'/js/jquery.js'}}"></script>

</head>
<body>
<style>
    body{
        background: #d7d7d7;
    }
</style>

@php
    echo $Header;
    echo $Sidebar;
    echo $Page;
@endphp
</body>


</html>


