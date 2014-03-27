<?php
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


$ficha = "o";		
$casilla= "f3c2";

echo $casilla;
echo "<br />";



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
echo "<br />";

for($i=0;$i<3;$i++){
	echo $i."-> ";
	for($j=0;$j<3;$j++){
		echo "| ".$posiciones[$i][$j]." ";
		
	} 
	echo "<br />";
}

$ficha2 = "x";		
$casilla2= "f1c1";

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
echo "<br />";

for($i=0;$i<3;$i++){
	echo $i."-> ";
	for($j=0;$j<3;$j++){
		echo "| ".$posiciones[$i][$j]." ";
		
	} 
	echo "<br />";
}

?>
