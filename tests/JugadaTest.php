<?php

use PHPUnit\Framework\TestCase;

Class JugadaTest extends TestCase{

    public function testNumeroTiradasEnUnaJugadaNormal(){
        $jugada= new App\Jugada(4,5);
        $this->assertEquals($jugada->getNumeroTiradas(), 2, "No incide el número de tiradas en una jugada");
    } 

    public function testNumeroTiradasEnUnaJugadaStrike(){
        $jugada= new App\Jugada(10);
        $this->assertEquals($jugada->getNumeroTiradas(), 1, "No incide el número de tiradas en una jugada");
    }
    
    public function testPuntuacionTiradaNormal(){
        $jugada = new \App\Jugada(4,5);
        $this->assertEquals($jugada->getPuntuacionJugada(), 9, "No incide la puntuación de la jugada");
    }


}

?>