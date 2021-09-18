<?php

namespace App\Simulador;

use App\Http\Requests\GuzzleController;
use App\Http\Requests\Nuptic43Request;
use App\Simulador\SimuladorInterface;

class Simulador implements SimuladorInterface
{
    protected array     $params = [];
    protected string    $domain;
    protected string    $url;

    /**
     * El constructor recoge parámetros básicos de un simulador
     * @param string $domain Dominio del servidor (pe. Ejemplo.com)
     * @param string $simulatorName Nombre del simulador (pe. Nuptic43)
     * @param int $idRequest Identificador único la petición
     */
    public function __construct(string $domain, string $simulatorName, int $idRequest)
    {
        $this->domain = $domain;
        $this->params["simulatorName"] = $simulatorName;
        $this->params["idRequest"] = $idRequest;
        $this->url = $this->createUrl();
    }

    /**
     * Simulador, solo crear una request por defecto, si otros simuladores necesitan otro
     * comportamiento, deben sobrecargar este método
     */
    public function simulate(){
        $this->createRequest($this->url);
    }

    /**
     * Se encarga de crear la url a la que se hará la petición
     */
    protected function createUrl() : string
    {
        $params = urlencode(json_encode($this->params));
        return "http://{$this->domain}/servidor?p={$params}";
    }

    /**
     * Debe crear una request y comprobar que los parámetros son válidos
     * @param string $url Genera la url a la que se tiene que hacer la petición
     */
    protected function createRequest(string $url)
    {
        $request = new GuzzleController($url);
        return $request->createRequest();
    }
}
