<?php
/******************************************
*Completar:
* NOMBRE Y APELLIDOS - LEGAJOS
*Felipe Flores M; FAI-2466;
*Pedro Roquetta; FAI-3071
*Daniel Rojas; FAI-951
******************************************/




/**
* genera un arreglo de palabras para jugar
* @return array
*/
function cargarPalabras(){
    // array $coleccionPalabras
  $coleccionPalabras = array(); //inicializa el arreglo en vacio
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>4);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado","puntosPalabra"=> 6);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=>9);
  /*>>> Agregar al menos 4 palabras más <<<*/
  $coleccionPalabras[3]=array("palabra"=> "raton" , "pista" => "animal que le encanta el queso", "puntosPalabra"=>10);
  $coleccionPalabras[4]=array("palabra"=> "fernet" , "pista" => "se toma con amigos", "puntosPalabra"=>10);
  $coleccionPalabras[5]=array("palabra"=> "internet" , "pista" => "conecta a las personas y es global", "puntosPalabra"=>7);
  $coleccionPalabras[6]=array("palabra"=> "dinosaurio" , "pista" => "se extinguio hace años", "puntosPalabra"=>8);
  
  return $coleccionPalabras;// retornamos el arreglo con "palabra","pista" y "puntosPalabra"(estructura A).
}

/**
 * >>> completar comentario <<<
 * Generar un arreglo indexado que contiene arreglos asociativos indicadndo el puntaje obtenido y el indice 
 * @return array
 */

function cargarJuegos(){
    // array $coleccionJuegos
	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 4, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 6,"indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 9, "indicePalabra" => 3);
    $coleccionJuegos[3] = array("puntos"=> 10, "indicePalabra" => 4);
    /*>>> Agregar al menos 3 juegos realizados más <<<*/
    $coleccionJuegos[4] = array("puntos"=> 10, "indicePalabra" => 5);
    $coleccionJuegos[5] = array("puntos"=> 7, "indicePalabra" => 6);
    $coleccionJuegos[6] = array("puntos"=> 8, "indicePalabra" => 7);

    return $coleccionJuegos; //retornamos el array con los siguentes datos "puntos" y "indicePalabra"(estructura C).
}

/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra
* @return array
*/
function dividirPalabraEnLetras($palabra){
        //string $palabraMin
        //array $coleccionLetras
    //Completar para generar la estructura de datos b) indicada en el enunciado. 
    // recuerde que los string pueden ser recorridos como los arreglos.  <<<*/
    $palabraMin = strtolower($palabra);// utilizamos strtolowe para que este todo en minuscula.
    $coleccionLetras  = []; //inicializamos un arreglo vacio.
    for ($i=0; $i < strlen($palabraMin) ; $i++) { //strlen para obtener la longitud del string dado. 
        $coleccionLetras[$i] = ["letra" => $palabraMin[$i],"descubierta"=> false];//creamos un arreglo para guardar las letras de una palabra.
    }
    // saber si fueron descubiertas o no.
    return $coleccionLetras;//retorna la "letra" y si fue "descubierta" como true/false
}

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int
*/
function seleccionarOpcion(){//punto 4
    //int $opcion
    echo "--------------------------------------------------------------\n";
    echo "\n ( 1 ) Jugar con una palabra aleatoria."; 
    /*>>> Completar el menu <<<*/
    echo"\n ( 2 ) Jugar con una palabra elegida.";
    echo"\n ( 3 ) Agregar una palabra el listado.";
    echo"\n ( 4 ) Mostrar la información completa de un número de juego.";
    echo"\n ( 5 ) Mostrar le información completa del primer juego con más puntaje.";
    echo"\n ( 6 ) Mostrar la informacíon completa del primer juego que supere un puntaje indicado por el usuario.";
    echo"\n ( 7 ) Mostrar la lista de palabras ordenada por orden alfabético.";
    echo"\n ( 8 ) Salir del juego.";
    /*>>> Además controlar que la opción elegida es válida. Puede que el usuario se equivoque al elegir una opción <<<*/
do {
    echo"\n Indique una opcion valida:";
    $opcion = trim(fgets(STDIN));
} while (($opcion < 1) || (8 < $opcion)); //opcion valida si esta entre 1 & 8.
    
    echo "--------------------------------------------------------------\n";
    return $opcion;
}

/**
 * Muestra en el menú el juego del ahoracado
 */
