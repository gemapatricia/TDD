<?php

use PHPUnit\Framework\TestCase;

Class JugadaTest extends TestCase{

    public function testNumeroJugadas(){
        $partida = new App\Jugada();

        $this->assertEquals($partida->getNumeroTiradas(), 3, "No incide el número de tiradas en una jugada");
    } 

}

?>