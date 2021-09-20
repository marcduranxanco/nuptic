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
        $this->response = new Response;

        return $this->response;
    }

    public function run() : Response {
        // Genera el identificador único y lo devuelve en la response
        // Debe guardar en db la response
        // Debe indicar que se ha acabado la simulación????
        $this->setResponse($this->isSuccess());
        return $this->response;
    }

    /**
     * Decide si la petición está en el 10% errónea. Si no es válida setea la response correspondiente
     * @return bool
     */
    private function isSuccess() : bool
    {
        $random = rand(1, 100);
        return ($random >= 10);
    }

    private function setResponse(bool $success){
        $data = [];
        $data['id'] = $success ?  uniqid() : -1;
        $data['status'] = $success ?  'success' : 'error';
        $code = 200;
        $this->response->setContent(json_encode($data));
        $this->response->setStatusCode($code, "Random Orbal server error");
    }

}
