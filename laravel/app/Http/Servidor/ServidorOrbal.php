<?php

namespace App\Servidor;

use App\Nuptic43\Nuptic43;
use Symfony\Component\HttpFoundation\Response;

class ServidorOrbal extends Servidor
{
    private Response $response;

    // - Recibe peticiones del simulador y devuelve el identificador del registro que se creará en el historial
    // - En la peticion 60 indica al simulación que ha terminado la simulación y devuelve los resultados
    public function __construct(Nuptic43 $nuptic43)
    {
        if (!$this->randomError())
            $this->run();

        return $this->response;
    }

    public function run() : Response {
        // Genera el identificador único y lo devuelve en la response
        // Debe guardar en db la response
        // Debe indicar que se ha acabado la simulación????
        $data = [];
        $data['id'] = uniqid();
        $data['status'] = 'success';
        $this->response = new Response(json_encode($data), 200);
        return $this->response;
    }

    /**
     * Decide si la petición está en el 10% errónea. Si no es válida setea la response correspondiente
     * @return bool
     */
    private function randomError() : bool
    {
        $return = false;
        $data = [];
        $data['id'] = -1;
        $data['status'] = 'error';
        if(rand(1, 100) <= 10) {
            $this->response = new Response(json_encode($data), 418);
            $return = true;
        }
        return $return;
    }
}
