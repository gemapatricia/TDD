<?php

namespace App;

Class Jugada{

    private $numeroTiradas;
    private $puntuacionJugada;

    public function __construct($tirada1, $tirada2){
        $this->$numeroTiradas = 2;
        $this->$puntuacionJugada = $tirada1 + $tirada2;
    }

    public function getNumeroTiradas(){
        return $this->numeroTiradas;
    }
}

?>