@include('cdn')
<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@if (session()->has('books'))
     <?php $books = session('books'); ?>
@endif

<div id="search-form">
    <form action="{{ url('/') }}/search-book" method="post">
        @csrf
        <h2> Search Book</h2>
        <div class="row g-3 align-items-center">
            <div class="col-5">
                <label class="col-form-label"> <b> Book title </b> </label>
                <input type="search" class="form-control" name="title" value="{{ session('title') }}">
            </div>
            <div class="col-5">
                <label class="col-form-label"> <b> Author </b></label>
                <input type="search" class="form-control" name="author" value="{{ session('author') }}">
            </div>
        </div>
        <div class="buttons">
            <button type="submit" name="search" value="search" class="btn btn-outline-success"> Search</button>
            <button type="submit" name="reset" value="reset" class="btn btn-outline-warning"> Reset</button>
        </div>
    </form>
</div>

<div id="showBooks">
    <h2 class="text-center">Books</h2>
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Chapters</th>
            @if (url()->current() == 'http://127.0.0.1:8000/add-review')
            <th scope="col">Add Review</th>
            @endif
            @if (url()->current() == 'http://127.0.0.1:8000/all-reviews')
            <th scope="col">See Reviews</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->chapters }}</td>
                @if (url()->current() == 'http://127.0.0.1:8000/add-review')
                    <td> <a href="/reviews/{{ $book->id }}">Add review</a></td>
                @endif
                @if (url()->current() == 'http://127.0.0.1:8000/all-reviews')
                    <td> <a href="/reviews/{{ $book->id }}">See all reviews</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
</div>
<div class="backHome">
    <a href="/home">Back to home page</a>
</div>

<style>
    .w-5 {
        display: none;
    }
</style>

