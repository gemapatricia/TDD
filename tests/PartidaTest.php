<?php

use PHPUnit\Framework\TestCase;

Class PartidaTest extends TestCase{
    
    public function testPartidaUnaTirada(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("1- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 1, "No coincide la puntuación de la tirada");
    }
    
    public function testPartidaUnaTirada2(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("6- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }  
}

?>