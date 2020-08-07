<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use GuzzleHttp\Exception\GuzzleException;

class AuthorService
{
    use ConsumesExternalService;

    private $baseUri;
    private $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret  = config('services.authors.secret');
    }

    /**
     * Obtain the full list of author from the author service
     * @return string
     * @throws GuzzleException
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    /**
     * Create one author using the author service
     * @param $data
     * @return string
     * @throws GuzzleException
     */
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Obtain one single author from the author service
     * @param $author
     * @return string
     * @throws GuzzleException
     */
    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/${author}");
    }

    /**
     * Update an instance of author using the author service
     * @param $data
     * @param $author
     * @return string
     * @throws GuzzleException
     */
    public function editAuthor($data, $author)
    {
        return $this->performRequest('PUT', "/authors/${author}", $data);
    }

    /**
     * Remove a single author using the author service
     * @param $author
     * @return string
     * @throws GuzzleException
     */
    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/${author}");
    }
}
