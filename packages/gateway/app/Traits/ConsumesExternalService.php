<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @param $method
     * @param $requestUrl
     * @param $formParams
     * @param $headers
     * @return string
     * @throws GuzzleException
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers'     => $headers
        ]);

        return $response->getBody()->getContents();
    }
}
