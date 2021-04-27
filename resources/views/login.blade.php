<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAES Login</title>
    <meta name="description" content="aub teaching assistant evaluation system" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<x-nav-bar></x-nav-bar>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center main-header">Login to TA Evaluation System</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="{{ route('login.student') }}" method="post">
                @csrf
                <button class="btn btn-primary btn-lg btn-block mt-2">Student sign in</button>
            </form>
            <form action="{{ route('login.ta') }}" method="post">
                @csrf
                <button class="btn btn-success btn-lg btn-block mt-2">TA sign in</button>
            </form>
            <form action="{{ route('login.professor') }}" method="post">
                @csrf
                <button class="btn btn-danger btn-lg btn-block mt-2">Professor sign in</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>
