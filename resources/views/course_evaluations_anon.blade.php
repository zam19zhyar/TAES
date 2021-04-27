<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAES Course</title>
    <meta name="description" content="aub teaching assistant evaluation system" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<x-nav-bar></x-nav-bar>

<div class="container my-5">
    <h1>{{ $course->name }}</h1>
    <div class="row my-5">
        <ol>
            @foreach($evaluations as $eval)
                <li><a href="/evaluation/{{ $eval->id }}">Evaluation for {{ $eval->assistant->name }}</a></li>
            @endforeach
        </ol>
    </div>
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>
