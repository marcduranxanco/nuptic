<?php

namespace App\Simulador;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

define("INTERVAL", 1 ); // Intervalo segundos ejecución
define("MAXREQUESTS", 5 ); // Intervalo segundos que se ejecuta el proceso

class SimuladorNuptic43Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function run()
    {
        //Crear el identificador único
        // Tiene que llamar al comando que se encarga de hacer las 60 peticiones
        // Comand::NombreComando(MAXREQUESTS (cuantas se hacen), INTAVL (cada cuanto tiempo))

        $simulador = new SimuladorNuptic43("nginx", 123445);
        return $simulador->createRequest();
    }
}