//ocupamos una funcion sin retorno.
function dibujoAhoracado()
{
    echo "\n    +-----+    ";
	echo "\n    |	  |    ";  
	echo "\n    O     |    ";
	echo "\n   /|\    |    ";
	echo "\n   / \    |    ";
	echo "\n M=====M  ---- ";
	echo "\n JUEGO DEL AHORCADO \n";
}
/**
* Determina si una palabra existe en el arreglo de palabras
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean
*/
function existePalabra($coleccionPalabras,$palabra){//punto 5
    //int $i, $cantPal
    //boolean $existe
    $i=0;
    $cantPal = count($coleccionPalabras);//count — Cuenta todos los elementos de un array o algo de un objeto.
    $existe = false;//true
    while($i<$cantPal && !$existe){
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i=$i+1;
    }
    
    return $existe;
}


/**
* Determina si una letra existe en el arreglo de letras
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
function existeLetra($coleccionLetras,$letra ){//punto 6
    
    /*>>> Completar cuerpo de la función <<<*/
    //int $i, $cantLetras
    //boolean $existe
    $i=0;
    $cantLetras = count($coleccionLetras);//count — Cuenta todos los elementos de un array o algo de un objeto.
    $existe = false;
    while ($i < $cantLetras && !$existe) {

        $existe = $coleccionLetras[$i]["letra"] == $letra;
        $i=$i+1;
    }
    return $existe;
}

/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras
* @return array  colección de palabras modificada con la nueva palabra.
*/
/*>>> Completar la interfaz y cuerpo de la función. Debe respetar la documentación <<<*/
function verificarPalabra($coleccionPalabras)//punto 7
{
    //string $esPalabra,$pal ,$palabra, $pista
    //int $compararPal, $puntaje ,$catindad
    echo"Ingrese una palabra:";
    $palabraNueva = trim(fgets(STDIN));
    $compararPal = existePalabra($coleccionPalabras,$palabraNueva);//comparar la palabra.
    while ($compararPal) {
        echo"La palabra ya existe...";
        echo"Ingrese otra palabra: ";
        $palabraNueva = trim(fgets(STDIN));
        $compararPal = existePalabra($coleccionPalabras,$palabraNueva);
    }
    echo"Ingrese una pista: ";
    $pista = trim(fgets(STDIN));
    echo"Ingrese puntaje: ";
    $puntaje = trim(fgets(STDIN));
    $cantidad = count($coleccionPalabras);
    $coleccionPalabras[$cantidad] =["palabra" => $palabraNueva, "pista" => $pista,"puntosPalabra" => $puntaje];
    return $coleccionPalabras;
}
 /*>>> Completar documentacion <<<*/
/**
* Obtener indice aleatorio
*@param int $min
*@param int $max
*@return int
*/
function indiceAleatorioEntre($min,$max){//punto 8
    $i = rand($min,$max); // /*>>> documente qué hace la función rand según el manual php.net en internet <<<*/
    //rand — Genera un número entero aleatorio
    return $i;
}

/**
* solicitar un valor entre min y max
* @param int $min
* @param int $max
* @return int
*/
function solicitarIndiceEntre($min,$max){ //punto 9
    // int $i
    do{
        echo "Seleccione un valor entre $min y $max: ";
        $i = trim(fgets(STDIN));
    }while(!($i>=$min && $i<=$max));
    
    return $i;
}



/**
* Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas
* @param array $coleccionLetras
* @return boolean
*/
function palabraDescubierta($coleccionLetras){//punto 10 revisar
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    //int $i, $num1, $num2
    //boolean $val
    $val=false;
    $num1 = count($coleccionLetras);
    $num2 = 0;
    foreach ($coleccionLetras as $indice => $valor) {
        if ($valor["descubierta"] == !($val)) {
            $num2=$num2+1;//incrementamos el valor del contador en caso de que "descubierta sea true "
        }
    } 
    if ($num2==$num1) {//al iniciar aignamos a $num1 el valor de la funcion count  en el arreglo $coleccionLetras
     //si son iguales se descubrio la palabra.
     $val=true;   
    }
    return $val;
}   
/*>>> Completar documentacion <<<*/
/**
* Solicitar una letra para ver si esta o no en la palabra elegida
*@return string
*/
function solicitarLetra(){//punto 11
    //boolean $letraCorrecta
    //string $letra
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN)));
        if(strlen($letra)!=1){
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}

