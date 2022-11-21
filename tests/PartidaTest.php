<?php

use PHPUnit\Framework\TestCase;

Class PartidaTest extends TestCase{
    
    public function testPartidaUnaTiradaValor1(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("1- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 1, "No coincide la puntuación de la tirada");
    }
    
    public function testPartidaUnaTiradaValor6(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("6- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }  

    public function testPartidaUnaTiradaValor3(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("3- -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
    }
    
    public function testPartidaUnaJugadaValor6(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("15 -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }

    public function testPartidaUnaJugadaValor3(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("21 -- -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
    }

    public function testPartidaDosJugadasValor18(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("36 27 -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 18, "No coincide la puntuación de la tirada");
    }

    public function testPartidaDosJugadasValor13(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 25 -- -- -- -- -- -- -- --");
        $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConMasDeDiezJugadas(){
        try{
            $partida = new App\Partida();
            $partida->calcularPuntuacion("06 25 -- -- -- -- -- -- -- -- --");
            $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación de la tirada");
        }
        catch(Exception $e){
            $this->assertEquals($e->getMessage(), "Hay más de diez jugadas", "No se ha lanzado la excepción correcta");
        }  
    }

    public function testPatidaConMenosDeDiezJugadas(){
        try{
            $partida = new App\Partida();
            $partida->calcularPuntuacion("06 25 -- -- -- -- -- --");
            $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación con la tirada");
        }
        catch(Exception $e){
            $this->assertEquals($e->getMessage(), "Hay menos de diez jugadas", "No se ha lanzado la expceción correcta");
        }
        
    }
}

?>