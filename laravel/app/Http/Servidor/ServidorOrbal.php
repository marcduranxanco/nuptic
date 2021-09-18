<?php

namespace App\Servidor;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ServidorOrbal extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function run()
    {
        return "test";
        // $simulador = new ServidorNuptic43();
        // return $simulador->simulate();
    }
}