/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array colección de letras modificada.
*/
function destaparLetra($coleccionLetras, $letra){// punto 12
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    // int $i, $sumaPal
    $i=0;
    $sumaPal=count($coleccionLetras);
    for ($i=0; $i < $sumaPal; $i++) { 
        if ($coleccionLetras[$i]["letra"] == $letra) {
            $coleccionLetras[$i]=["letra"=>$letra,"descubierta"=>true];
        }
    }
    return $coleccionLetras;
}

/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){ //punto 13(probar)
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    // string $pal 
    //boolean $val
    $pal = "";
    $val= false;
    
    foreach ($coleccionLetras as $indice => $valor) {
        if ($valor["descubierta"] == (!$valor)) {
            $pal=$pal.($valor["letra"]);
        }else {
            $pal = $pal.("*");
        }
    }
    return $pal;
}


/**
* Desarrolla el juego y retorna el puntaje obtenido
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int puntaje obtenido
*/
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){//punto 14
    //string $pal , $letra , $letraDos
    //array $coleccionLetras, $descubiertas
    //boolean $palDos $PalabraFueDescubierta, $existe
    // int $puntaje $cantIntentos
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetras = dividirPalabraEnLetras($pal);
    //print_r($coleccionLetras);
    $puntaje = 0;
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    $palabraFueDescubierta=false;
    //Mostrar pista:
    echo"pista".$coleccionPalabras[$indicePalabra]["pista"]."\n";
    $descubiertas= array();
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    do {
        $letra = solicitarLetra();
        $existe=existeLetra($coleccionLetras,$letra);
        if ($existe) {
            echo"La letra: ".$letra."ha sido descubierta \n";
            $descubiertas=destaparLetra($coleccionLetras,$letra);
            $letraDos=stringLetrasDescubiertas($descubiertas);
            echo $letraDos."\n";
            $coleccionLetras=$descubiertas;
        }else {
            $cantIntentos--;
            echo"la letra: ".$letra ."no pertenece a la palabra. QUEDAN ".$cantIntentos." Intentos \n";

        }
        $palabraFueDescubierta=palabraDescubierta($descubiertas);
    } while (0 < $cantIntentos && !$palabraFueDescubierta);
    If($palabraFueDescubierta){
        //obtener puntaje:
        $puntaje=$coleccionPalabras[$indicePalabra]["puntosPalabra"]+$cantIntentos;
        
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
    }
    
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $ptos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){// punto 15 agrege [i] al []
    //int $i
    //array $coleccionJuegos
    $i = count($coleccionJuegos);
    $coleccionJuegos[$i] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){//punto 16 revisar
    //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    echo "Palabra: " .$coleccionPalabras[$indicePalabra]["palabra"]."\n";
    echo "Pista: " .$coleccionPalabras[$indicePalabra]["pista"]."\n";
    echo "Puntos: " .$coleccionPalabras[$indicePalabra]["puntosPalabra"]."\n";
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
}


/**
* Muestra los datos completos de un juego
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){// punto 17
    //array("puntos"=> 8, "indicePalabra" => 1)

    echo "\n\n";
    echo "<-<-< Juego ".$indiceJuego." >->->\n";
    echo "  Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}


/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/
/**
 * Muestra el mayor puntaje obtenido den los juegos
 * @param array $coleccionJuegos
 * @param array $coleccionPalabras
 */
function mostrarMayorPuntaje($coleccionJuegos,$coleccionPalabras)
{
    //int  $n1,$n2,$cont $indiceMayor
    $n1=-1;
    $cont=count($coleccionJuegos);
    for ($i=0; $i < $cont ; $i++) { 
        if ($coleccionJuegos[$i]["puntos"]>$n1) {
            $n1=$coleccionJuegos[$i]["puntos"];
            $indiceMayor=$i;
        }
    }
    mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceMayor);
}
/*>>> Implementar las funciones necesarias para la opcion 6 del menú <<<*/
/**
 * Mostrar la informacion completa del primer juego que supere un puntaje indicado por el usuario.
 * @param array $coleccionJuegos
 * @param array $coleccionPalabras
 */
