<?php

namespace App;

Class Jugada{

    private $numeroTiradas;
    private $puntuacionJugada;

    public function __construct($tirada1, $tirada2=0){
        if ($tirada2 == 0){
            $this->numeroTiradas = 1;
        }
        else{
            $this->numeroTiradas = 2;
        }
        $this->puntuacionJugada = $tirada1 + $tirada2;
    }

    public function getNumeroTiradas(){
        return $this->numeroTiradas;
    }
}

?>