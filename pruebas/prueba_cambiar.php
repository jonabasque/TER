<?php
class Turnos {
	private $turno =0;
	
	public function Cambiar(){
	    //El cambio debe de hacerlo solo, sin pasarle un parametro
	    $this->turno=$this->NoToca();
	}//fin metodo Cambiar
	
	public function Toca(){
	     return $this->turno;	
	}//fin metodo Toca
	
	public function NoToca(){
	    return ($this->turno+1)%2;
	}
}//FIN CLASE TURNO

$turno= new Turnos();
echo $turno->Toca();
$turno->Cambiar();
echo "<br />";
echo $turno->Toca();
$turno->Cambiar();
echo "<br />";
echo $turno->Toca();

?>