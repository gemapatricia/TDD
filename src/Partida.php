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
        
        if (count($puntuacionesJuego)>10) throw new \Exception("Hay más de diez jugadas");

        else {
            for ($j=0; $j<10; $j++){
                $puntuacionTirada = str_split($puntuacionesJuego[$j]);
    
                for ($i=0; $i<2; $i++){
                    if (is_numeric($puntuacionTirada[$i])) $puntuacionFinal += $puntuacionTirada[$i];
                }
            }
            return $this->puntuacion = $puntuacionFinal;
        }
    }

}