<?php
namespace App\Http\Requests;

class Nuptic43Request extends GuzzleController
{
    function __construct(string $url) {
        parent::__construct($url);
    }

    function createRequest(){
        $client = new \GuzzleHttp\Client(['verify' => false]);
        try {
            $response = $client->get($this->url);
        } catch (\Throwable $th) {
            $response = $th;
        }
        return $response;
    }
}
