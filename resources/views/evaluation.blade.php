<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAES Evaluation</title>
    <meta name="description" content="aub teaching assistant evaluation system" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<x-nav-bar></x-nav-bar>

<div class="container my-5">
    <h1>Evaluation for {{ $evaluation->assistant->name }} {{ auth()->user()->type == 'professor' ?  "by {$evaluation->student->name}" : "" }}</h1>
    <div class="row my-5">
        <ol>
            @foreach($answers as $answer)
                <li>{{ $answer->questionText }} - <strong>{{ $answer->answer_text }}</strong></li>
            @endforeach
        </ol>
    </div>
    @if(auth()->user()->type == 'professor')
        @if($evaluation->comments != null && $evaluation->comment_approved == false)
            <h4>Comments</h4>
            <p>{{ $evaluation->comments }}</p>
            <form action="/evaluation/approve/{{ $evaluation->id }}" method="post">
                @csrf
                <input style="display: none;" name="evaluation" value="{{ $evaluation->id }}">
                <button class="btn btn-danger">Approve Comments</button>
            </form>
        @endif
    @endif

    @if(auth()->user()->type == 'teaching_assistant')
        @if($evaluation->comments != null && $evaluation->comment_approved == true)
            <h4>Comments</h4>
            <p>{{ $evaluation->comments }}</p>
        @endif
    @endif
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>
