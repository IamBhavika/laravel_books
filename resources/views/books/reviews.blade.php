@include('cdn')

<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@foreach ($bookUser as $books)
<div id="review" class="card text-center">
    <div class="card-body">
        <h5 class="card-title">{{ $books->review }}</h5>
        {{--        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
        {{--        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
    </div>
    <div class="card-footer text-body-secondary">
        by:- {{ $books->user->name }}
    </div>
</div>
@endforeach
<div class="add-review text-center">
    @if (url()->previous() == 'http://127.0.0.1:8000/add-review')
        <a href="/adding-review/{{ $id }}" class="btn btn-success">+</a>
    @endif
</div>
<div class="backHome">
    <a href="/home">Back to home page</a>
</div>
