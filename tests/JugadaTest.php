<?php

use PHPUnit\Framework\TestCase;

Class JugadaTest extends TestCase{

    public function testNumeroJugadas(){
        $partida = new App\Jugada(4,5);

        $this->assertEquals($partida->getNumeroTiradas(), 2, "No incide el número de tiradas en una jugada");
    } 

}

?>