<?php

namespace App\Servidor;

use App\Servidor\ServidorInterface;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class Servidor implements ServidorInterface
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function listen() : Response
    {
        return new Response("", "", 501);
    }
}
