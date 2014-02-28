<?php

function HayTER($ficha){
$posiciones = array();
for($i=0;$i<3;$i++){
	for($j=0;$j<3;$j++){
	    $posiciones[$i][$j] = "-";
	}
}
$identificadores = array(array("f1c1", "f1c2", "f1c3"),
			 array("f2c1", "f2c2", "f2c3"),
       			 array("f3c1", "f3c2", "f3c3")
			 );

/*TURNO 1*/
$ficha = "o";		
$casilla= "f1c1";

for ($i=0;$i<3;$i++){
    for($j=0;$j<3;$j++){
	 if ($identificadores[$i][$j] == $casilla){
	    $fila = $i;
	    $column = $j;
	    break;
	 }    
    }
}
$posiciones[$fila][$column] = $ficha ;
echo $posiciones[$fila][$column];

/*TURNO 2*/
$ficha2 = "o";		
$casilla2= "f1c3";

for ($i=0;$i<3;$i++){
    for($j=0;$j<3;$j++){
	 if ($identificadores[$i][$j] == $casilla2){
	    $fila = $i;
	    $column = $j;
	    break;
	 }    
    }
}	
$posiciones[$fila][$column] = $ficha2 ;
echo $posiciones[$fila][$column];
/*TURNO 3*/
$ficha2 = "o";		
$casilla2= "f1c2";

for ($i=0;$i<3;$i++){
    for($j=0;$j<3;$j++){
	 if ($identificadores[$i][$j] == $casilla2){
	    $fila = $i;
	    $column = $j;
	    break;
	 }    
    }
}	
$posiciones[$fila][$column] = $ficha2 ;
echo $posiciones[$fila][$column];

$victoria = false;
$diagonal = 0;
$inversa = 0;
$filas = array();
$columnas = array();


for ($i=0;$i<3;$i++){
    $filas[$i]=0;// En las tres pasadas metemos el valor 0 en el array unidimensional filas
    $columnas[$i]=0;// Hacemos lo mismo en el array columnas
    for ($j=0;$j<3;$j++){ 
    //Hacemos otro bucle para comprobar en cada columna si existe el valor
    //igual a la ficha que nos pasan por parametro.
	if($posiciones[$i][$j]==$ficha){//Si es asi...
	    if($i==$j){// Si la fila es el mismo numero que la columna, a diañonal se sumamos 1
		$diagonal++;// si se produce en las 3 pasadas tenemos 3 en raya diagonal.
	    }
	    if($i+$j==2){// Lo mismo para la inversa.
		$inversa++;
	    }
	    // A FILAS Y COLUMNAS LES SUMAMOS 1 A SU VALOR PARA LA SIGUIENTE PASADA
	    $filas[$i]++;
	    $columnas[$j]++;
	}
    }
    echo "<br/>";
    echo $filas[$i];
    echo "<br/>";
    echo $columnas[$j];
}
// Hasta aqui todo va bien.

//SI TENEMOS TRES EN RAYA DIAGONAL O INVERSA $victorial lo ponemos a true
if($diagonal==3 || $inversa==3){
    $victoria=true;
//SI NO ES ASI MIRAMOS SI HAY TRES EN RAYA DE ALGUNA FILA O ALGUNA COLUMNA
}else{
    for($i=0;$i<3;$i++){
	if($columnas[$i]==3 || $filas[$i]==3){// esta es la linea del fallo
	    $victoria=true;
	}
    }
}

  if ($victoria==true){
      echo "Victoria!!!!";
  }else{
      echo "te jodes.";
  }
}//fin de la funcion.

HayTER("pojhgbft");
?>
