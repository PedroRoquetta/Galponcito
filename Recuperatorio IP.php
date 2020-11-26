<?php
//punto 1 del recu
/**
 * Modulo i: reconocie tipo de llamada (Internacional, larga o corta distancia)
 * @param integer $codigoInternacional, $codigoArea
 * @return string $tipoLlamada
 */
function tipoLlamada ($codigoInternacional, $codigoArea){
    $tipoLlamada= "";
    if($codigoInternacional == 54){        
        if($codigoArea ==299){
            $tipoLlamada="corta";
        }
        else{
            $tipoLlamada="larga";
        }
    }
    else{
        $tipoLlamada="internacional";
    }
    return $tipoLlamada;
}
/**
 * Modulo ii: calcula el valor del segundo de la llamada de acuerdo al tipo
 * @param string $tipoLlamada
 * @return float $valorLlamada 
 */
function valorLlamada($tipoLlamada){
    $valorLlamada=0;
    if($tipoLlamada=="internacional"){
        $valorLlamada=2;
    }
    elseif($tipoLlamada=="larga"){
        $valorLlamada=0.75;
    }
    elseif($tipoLlamada=="corta"){
        $valorLlamada=0.2;
    }
    return $valorLlamada;
}

//programa principal: iii
/*Variables
Entero: $cantLlamadasLarga, $cantLlamadas, $i, $codArea, $codigoInt,$segundos
Float: $precioLlamada, $costoInternacional, $costoLarga, $costoCorta, $costoTotal
String $typeLlamada*/
$cantLlamadasLarga=0;
$costoInternacional=0;
$costoLarga=0;
$costoCorta=0;
$costoTotal=0;
echo "¿Qué cantidad de llamadas desea realizar? ";
$cantLlamadas=trim(fgets(STDIN));
for($i=1;$i<=$cantLlamadas;$i++){
    echo "Código Internacional: ";
    $codInt=trim(fgets(STDIN));
    echo "Código de Área: ";
    $codArea=trim(fgets(STDIN));
    echo "Cuántos segundos: ";
    $segundos=trim(fgets(STDIN));
    $typeLlamada=tipoLlamada($codInt, $codArea);
    $precioLlamada=valorLlamada($typeLlamada);
    if($typeLlamada=="internacional"){
        echo "la llamada ". $i . " es " . $typeLlamada;
        $costoInternacional=$segundos * $precioLlamada;
    }
    elseif($typeLlamada=="larga"){
        echo "la llamada ". $i . " es larga";
        $costoLarga=$segundos * $precioLlamada;
        $cantLlamadasLarga= $cantLlamadasLarga + 1;
    }
    elseif ($typeLlamada=="corta"){
        echo "la llamada " . $i . " es corta";
        $costoCorta=$segundos*$precioLlamada;
    }
    echo "\n";
    $costoTotal= $costoInternacional + $costoLarga + $costoCorta;
}

echo  "el costo total de las llamadas es de: $". $costoTotal;
echo " y la cantidad de llamados de larga distancia es: ". $cantLlamadasLarga;