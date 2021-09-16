<?php

namespace App\Simulador;

use App\Http\Requests\GuzzleController;
use App\Http\Requests\Nuptic43Request;
use App\Simulador\SimuladorInterface;

class Simulador implements SimuladorInterface
{
    protected string    $domain;
    protected string    $simulatorName;
    protected int       $idRequest;
    protected string    $direction;
    protected string    $route;
    protected string    $url;

    public function __construct(string $domain, string $simulatorName, int $idRequest, string $direction, string $route)
    {
        $this->domain = $domain;
        $this->simulatorName = $simulatorName;
        $this->idRequest = $idRequest;
        $this->direction = $direction;
        $this->route = $route;
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
        return "http://{$this->domain}/servidor?simulatorName={$this->simulatorName}&idRequest={$this->idRequest}&direction={$this->direction}&route={$this->route}";
    }

    /**
     * Debe crear una request y comprobar que los parámetros son válidos
     */
    protected function createRequest(string $url)
    {
        $request = new GuzzleController($url);
        return $request->createRequest();
    }
}
