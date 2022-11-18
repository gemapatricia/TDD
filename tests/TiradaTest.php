<?php

use PHPUnit\Framework\TestCase;

Class TiradaTest extends TestCase{

    public function testNumeroPuntuacionTirada(){
        $tirada = new App\Tirada(1);

        $this->assertEquals($tirada->getPuntuacion(), 1, "No incide la puntuación de la tirada");
    } 

    public function testNumeroPuntuacionTirada2(){
        $tirada = new App\Tirada(7);

        $this->assertEquals($tirada->getPuntuacion(), 7, "No incide la puntuación de la tirada");
    } 

}

?>