<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @param string $method
     * @param string $requestUrl
     * @param array $formParams
     * @param array $headers
     * @return string
     * @throws GuzzleException
     */
    public function performRequest(string $method, string $requestUrl, array $formParams = [], array $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers'     => $headers
        ]);

        return $response->getBody()->getContents();
    }
}
