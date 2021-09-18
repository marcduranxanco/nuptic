<?php
namespace App\Http\Requests;

use App\Http\Controllers\Controller;

class GuzzleController extends Controller
{
    protected string $url;

    function __construct(string $url) {
        $this->url = $url;
    }

    public function createRequest()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        try {
            $request = $client->get($this->url);
            $response = $request->getBody()->getContents();
        } catch (\Throwable $th) {
            $response = $th;
        }
        return $response;
    }
}
