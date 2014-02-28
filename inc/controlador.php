<!--*INC/CONTROLADOR.php*-->
<?php
class Controlador{
	protected $module;
	protected $action;
	function Controlador($module, $action){
		$this->module=$module;
		$this->action=$action;
		//$this->carga_accion();// si no cargas la acción solo carla la inicial cargada el controlador de la clase hija
		
	}
	function carga_accion(){
		if (isset($_GET['action']) && $_GET['action']!=NULL && $_GET['action']!="") {//seleccion de la accion
			$this->action=$_GET['action'];
		}else{
			$this->action="inicio";
		}
		$nombrefunc="action_".$this->action;//ejecución de la accion
		$this->$nombrefunc();
	}
}
?>
