<?php
namespace App\Http\Requests;

class Nuptic43Request extends GuzzleController
{
    function __construct(string $url) {
        parent::__construct($url);
    }

    function createRequest(){
        parent::createRequest();
    }
}
