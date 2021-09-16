<?php

namespace App\Simulador;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SimuladorNuptic43Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function run()
    {
        $simulador = new SimuladorNuptic43("localhost");
        return $simulador->simulate();
    }
}
