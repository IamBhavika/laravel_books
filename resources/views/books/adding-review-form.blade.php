@include('cdn')

<link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

<div id="addBooks" class="container-fluid">
    <h1> Write your review</h1>
    <form method="post" action="{{ url('/') }}/save-review">
        @csrf
        {{ Form::hidden('bookId', $book->id) }}
{{--        <input type="hidden" value="{{ $book->id }}" name="bookdId">--}}
        <div class="mb-3">
            <label class="form-label">Review</label>
            <textarea cols="120" style="max-width:100%;" placeholder="Write less than 300 words" name="review">{{ old('review') }}</textarea>
            <span style="color: red"> @error('review'){{ $message }}@enderror</span>
        </div>
{{--        <div class="mb-3">--}}
{{--            <label class="form-label">Your Name</label>--}}
{{--            <input type="text" name="name" value="{{ old('name') }}" class="form-control">--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-outline-success book-submit">Add</button>
    </form>
</div>
<div class="backHome">
    <a href="/home">Back to home page</a>
</div>
