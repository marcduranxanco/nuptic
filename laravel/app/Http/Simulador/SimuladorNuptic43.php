<?php

namespace App\Simulador;

use App\Http\Requests\Nuptic43Request;
use Exception;

class SimuladorNuptic43 extends Simulador
{
    private array       $directions = array("Norte", "Sur", "Este", "Oeste");
    protected string    $route;

    /**
     * Simulador Nuptic43
     * @param string $domain Dominio del servidor Orbal
     * @param int $idRequest Un identificador secuencial del 1 al 60
     */
    public function __construct(string $domain, int $idRequest)
    {
        $this->params["direction"] = $this->createDirection();
        $this->params["route"] = rand(10, 20);
        parent::__construct($domain, "nuptic-43", $idRequest);
    }

    /**
     * Realiza la petición al servidor y comprueba que ha recibido una respuesta correcta. Si no es correcta, repite la petición
     */
    public function createRequest(){
        $request = new Nuptic43Request($this->url);
        return $request->createRequest();
    }

    private function createDirection() : string
    {
        $randomIndex = array_rand($this->directions, 1);
        return $this->directions[$randomIndex];
    }
}
