<?php

namespace App; 

Class Tirada{

    private $puntuacion;

    public function __construct(int $puntuacion){
        $this->puntuacion = $puntuacion;
    }

    public function getPuntuacion(){
        return $this->puntuacion;
    }
}

?>