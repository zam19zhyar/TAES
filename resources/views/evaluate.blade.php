<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAES Evaluate</title>
    <meta name="description" content="aub teaching assistant evaluation system" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<x-nav-bar></x-nav-bar>

<div class="container my-5">
    <h1>Evaluate {{ $teaching_assistant->name }}</h1>
    <div class="row my-5">
        <form action="{{ route('evaluate.create') }}" method="post">
            @csrf
            <input name="course" style="display: none;" value="{{ $course }}">
            <input name="teaching_assistant" style="display: none;" class="hidden" value="{{ $teaching_assistant->id }}">
            <ol>
                @foreach($questions as $question)
                    <li>{{ $question->question_text }}</li>
                    <input type="radio" name="question{{ $question->id }}" value="100" required>
                    <label>Strongly Agree</label><br>
                    <input type="radio" name="question{{ $question->id }}" value="75">
                    <label>Agree</label><br>
                    <input type="radio" name="question{{ $question->id }}" value="50">
                    <label>Neutral</label><br>
                    <input type="radio" name="question{{ $question->id }}" value="25">
                    <label>Disagree</label><br>
                    <input type="radio" name="question{{ $question->id }}" value="0">
                    <label>Strongly Disagree</label><br>
                    <hr>
                @endforeach
            </ol>
            <div class="ml-5">
                <label for="comments">Comments</label><br>
                <textarea cols="50" rows="7" id="comments" name="comments"></textarea>
                <hr>
                <button class="btn btn-block btn-primary mt-5" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>
