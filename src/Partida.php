<?php 

namespace App;

Class Partida{

    private $puntuacion;
   
    public function getPuntuacion() {
        return $this->puntuacion;
    }

    public function calcularPuntuacion(string $puntuaciones) {
        $separador = " ";
        $puntuacionesJuego = explode($separador, $puntuaciones);
        $puntuacionTirada = str_split($puntuacionesJuego[0]);
        
        return $this->puntuacion = $puntuacionTirada[0];
    }

}