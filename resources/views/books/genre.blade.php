@include('cdn')
<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

<h1 class="genre-heading">Choose your type</h1>
<div class="row book-row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <a href="/show-books/Mystery">
            <div class="card card1">
                <div class="card-body">
                    <h5 class="card-title">Mysteries</h5>
                    {{--                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                    {{--                Go somewhere--}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6">
        <a href="/show-books/Romance">
            <div class="card card2">
                <div class="card-body">
                    <h5 class="card-title">Romance</h5>
                    {{--                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                    {{--                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row book-row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <a href="/show-books/Thriller">
            <div class="card card3">
                <div class="card-body">
                    <h5 class="card-title">Thrillers</h5>
                    {{--                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                    {{--                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6">
        <a href="/show-books/Science fiction">
            <div class="card card4">
                <div class="card-body">
                    <h5 class="card-title">Science Fiction</h5>
                    {{--                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                    {{--                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </a>
    </div>
</div>
<div class="backHome">
    <a href="/home">Back to home page</a>
</div>
