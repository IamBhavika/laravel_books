<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\Reader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BooksController extends Controller
{
    public function addBook()
    {
        return view('books.add-books');
    }

    public function saveBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'review' => 'required',
        ]);

        $title = $request->input('title');
        $author = $request->input('author');
        $genre = $request->input('genre');
        $chapters = $request->input('chapters');
        $review = $request->input('review');

        $alreadyExist = Book::where('title', $title)
            ->where('author', $author)
            ->first();

        if ($alreadyExist instanceof Book) {
            session()->flash('book exist', 'This novel is already added in our list, you can add your review');

            return redirect('/home');
        }

        $book = new Book;
        $book->title = $title;
        $book->author = $author;
        $book->genre = $genre;
        $book->chapters = $chapters;
        $book->save();

        $bookUser = new BookUser;
        $bookUser->book_id = $book->id;
        $bookUser->user_id = Auth::id();
        $bookUser->review = $review;
        $bookUser->save();

        session()->flash('book saved', 'Book has saved in our list');

        return redirect()->back();
    }

    public function genre()
    {
        return view('books.genre');
    }

    public function showBooks($genre)
    {
        $books = Book::where('genre', $genre)->get();

        return view('books.show-books', compact('books', 'genre'));
    }

    public function showReviews($id)
    {
//        $user = [];
        $bookUser = BookUser::where('book_id', $id)->get();
//        foreach ($bookUser as $book) {
//            $userId = $book->id;
//            $user = User::find($userId);
//        }
//        $userId = $bookUser->user_id;
//        $user = User::find($userId);

        return view('books.reviews', compact('bookUser', 'id'));
    }

    public function addReview()
    {
        $books = Book::paginate(3);

        return view('books.add-review', compact('books'));
    }

    public function addingReview($id)
    {
        $book = Book::find($id);
//        dd($book->id);

        return view('books.adding-review-form', compact('book'));
    }

    public function saveReview(Request $request)
    {
        $bookId = $request->input('bookId');
//        dd($bookId);

        $request->validate([
            'review' => 'required',
        ]);

        $bookUser = new BookUser;
        $bookUser->book_id = $bookId;
        $bookUser->user_id = Auth::id();
        $bookUser->review = $request->input('review');
        $bookUser->save();

        session()->flash('review success', 'Your review is added for the book');

        return redirect("/home");
    }

    public function seeAllReviews()
    {
        $books = Book::paginate(3);

        return view('books.add-review', compact('books'));
    }

    public function searchBook(Request $request)
    {
        if ($request->input('reset')) {
            $request->except('title');
            $request->except('author');

            return redirect()->back();
        }
        $books = '';
        $title = $request->input('title');
        $author = $request->input('author');

        if (!empty($title)) {
            $books = Book::where('title','LIKE', '%' . $title . '%')->paginate(3);

            if (!empty($author)) {
                $books = Book::where('title','LIKE', '%' . $title . '%')
                    ->where('author','LIKE', '%' . $author . '%')
                    ->paginate(3);
            }
        } else {
            $books = Book::where('author','LIKE', '%' . $author . '%')->paginate(3);
        }

//        session()->put('books', $books);

        if (url()->previous() == 'http://127.0.0.1:8000/add-review') {
            return redirect('add-review')->with(['books' => $books, 'title' => $title, 'author' => $author]);
        }

        return redirect('all-reviews')->with(['books' => $books, 'title' => $title, 'author' => $author]);
    }
}
