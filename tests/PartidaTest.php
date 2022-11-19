<?php

use PHPUnit\Framework\TestCase;

Class PartidaTest extends TestCase{
    
    public function testPartidaUnaTirada(){
        $partida = new Partida("1- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida.getPuntuacion(), 1, "No coincide la puntuación de la tirada");
    }   
}

?>