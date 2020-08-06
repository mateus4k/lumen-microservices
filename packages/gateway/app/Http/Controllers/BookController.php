<?php

namespace App\Http\Controllers;

use App\Services\BookService;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }


    public function index()
    {

    }
}
