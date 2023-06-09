@include('cdn')

<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

@if (session()->has('book saved'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 20%; margin-left: auto; margin-right: auto">
        {{ session('book saved') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div id="addBooks" class="container-fluid">
    <h1> Enter Books detail</h1>
    <form method="post" action="{{ url('/') }}/save-book">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" aria-describedby="emailHelp">
            <span style="color: red"> @error('title'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" value="{{ old('author') }}" class="form-control">
            <span style="color: red"> @error('author'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select class="form-select" aria-label="Default select example" name="genre">
                <option {{ old('genre') == '' ? 'selected' : ''}} value="">Select Genre</option>
                <option {{ old('genre') == 'Mystery' ? 'selected' : ''}} value="Mystery">Mystery</option>
                <option {{ old('genre') == 'Romance' ? 'selected' : ''}} value="Romance">Romance</option>
                <option {{ old('genre') == 'Thriller' ? 'selected' : ''}} value="Thriller">Thriller</option>
                <option {{ old('genre') == 'Science fiction' ? 'selected' : ''}} value="Science fiction">Science fiction</option>
            </select>
            <span style="color: red"> @error('genre'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Number of Chapters</label>
            <input type="number" name="chapters" value="{{ old('chapters') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Review</label>
            <textarea cols="120" style="max-width:100%;" placeholder="Write less than 300 words" name="review">{{ old('review') }}</textarea>
            <span style="color: red"> @error('review'){{ $message }}@enderror</span>
        </div>
        <button type="submit" class="btn btn-outline-success book-submit">Add</button>
    </form>
</div>
<div class="backHome">
    <a href="/home">Back to home page</a>
</div>