function infoPrimerPuntaje($coleccionJuegos,$coleccionPalabras)
{
    //boolean $primerPalabra
    //int $i, $cont, $inf1, $inf2, $inf3
    $primerPalabra=false;
    echo"Ingrese puntaje a comparar: \n";
    $puntosUsuario=trim(fgets(STDIN));
    $cont=count($coleccionJuegos);
    $i=0;
    do {
        if ($coleccionJuegos[$i]["puntos"]>$puntosUsuario) {
            $inf1=$coleccionJuegos[$i]["puntos"];
            $primerIndice=$i;
            $primerPalabra=true;
        }else {
            $i=$i+1;//o $i++
        }
    } while (!$primerPalabra && $i<$cont);
    mostrarJuego($coleccionJuegos,$coleccionPalabras,$primerIndice);
}
/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/
/**
 * Mostrar la lista de palabras ordenads por orden alfabetico
 * @param array $coleccionPalabras
 */
function mostrarPorOrden($coleccionPalabras)// REVISAR punto 20 no se si esta bien ...
{
    uasort($coleccionPalabras,"cmp");//Ordena un array con una función de comparación definida por el usuario y mantiene la asociación de índices
    print_r($coleccionPalabras);//informacion sobre los elementos del array de una manera legible
}
/**
* @param string $a
* @param string $b
* @return int
*/
function cmp($a,$b){// punto 21 nose si nos piden esta funcion...


    if($a["puntosPalabra"] == $b["puntosPalabra"]){
        $orden = 0;
    }elseif($a["puntosPalabra"] > $b["puntosPalabra"]){
        $orden = -1;
    }else{
        $orden = 1;
    }
    return $orden;
 }

/******************************************/
/************** PROGRAMA PRINCIAL *********/
/******************************************/
// int $cantIntentos, $opcion, $num1, $num2, $var1, $var2

$cantDeIntentos=6; //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.
$coleccionJuegos = cargarJuegos();
$coleccionPalabras = cargarPalabras();
do{
    $num1=0;
    $num2=count($coleccionPalabras);
    $var1=0;
    $var2=count($coleccionJuegos);
    $contj=count($coleccionJuegos);
    $opcion = seleccionarOpcion();
    switch ($opcion) {//la sentencia switch es similar a una serie de sentencias IF en la misma expresión. En muchas ocasiones, es posible que se quiera comparar la misma variable (o expresión) con muchos valores diferentes, y ejecutar una parte de código distinta dependiendo de a que valor es igual. Para esto es exactamente la expresión switch
    case 1: //Jugar con una palabra aleatoria
            //int $puntos, $indiceALeatorioEntre, $indicePalabra
            //$array $coleccionJuegos
            $indiceALeatorioEntre = indiceAleatorioEntre($num1,$num2);
            $indicePalabra = $indiceALeatorioEntre;
            $puntos = jugar($coleccionPalabras,$indicePalabra,$cantDeIntentos);
			$coleccionJuegos = agregarJuego($coleccionJuegos,$puntos,$indicePalabra);
            $var2=count($coleccionJuegos);

        break;
    case 2: //Jugar con una palabra elegida
            //int $selec1, $cont, $puntos
            // array $puntosDos
            $selec1=0;
			$selec1=solicitarIndiceEntre($num1,$num2-1);
			$puntos = jugar($coleccionPalabras,$selec1,$cantDeIntentos);
			$coleccionJuegos=agregarJuego($coleccionJuegos,$puntos,$selec1);
			$var2=count($coleccionJuegos);
        break;
    case 3: //Agregar una palabra al listado
            //array $agregarPalabraNueva
            $coleccionPalabras= verificarPalabra($coleccionPalabras);
            $num2=$num2+1;
        break;
    case 4: //Mostrar la información completa de un número de juego
        //int $obteniendoIndice
        $obteniendoIndice=0;
        $obteniendoIndice=solicitarIndiceEntre($var1,$var2-1);
        $mostrandoJuego=mostrarJuego($coleccionJuegos,$coleccionPalabras,$obteniendoIndice);
        break;
    case 5: //Mostrar la información completa del primer juego con más puntaje
            // int $mostrarElMasAltoPuntaje
            $mostrarElMasAltoPuntaje=mostrarMayorPuntaje($coleccionJuegos,$coleccionPalabras);
        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
            //int $mostrarPrimerDato
            $mostrarPrimerDato=mostrarPrimerPuntaje($coleccionJuegos,$coleccionPalabras);
        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico
            $mostrarOrdenados=mostrarPorOrden($coleccionPalabras);
        break;
    }
}while($opcion != 8);
