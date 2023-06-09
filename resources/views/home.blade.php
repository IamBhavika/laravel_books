<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
    @if (session()->has('book exist'))
        <div class="alert alert-info alert-dismissible fade show" role="alert" style="width: 20%; margin-left: auto; margin-right: auto">
            {{ session('book exist') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('review success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 20%; margin-left: auto; margin-right: auto">
            {{ session('review success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <body id="body">
        <div class="container-fluid">
            <div id="home">
                <div id="add">
                    <p>
                        Have you ever read an amazing<br> novel and wanted to share with other people?
                    </p>
                    <a href="/add-book" class="btn btn-lg btn-warning" data-bs-target="#staticBackdrop"> Add Your favorite</a>
                </div>
                <div class="or">
                    or
                </div>
                <div id="read">
                    <p> Want to know amazing books <br>name for your next binge reading? </p>
                    <a href="/genre" class="btn btn-lg btn-success"> Read the best ones</a>
                </div>
            </div>
        </div>
        <div class="reviews">
            <a href="/add-review" class="btn btn-success"> Add your review </a>
            <a href="/all-reviews" class="btn btn-primary"> See all reviews </a>
        </div>
    </body>
@endsection
