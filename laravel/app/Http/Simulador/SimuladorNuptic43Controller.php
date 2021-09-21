<?php

namespace App\Simulador;

use App\Jobs\SimuladorNuptic43Job;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

define("INTERVAL", 1 );     // Intervalo segundos ejecución
define("MAXREQUESTS", 5 );  // Intervalo segundos que se ejecuta el proceso

class SimuladorNuptic43Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function run()
    {
        try {
            $job = new SimuladorNuptic43Job();
            $response = $this->dispatch($job);
        } catch (\Throwable $th) {
            //throw $th;
            $response = $th->getMessage();
        }

        return $response;
    }
}
