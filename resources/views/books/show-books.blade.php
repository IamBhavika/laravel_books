@include('cdn')
<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
<div id="showBooks">
    <h1>{{ $genre }}</h1>
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Chapters</th>
            <th scope="col">Reviews</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->chapters }}</td>
                <td> <a href="/reviews/{{ $book->id }}">Click me</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="backHome">
    <a href="/home">Back to home page</a>
</div>
