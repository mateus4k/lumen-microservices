<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use GuzzleHttp\Exception\GuzzleException;

class BookService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    /**
     * Obtain the full list of book from the book service
     * @return string
     * @throws GuzzleException
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Create one book using the book service
     * @param $data
     * @return string
     * @throws GuzzleException
     */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Obtain one single book from the book service
     * @param $book
     * @return string
     * @throws GuzzleException
     */
    public function obtainBook($book)
    {
        return $this->performRequest('GET', "/books/${book}");
    }

    /**
     * Update an instance of book using the book service
     * @param $data
     * @param $book
     * @return string
     * @throws GuzzleException
     */
    public function editBook($data, $book)
    {
        return $this->performRequest('PUT', "/books/${book}", $data);
    }

    /**
     * Remove a single book using the book service
     * @param $book
     * @return string
     * @throws GuzzleException
     */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/${book}");
    }
}
