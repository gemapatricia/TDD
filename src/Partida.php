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
            for ($j=0; $j<9; $j++){
                $puntuacionTirada = str_split($puntuacionesJuego[$j]);

                for ($i=0; $i<2; $i++){
                    // Procesamiento de número 
                    if (is_numeric($puntuacionTirada[$i])){
                        if ($i==0 && $puntuacionTirada[$i+1]=="/"){
                            $puntuacionFinal += 10;
                            if (is_numeric($puntuacionesJuego[$j+1][0])) $puntuacionFinal += $puntuacionesJuego[$j+1][0];
                            elseif ($puntuacionesJuego[$j+1][0]=="X"){
                                $puntuacionFinal += 10;
                            }
                        }
                        elseif ($i==0 && $puntuacionTirada[$i] + $puntuacionTirada[$i+1] > 10) {
                            throw new \Exception("Excede la puntuación de una tirada");
                        }
                        else{
                            $puntuacionFinal += $puntuacionTirada[$i];
                        }
                        
                    }
                    
                    // Procesamineto de un strike
                    elseif ($puntuacionTirada[$i]=="X"){
                        $puntuacionFinal += 10;
                        if ($j<9){
                            if ($puntuacionesJuego[$j+1][0]=="X"){
                                $puntuacionFinal += 10;
                                if ($puntuacionesJuego[$j+2][0]=="X") $puntuacionFinal += 10;
                                else if (is_numeric($puntuacionesJuego[$j+2][0])) $puntuacionFinal += $puntuacionesJuego[$j+2][0];
                            }
                            elseif (is_numeric($puntuacionesJuego[$j+1][0])){
                                $puntuacionFinal += $puntuacionesJuego[$j+1][0];
                                if (is_numeric($puntuacionesJuego[$j+1][1])) $puntuacionFinal += $puntuacionesJuego[$j+1][1];
                                elseif ($puntuacionesJuego[$j+1][1]=="/") $puntuacionFinal += 10 - $puntuacionesJuego[$j+1][0];
                            }
                            elseif ($puntuacionTirada[$i+1] != null) throw new \Exception("No puede haber una misma tirada con otro valor");
                            break;
                        }
                    }
                    else break;
                }
            }
            $puntuacionUltimaTirada = str_split($puntuacionesJuego[9]);
            
            foreach ($puntuacionUltimaTirada as $indice => $value){
                if (is_numeric($value)) $puntuacionFinal += $value;
                elseif ($value=="X") $puntuacionFinal += 10;
                elseif ($value=="/") $puntuacionFinal += (10 - $puntuacionUltimaTirada[$indice-1]);
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