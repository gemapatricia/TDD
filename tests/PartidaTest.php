<?php

use PHPUnit\Framework\TestCase;

Class PartidaTest extends TestCase{

    public function testNumeroJugadas(){
        $partida = new App\Partida();

        $this->assertEquals($partida->getNumeroJugadas(), 10, "No incide el número de jugadas");
    } 

}

?>