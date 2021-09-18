<?php

namespace App\Simulador;

use App\Http\Requests\Nuptic43Request;
use Exception;

define("INTERVAL", 1 ); // Intervalo segundos ejecución
define("MAXREQUESTS", 5 ); // Intervalo segundos que se ejecuta el proceso

class SimuladorNuptic43 extends Simulador
{
    private array       $directions = array("Norte", "Sur", "Este", "Oeste");
    protected string    $route;

    /**
     * Simulador Nuptic43
     * @param string $domain Dominio del servidor Orbal
     * @param int $idRequest Identificador de la request
     */
    public function __construct(string $domain, int $idRequest)
    {
        $this->params["direction"] = $this->createDirection();
        $this->params["route"] = rand(10, 20);
        parent::__construct($domain, "nuptic-43", $idRequest);
    }

    /**
     * Crea las request que se indican en la constante MAXREQUESTS
     */
    public function simulate() {
        $counter = 1;
        $active = true;
        $requests = [];

        while($active) {
            sleep(INTERVAL);
            $this->idRequest = $counter;
            $this->createUrl();
            try {
                $request = $this->createRequest($this->url);
            } catch (\Throwable $th) {
                $request = $th;
            }
            array_push($requests, $request);
            $counter++;
            $active = ($counter <= MAXREQUESTS);
        }

        return $request;
    }

    private function createDirection() : string
    {
        $randomIndex = array_rand($this->directions, 1);
        return $this->directions[$randomIndex];
    }

    protected function createRequest($url){
        if(rand(0, 100) > 90){
            $request = new Nuptic43Request($url);
            return $request->createRequest();
        }
        else{
            throw new Exception("Error Processing the Nuptic43Request.", 1);
        }
    }
}
