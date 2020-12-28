<?php

//la idea es hacer un pequeño juego de combate por turnos


function menu (){
    echo "-------\n";
    echo " 1- para atacar";
    echo " 2- para defender";
    echo " 3- para curar";

}


$opcion=trim(fgets(STDIN));
switch($opcion){
case 1 : 
        echo "juega P1";
        $player1=trim(fgets(STDIN));
case 2 :
        echo "juega P2";    
        $player2=trim(fgets(STDIN));
}