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
        $strike = 0;
        
        $puntuacionesJuego = explode($separador, $puntuaciones);
        
        if (count($puntuacionesJuego)==10) {
            for ($j=0; $j<10; $j++){
                $puntuacionTirada = str_split($puntuacionesJuego[$j]);
    
                for ($i=0; $i<2; $i++){
                    if ($strike!=0 && is_numeric($puntuacionTirada[$i])){
                        $puntuacionFinal += 2*$puntuacionTirada[$i];
                        $strike -= 1;
                    }

                    else if (is_numeric($puntuacionTirada[$i])) $puntuacionFinal += $puntuacionTirada[$i];
                    
                    elseif ($puntuacionTirada[$i]=="X"){
                        $puntuacionFinal += 10;
                        $strike += 2;
                        break;
                    }
                }
            }
            return $this->puntuacion = $puntuacionFinal;
        }
        else $this->generarExcepcion(count($puntuacionesJuego));
    }

    public function generarExcepcion($numJugadas){
        if ($numJugadas>10) throw new \Exception("Hay más de diez jugadas");
        elseif ($numJugadas<10) throw new \Exception("Hay menos de diez jugadas");
    }
}