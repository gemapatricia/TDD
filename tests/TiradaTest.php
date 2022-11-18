<?php

use PHPUnit\Framework\TestCase;

Class TiradaTest extends TestCase{

    public function testNumeroJugadas(){
        $partida = new App\Tirada(1);

        $this->assertEquals($partida->getPuntuacion(), 10, "No incide la puntuación de la tirada");
    } 

}

?>