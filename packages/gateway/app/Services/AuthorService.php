<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use GuzzleHttp\Exception\GuzzleException;

class AuthorService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
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
     * Obtain one single author from the author service
     * @return string
     * @throws GuzzleException
     */
    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', "/authors/${author}");
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
}
