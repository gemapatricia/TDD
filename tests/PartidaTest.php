<?php

use PHPUnit\Framework\TestCase;

Class PartidaTest extends TestCase{
    
    public function testPartidaUnaTiradaValor1(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("1- 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 1, "No coincide la puntuación de la tirada");
    }
    
    public function testPartidaUnaTiradaValor6(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("6- 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }  

    public function testPartidaUnaTiradaValor3(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("3- 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
    }
    
    public function testPartidaUnaJugadaValor6(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("15 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }

    public function testPartidaUnaJugadaValor3(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("21 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
    }

    public function testPartidaDosJugadasValor18(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("36 27 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 18, "No coincide la puntuación de la tirada");
    }

    public function testPartidaDosJugadasValor13(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 25 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConMasDeDiezJugadas(){
        try{
            $partida = new App\Partida();
            $partida->calcularPuntuacion("06 25 00 00 00 00 00 00 00 00 00");
            $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación de la tirada");
        }
        catch(Exception $e){
            $this->assertEquals($e->getMessage(), "Hay más de diez jugadas", "No se ha lanzado la excepción correcta");
        }  
    }

    public function testPatidaConMenosDeDiezJugadas(){
        try{
            $partida = new App\Partida();
            $partida->calcularPuntuacion("06 25 00 00 00 00 00 00");
            $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación con la tirada");
        }
        catch(Exception $e){
            $this->assertEquals($e->getMessage(), "Hay menos de diez jugadas", "No se ha lanzado la expceción correcta");
        }
    }

    public function testPartidaConUnStrikeAislado(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 16, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUnStrike(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X 52 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 30, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosStrike(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X 52 X 34 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 54, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosStrikesSeguidos(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X 34 52 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 60, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConTresStrikes(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X 34 52 00 X 62 00 00");
        $this->assertEquals($partida->getPuntuacion(), 86, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConTresStrikesSeguidos(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X X 34 52 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 90, "No coincide la puntuación de la tirada");
    }
    
    public function testPartidaConCuatroStrikes(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X 34 52 00 X X 62 00");
        $this->assertEquals($partida->getPuntuacion(), 112, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConCuatroStrikesSeguidos(){
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X X X 52 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 115, "No coincide la puntuación de la tirada");
    }
}

?>