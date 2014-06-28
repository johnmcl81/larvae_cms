<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
</head>
<body>
<div id="layout">
    <header>
        <h1><a href="{{ URL::route('home') }}">My Blog</a></h1>

        @include('site::_partials.navigation')
    </header>

    <hr>