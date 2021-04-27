<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAES TA Home</title>
    <meta name="description" content="aub teaching assistant evaluation system" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<x-nav-bar></x-nav-bar>

<div class="container my-5">
    <h1>Courses</h1>
    <div class="row my-5">
        <ul>
            @foreach($courses as $course)
                <li>
                    <h3><a href="/course/{{ $course->course->id }}">{{ $course->course->name }}</a></h3>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>
