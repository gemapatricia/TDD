<?php

use PHPUnit\Framework\TestCase;

Class PartidaTest extends TestCase{
    
    public function testPartidaUnaTirada(){
        $partida = new App\Partida("1- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 2, "No coincide la puntuación de la tirada");
    }   
}

?>