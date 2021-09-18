<?php

namespace App\Simulador;

interface SimuladorInterface {
    /**
     * Se encarga de crear petición al servidor correspondiente
     */
    public function createRequest();
}
