<?php // application/libraries/HttpClient.php

use GuzzleHttp\Client as GuzzleClient;

class HttpClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new GuzzleClient();
    }

    public function get($url)
    {
        $response = $this->client->get($url);
        return $response->getBody()->getContents();
    }

    // You can add more methods here for other types of requests like POST, PUT, DELETE, etc.
}
?>