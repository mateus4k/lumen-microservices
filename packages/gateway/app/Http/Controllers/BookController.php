<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
    }

    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
