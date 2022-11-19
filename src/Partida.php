<?php 

namespace App;

Class Partida{

    private $puntuacion;
   
    public function getPuntuacion() {
        return $this->puntuacion;
    }

    public function calcularPuntuacion(string $puntuaciones) {
        $puntuacionFinal = 0;
        $separador = " ";
        
        $puntuacionesJuego = explode($separador, $puntuaciones);
        $puntuacionTirada = str_split($puntuacionesJuego[0]);
        
        for ($i=0; $i<2; $i++){
            if (is_numeric($puntuacionTirada[$i])) $puntuacionFinal += $puntuacionTirada[$i];
        }

        return $this->puntuacion = $puntuacionFinal;
    }

}