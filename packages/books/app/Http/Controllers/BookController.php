<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return $this->successResponse($books);
    }

    public function store(Request $request)
    {
        $rules = [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'price'       => 'required|min:1',
            'author_id'   => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->only(['title', 'description', 'price', 'author_id']));

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);


        return $this->successResponse($book);
    }

    public function update(Request $request, $book)
    {
        $rules = [
            'title'       => 'max:255',
            'description' => 'max:255',
            'price'       => 'min:1',
            'author_id'   => 'min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->only(['title', 'description', 'price', 'author_id']));

        if ($book->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book);
    }

    public function destroy($book)
    {
        $book = Book::findOrFail($book);

        $book->delete();

        return $this->successResponse($book);
    }
}
