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
        
        if (count($puntuacionesJuego)==10) {
            for ($j=0; $j<10; $j++){
                $puntuacionTirada = str_split($puntuacionesJuego[$j]);
    
                for ($i=0; $i<2; $i++){
                    
                    if (is_numeric($puntuacionTirada[$i])){
                        if ($i==0 && $puntuacionTirada[$i] + $puntuacionTirada[$i+1] > 10) {
                            throw new \Exception("Excede la puntuación de una tirada");
                        }
                        $puntuacionFinal += $puntuacionTirada[$i];
                    }
                    
                    elseif ($puntuacionTirada[$i]=="X"){
                        $puntuacionFinal += 10;
                        if ($puntuacionesJuego[$j+1][0]=="X"){
                            $puntuacionFinal += 10;
                            if ($puntuacionesJuego[$j+2][0]=="X") $puntuacionFinal += 10;
                            else if (is_numeric($puntuacionesJuego[$j+2][0])) $puntuacionFinal += $puntuacionesJuego[$j+2][0];
                        }
                        elseif (is_numeric($puntuacionesJuego[$j+1][0])){
                            $puntuacionFinal += $puntuacionesJuego[$j+1][0];
                            $puntuacionFinal += $puntuacionesJuego[$j+1][1];
                        }
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