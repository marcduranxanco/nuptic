<?php

namespace App\Nuptic43;

class Nuptic43
{
    private string  $name;
    private int     $id;
    private int     $direction;
    private string  $route;

    public function __construct(int $id, int $direction, string $route)
    {
        $this->id = $id;
        $this->direction = $direction;
        $this->route = $route;
        $this->name = "nuptic-43";
        $this->param_validator();

        return $this;
    }

    private function param_validator(){
        return true;
    }

}
