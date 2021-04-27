<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAES Student Home</title>
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
                <li >
                    <h3>{{ $course->course->name }} by {{ $course->course->professor->name }}</h3>
                    <ul>
                        @foreach($course->course->assistants as $assistant)
                            <li>
                                @if(in_array($assistant->assistant->id, $evaluated))
                                    <a>{{ $assistant->assistant->name }} - Evaluated</a>
                                @else
                                    <a href="/evaluate/{{ $assistant->assistant->id }}?course={{ $course->course->id }}">{{ $assistant->assistant->name }}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>
