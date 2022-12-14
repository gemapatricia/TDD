<?php

use PHPUnit\Framework\TestCase;

class PartidaTest extends TestCase
{

    public function testPartidaUnaTiradaValor1()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("10 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 1, "No coincide la puntuación de la tirada");
    }

    public function testPartidaUnaTiradaValor6()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("60 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }

    public function testPartidaUnaTiradaValor3()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("30 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
    }

    public function testPartidaUnaJugadaValor6()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("15 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 6, "No coincide la puntuación de la tirada");
    }

    public function testPartidaUnaJugadaValor3()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("21 00 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
    }

    public function testPartidaDosJugadasValor18()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("36 27 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 18, "No coincide la puntuación de la tirada");
    }

    public function testPartidaDosJugadasValor13()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 25 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConMasDeDiezJugadas()
    {
        try {
            $partida = new App\Partida();
            $partida->calcularPuntuacion("06 25 00 00 00 00 00 00 00 00 00");
            $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación de la tirada");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "Hay más de diez jugadas", "No se ha lanzado la excepción correcta");
        }
    }

    public function testPatidaConMenosDeDiezJugadas()
    {
        try {
            $partida = new App\Partida();
            $partida->calcularPuntuacion("06 25 00 00 00 00 00 00");
            $this->assertEquals($partida->getPuntuacion(), 13, "No coincide la puntuación con la tirada");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "Hay menos de diez jugadas", "No se ha lanzado la expceción correcta");
        }
    }

    public function testPartidaConUnStrikeAislado()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X 00 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 16, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUnStrike()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X 52 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 30, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosStrike()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X 52 X 34 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 54, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosStrikesSeguidos()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X 34 52 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 60, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConTresStrikes()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X 34 52 00 X 62 00 00");
        $this->assertEquals($partida->getPuntuacion(), 86, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConTresStrikesSeguidos()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X X 34 52 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 90, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConCuatroStrikes()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X 34 52 00 X X 62 00");
        $this->assertEquals($partida->getPuntuacion(), 112, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConCuatroStrikesSeguidos()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("06 X X X X 52 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 115, "No coincide la puntuación de la tirada");
    }

    public function testPartidaExcedePuntuacionJuegada()
    {
        try {
            $partida = new App\Partida();
            $partida->calcularPuntuacion("76 00 00 00 00 00 00 00 00 00");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "Excede la puntuación de una tirada", "No se lanza la excepción correcta");
        }

    }

    public function testPartidaConSpare()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 7/ 30 00 00 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 16, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosSpares()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 7/ 30 8/ 20 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 30, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConSpareStrike()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 7/ X 8/ 20 00 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 54, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosSpareDosStrike()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("X 7/ X X 8/ 20 00 00 00 00");
        $this->assertEquals($partida->getPuntuacion(), 102, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUltimoNumero()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 54");
        $this->assertEquals($partida->getPuntuacion(), 9, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUltimoStrike()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 X54");
        $this->assertEquals($partida->getPuntuacion(), 19, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConDosUltimoStrikes()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 XX4");
        $this->assertEquals($partida->getPuntuacion(), 24, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUltimoSpare()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 5/4");
        $this->assertEquals($partida->getPuntuacion(), 14, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUltimoStrikeSpare()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 X4/");
        $this->assertEquals($partida->getPuntuacion(), 20, "No coincide la puntuación de la tirada");
    }

    public function testPartidaConUltimoSpareStrike()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 7/X");
        $this->assertEquals($partida->getPuntuacion(), 20, "No coincide la puntuación de la tirada");
    }

    public function testPartidaCompleta()
    {
        $partida = new App\Partida();
        $partida->calcularPuntuacion("72 54 X 81 7/ 61 70 54 90 XX7");
        $this->assertEquals($partida->getPuntuacion(), 121, "No coincide la puntuación de la tirada");
    }

    public function testPartidaExcepcionStrike()
    {
        try {
            $partida = new App\Partida();
            $partida->calcularPuntuacion("00 00 00 X1 00 00 00 00 00 00");
            $this->assertEquals($partida->getPuntuacion(), 10, "No coincide la puntuación de la tirada");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "No puede haber una misma tirada con otro valor");
        }
    }

    public function testPartidaExcepcionStrike2()
    {
        try {
            $partida = new App\Partida();
            $partida->calcularPuntuacion("00 00 00 X/ 00 00 00 00 00 00");
            $this->assertEquals($partida->getPuntuacion(), 10, "No coincide la puntuación de la tirada");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "No puede haber una misma tirada con otro valor");
        }
    }

    public function testExcepcionTresNumerosUltimaTirada()
    {
        try {
            $partida = new App\Partida();
            $partida->calcularPuntuacion("00 00 00 00 00 00 00 00 00 123");
            $this->assertEquals($partida->getPuntuacion(), 3, "No coincide la puntuación de la tirada");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "No puede haber tres tiradas numéricas en la última partida");
        }
    }

}

?>