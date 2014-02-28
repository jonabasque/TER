<?php

class TER {

  private const $Tablero = new Tablero();
  private const $Jugador = new Jugador();
  private const $Turno = new Turno ();


  public function TER () {
  
     $jugadores[0]=new Jugador('o');
     $jugadores[1]=new Jugador('x');
     
  }//fin Constructor TER
  
  public static function Main ($arg) {
      
      $partida = new TER {
	  $partida->Jugar();
      }
  }//fin metodo Main
  
  public function Jugar(){
      
      $tablero->Mostrar();
      for($i=0;$i<5;$i++){
	  $jugadores[$turno->Toca()]->Poner($tablero);
	  $turno->Cambiar();
	  $tablero->Mostrar();
      }
      if($tablero->HayTER($color)){
	  $jugadores[$turno->NoToca()]->Victoria();
      }else{
	  $jugadores[$turno->Toca()]->Victoria();
	  $tablero->Mostrar();
	  while (!$tablero->HayTER($color)){
	      $turno->Cambiar();
	      $jugadores[$turno->Toca()]->Mover($tablero);
	      $tablero->Mostrar();
	  }
	  $jugadores[$turno->Toca()]->Victoria();
      }
  }//fin metodo Jugar

}// FIN CLASE TER

class Jugador extends TER{
    private $color;
    private static $gestorIO;
    
    public function Jugador($color){
	$this->color= $color;
    
    }//fin metodo constructor Jugador
    
    public function Poner($tablero){
	
	echo "Juega".$color;
	$destino = new Coordenada();
	
	do {
	    $destino->Recoger("Coordenada destino de puesta");
	}while(!$destino->Valida() || $tablero->Ocupado());
	
	$tablero->Poner($destino, $color);
    }//fin metodo Poner
    
    public function Mover($tablero) {
	$origen = new Coordenada();
	
	do{
	    $origen->Recoger("Coordenada origen de movimiento");
	}while(!$origen->Valida() || $tablero->Ocupado($origen, $color));
	
	$tablero->Sacar($origen);
	$this->Poner($tablero);
    }//fin metodo Mover
    
    public function Victoria(){
	echo "Las ".$color."ganar!!";
    }//fin meetodo Victoria
   
}//FIN CLASE Jugador

class Tablero extends TER {
    private const $fichas = array();
    private const $VACIO = "-";
    
    public function Tablero (){
	for($i=0;$i<3;$i++){
	    for($j=0;$j<3;$j++){
		$fichas[$i][$j] = $VACIO;
	    }
	}
    }//fin metodo Constructor Tablero

    public function Mostrar(){
	for($i=0;$i<3;$i++){
	    for($j=0;$j<3;$j++){
		echo $fichas[$i][$j];
		echo " ";
	    }
	    echo "\n";
	}
	echo "\n";
    }//fin metodo Mostrar

    public function HayTER($color){
	$victoria = false;
	$diagonal = 0;
	$inversa = 0;
	$filas = array();
	$columnas = array();
	
	for ($i=0;$i<3;$i++){
	    $filas[$i]=0;
	    $columnas[$i]=0;
	    for ($j=0;$j<3;$j++){
		if($fichas[$i][$j]==$color){
		    if($i==$j){
			$diagonal++;
		    }
		    if($i+$j==2){
			$inversa++;
		    }
		    $filas[$i]++;
		    $columnas[$j]++;
		}
	    }
	}
	if($diagonal==3) || ($inversa==3){
	    $victoria=true;
	}else{
	    for($i=0;$i<3;$i++){
		if($columnas[$i]==3) || ($filas[$i]==3){
		    $victoria=true;
		}
	    }
	}
	return $victoria;
    }//fin metodo HayTER
    
    public function Ocupado($coordenada){
	if ($fichas[$coordenada->getFila()][$coordenada->getColumna()] != $VACIO){
	    return true;
	}else{
	    return false;
	}
    }//fin metodo Ocupado
    
    public function Poner($coordenada, $color){
	$fichas[$coordenada->getFila()][$coordenada->getColumna()] = $color;
    }//fin metodo Poner
    
    public function Vacio($coordenada){
	if(!$this->Ocupado($coordenada)){
	    return true;
	}else{
	    return false;
	}
    }//fin metodo Vacio
    
    public function Sacar($coordenada){
	$this->Poner($coordenada, $VACIO);
    }//fin metodo Sacar
    
}// FIN CLASE Tablero


class Coordenada extends Tablero{

    private $fila;
    private $columna;
    
    public function Recoger($titulo){
	// recoger fila y columna, es decir la coordenada de la ficha, o el id del div
    }//fin metodo Recoger

    public function Valida (){
	$valida = false;
	if(($fila<=2) && ($fila>=0) && ($columna<=2) && ($columna>=0){
	    $valida=true;
	}
	return $valida;
    }//fin metodo Valida
    
    public function getFila(){
	return $fila;
    }//fin metodo getFila
    
     public function getColumna(){
	return $columna;
    }//fin metodo getColumna
    
}//FIN CLASE Coordenada

class Turno extends TER{

    private $valor = 0;
    
    public function Cambiar(){
	$this->valor = $this->NoToca();
    
    }//fin metodo Cambiar
    
    public function Toca(){
	return $valor;
    }//fin metodo Toca
    
    public function NoToca(){
	return ($valor+1)%2;
    }//fin metodo NoToca
    
}//FIN CLASE TURNO




















?>