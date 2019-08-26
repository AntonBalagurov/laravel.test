<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function index()
    {

        $books = Book::orderBy('updated_at', 'desc')->paginate(10);

        return view('book.index', ['books' => $books]);

    }

    public function create()
    {


        $authors = Author::all();

        return view('book.create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $rules = [
            'author' => 'required|integer|min:1',
            'name' => 'required|string|min:3|max:100',
            'count_pages' => 'required|integer|min:1',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = new Book();

        $book->author_id = $request->author;
        $book->name = $request->name;
        $book->count_pages = $request->count_pages;
        $book->description = $request->description;

        $book->image = $request->image->store('book','public');

        $book->save();

        return redirect(route('book-index'));
    }

}
