<?php

namespace App\Servidor;

use Facade\FlareClient\Http\Response;

interface ServidorInterface {
    /**
     * Se encarga de escuchar y procesar las peticiones entrantes
     * @return Response
     */
    public function listen()  : Response;
}
