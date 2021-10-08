<?php
system('clear');
echo "CONNECT 4 \n";
$taulell= [ [0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0]
        ];

/* print_r($taulell); */

$jugador = 1;

while (no_hi_ha_guanyador($taulell)){
    /* system("clear"); */
    pintar_taulell($taulell, $jugador);
    $columna=readline("Moviment jugador $jugador (1-7):");
    if(processar_moviment($columna,$taulell, $jugador)){
        $jugador==1?$jugador=2:$jugador=1;
    }
}

$jugador==1?$jugador=2:$jugador=1;
system("clear");
pintar_taulell($taulell, $jugador);
winner($jugador);

function processar_moviment($columna, &$taulell, $jugador){
    if($columna == "1" || $columna == "2" ||$columna == "3" ||$columna == "4" ||$columna == "5" ||$columna == "6" ||$columna == "7"){
        $num_col = intval($columna);
        if($taulell[0][$num_col -1] != 0){
            readline("Columna no vàlida([enter]) per continuar");
            return false;
        }
        gravar_moviment($num_col, $jugador,$taulell);
        return true;
    }else{
        readline("Columna no vàlida([enter]) per continuar");
        return false;
    }
}

function pintar_taulell($taulell, $jugador){
    system('clear');
    echo "┌─────────────┐ \n";
    echo "│   PLAYER ".$jugador."  │ \n";
    echo "└─────────────┘ \n \n";
    for ($t=0; $t < 6; $t++) { 
        $template = '';
        for($tt = 0; $tt <7; $tt++){
            echo "│".$taulell[$t][$tt];
        }
        echo "│\n";
    }
}

function no_hi_ha_guanyador($taulell){
    for($t = 0; $t < 6; $t++){
        $n_uns=0;
        for($tt =0;$tt<7;$tt++){
            if($taulell[$t][$tt]==1){
                $n_uns++;
                if($n_uns == 4){
                    return false;
                }
            }else{
                $n_uns=0;
            }
        }
    };

    for($t = 0; $t < 6; $t++){
        $n_uns=0;
        for($tt =0;$tt<7;$tt++){
            if($taulell[$t][$tt]==2){
                $n_uns++;
                if($n_uns == 4){
                    return false;
                }
            }else{
                $n_uns=0;
            }
        }
    };


    for($t = 0; $t < 7; $t++){
        $n_uns=0;
        for($tt =0;$tt<6;$tt++){
            if($taulell[$tt][$t]==1){
                $n_uns++;
                if($n_uns == 4){
                    return false;
                }
            }else{
                $n_uns=0;
            }
        }
    };

    for($t = 0; $t < 7; $t++){
        $n_uns=0;
        for($tt =0;$tt<6;$tt++){
            if($taulell[$tt][$t]==2){
                $n_uns++;
                if($n_uns == 4){
                    return false;
                }
            }else{
                $n_uns=0;
            }
        }
    };

    // Diagonal \ 1
    for($t = -3; $t < 3; $t++){
        $n_uns = 0;
        for($tt=0;$tt < 7; $tt++){
            if(($t+$tt)>=0 && ($t+$tt)<6 && $tt>=0 &&$tt<7){
                if($taulell[$t+$tt][$tt] == 1){
                    $n_uns++;
                    if($n_uns >= 4) return false;
                }else{
                    $n_uns = 0;
                }
            }
        }
    }


    
    // Diagonal  / 1
    for($t = 3; $t <= 8; $t++){
        $n_uns = 0;
        for($tt=0;$tt < 7; $tt++){
            if(($t-$tt)>=0 && ($t-$tt)<6 && $tt>=0 &&$tt<7){
                if($taulell[$t-$tt][$tt] == 1){
                    $n_uns++;
                    if($n_uns >= 4) return false;
                }else{
                    $n_uns = 0;
                }
            }
        }
    }

        // Diagonal \ 1
        for($t = -3; $t < 3; $t++){
            $n_uns = 0;
            for($tt=0;$tt < 7; $tt++){
                if(($t+$tt)>=0 && ($t+$tt)<6 && $tt>=0 &&$tt<7){
                    if($taulell[$t+$tt][$tt] == 2){
                        $n_uns++;
                        if($n_uns >= 4) return false;
                    }else{
                        $n_uns = 0;
                    }
                }
            }
        }
    
    
        
        // Diagonal  / 1
        for($t = 3; $t <= 8; $t++){
            $n_uns = 0;
            for($tt=0;$tt < 7; $tt++){
                if(($t-$tt)>=0 && ($t-$tt)<6 && $tt>=0 &&$tt<7){
                    if($taulell[$t-$tt][$tt] == 2){
                        $n_uns++;
                        if($n_uns >= 4) return false;
                    }else{
                        $n_uns = 0;
                    }
                }
            }
        }

    return true;
}

function gravar_moviment($num_col,$jugador,&$taulell){
    $num_col--;
    for($c=5;$c>=0;$c--){
        if($taulell[$c][$num_col] == 0){
            
            $taulell[$c][$num_col]=$jugador;
            return;
        }
    }
}

function winner($jugador){
    echo $jugador;
}
?>

