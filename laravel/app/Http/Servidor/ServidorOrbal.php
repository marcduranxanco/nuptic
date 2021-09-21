<?php

namespace App\Servidor;

use App\Models\AlienRequests;
use App\Nuptic43\Nuptic43;
use Symfony\Component\HttpFoundation\Response;

class ServidorOrbal extends Servidor
{
    private Response $response;
    private $nuptic43;

    // - Recibe peticiones del simulador y devuelve el identificador del registro que se creará en el historial
    // - En la peticion 60 indica al simulación que ha terminado la simulación y devuelve los resultados
    public function __construct($nuptic43Params)
    {
        $this->nuptic43 = $nuptic43Params;
        $this->response = new Response;

        return $this->response;
    }

    public function run() : Response {
        // Genera el identificador único y lo devuelve en la response
        // Debe guardar en db la response
        // Debe indicar que se ha acabado la simulación????
        try {
            $alienRequest = new AlienRequests([
                'internalId' => uniqid(),
                'requestName' => $this->nuptic43->simulatorName,
                'direction' => (int) $this->nuptic43->direction,
                'route' => $this->nuptic43->route,
                'requestNumber' => $this->nuptic43->idRequest
            ]);
            $alienRequest->save();
            $this->setResponse($this->isSuccess());
        } catch (\Throwable $th) {
            $this->response->setContent(json_encode($th->getMessage()));
            $this->response->setStatusCode(200, "Error inserting data");
        }
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
        $this->nuptic43Params["idRequest"] = $data['id'];
    }

}
