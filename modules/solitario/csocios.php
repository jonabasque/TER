<?php
class Csocios extends Controlador{
	function Csocios($module,&$modelo){
		parent::Controlador($module,$modelo);
		$this->carga_accion();
	}
	function action_index(){
		include_once "vistas/vmain.php";	
	}
}
?>