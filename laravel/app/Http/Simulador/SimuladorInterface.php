<?php

namespace App\Simulador;

interface SimuladorInterface {
    /**
     * Se encarga de crear la simulación de 60 peticiones
     */
    public function simulate();
}
