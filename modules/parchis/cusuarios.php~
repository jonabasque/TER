<?php
class Cusuarios extends Controlador{
	function Cusuarios($module,&$modelo){
		parent::Controlador($module,$modelo);
		global $host,$username,$password,$database;
		$database="usuarios";
		//cargo el modelo
		$modelo->desconecta();
		$modelo=new Modelo($host,$username,$password,$database);
		
		$this->carga_accion();
	}
	function cogedatosusuarios($data){
		$array=array();
		$num=mysql_numrows($data);
		$i=0;
		while ($i < $num) {
			$array[$i]=array();
			$id=mysql_result($data,$i,"id");
			$array[$i]['userid']=$id;
			$nombre=mysql_result($data,$i,"username");
			$array[$i]['username']=$nombre;
			$email=mysql_result($data,$i,"email");
			$array[$i]['email']=$email;
			$cp=mysql_result($data,$i,"cp");
			$array[$i]['cp']=$cp;
			$idciudad=mysql_result($data,$i,"idciudad");
			$array[$i]['idciudad']=$idciudad;
			$boletin=mysql_result($data,$i,"boletin");
			$array[$i]['boletin']=$boletin;
			$acepta=mysql_result($data,$i,"acepta");
			$array[$i]['acepta']=$acepta;
			$i++;
		}
		return $array;
	}

	function cogedatosciudad($data){
		$array=array();
		$num=mysql_numrows($data);
		$i=0;
		while ($i < $num) {
			$array[$i]=array();
			$id=mysql_result($data,$i,"idciudad");
			$array[$i]['id']=$id;
			$nombre=mysql_result($data,$i,"nombre");
			$array[$i]['nombre']=$nombre;
			$idprov=mysql_result($data,$i,"idprov");
			$array[$i]['idprov']=$idprov;
			$i++;
		}
		return $array;
	}

	function cogedatosprov($data){
		$array=array();
		$num=mysql_numrows($data);
		$i=0;
		while ($i < $num) {
			$array[$i]=array();
			$id=mysql_result($data,$i,"idprov");
			$array[$i]['idprov']=$id;
			$nombre=mysql_result($data,$i,"nombre");
			$array[$i]['nombre']=$nombre;
			$idpais=mysql_result($data,$i,"idpais");
			$array[$i]['idpais']=$idpais;
			$i++;
		}
		return $array;
	}
	
	function cogedatospais($data){
		$array=array();
		$num=mysql_numrows($data);
		$i=0;
		while ($i < $num) {
			$array[$i]=array();
			$id=mysql_result($data,$i,"idpais");
			$array[$i]['id']=$id;
			$nombre=mysql_result($data,$i,"nombre");
			$array[$i]['nombre']=$nombre;
			$i++;
		}
		return $array;
	}

	function seleccionaprovincia($valor,$pos,$aprovs){
	
		if ($valor==$aprovs[$pos]) {
			echo ' selected="true" ';
		}
	
	}
	function action_register(){
		$sql="select * from ciudad";
		$respuesta=$this->consulta($sql);
		$ciudades=$this->cogedatosciudad($respuesta);
		if (isset($_POST['user'])) {
			$fallo=0;
			$user=$_POST['user'];
			$errores=array();
			foreach ($user as $key => $value) {
				if ($key!="envio" 
				&& ($value==null || $value=="")) {
					$errores[$key]=array();
					$errores[$key][]="El campo está vacío<br/>";	
				}
			}
			if (strlen($user['usuario'])>12 
				|| strlen($user['usuario'])<6) {
				$errores['usuario'][]="El campo debe tener ".
				"entre 6 y 12 caracteres.<br/>";
			}
			if (strlen($user['pass'])>20 
				|| strlen($user['pass'])<8) {
				$errores['pass'][]="El campo debe tener ".
				"entre 8 y 20 caracteres.<br/>";
			}
			if (strlen($user['pass2'])>20 
				|| strlen($user['pass2'])<8) {
				$errores['pass2'][]="El campo debe tener ".
				"entre 8 y 20 caracteres.<br/>";
			}
			if ($user['pass']!=$user['pass2'] || 
				($user['pass']==null && $user['pass2']==null)) {
				$errores['pass'][]="Los dos campos de la contraseña".
				" deben coincidir.<br/>";
				$errores['pass2'][]="Los dos campos de la contraseña".
				" deben coincidir.<br/>";
			}
			if (!$this->comprobar_email($user['email'])) {
				$errores['email'][]="Debe introducir un email "
				." válido";
			}
			if(!isset($user['cond'])){
				$errores['cond']=array();
				$errores['cond'][]="Debe aceptar las condiciones.<br/>";
			}
			if (!preg_match('`[a-z]`',$user['pass'])){
				$errores['pass'][]="La clave debe tener al menos una letra minúscula<br/>";
			}
		   	if (!preg_match('`[A-Z]`',$user['pass'])){
		      	$errores['pass'][]="La clave debe tener al menos una letra mayúscula<br/>";
		   	}
		   	if (!preg_match('`[0-9]`',$user['pass'])){
		      	$errores['pass'][]="La clave debe tener al menos un número<br/>";
		   	}
			if(count($errores)!=0){
				$fallo=1;
				//print_r($errores);
			}
			if($fallo==1){
				include "vistas/vadd.php";	
			}else{
				// insert into cliente values (
				// NULL,'$datos['nombre']','$datos['cif']'
				//)
				$sql = "insert into usuario values (".
				"NULL,'".$user['usuario']."','".
				$user['pass']."',".
				"'".$user['email']."',".
				"'".$user['cp']."',"
				;
			
				$sql.=$user['idciudad'].",";
				if($user['envio']=="si"){
					$envio=1;
				}else{
					$envio=0;
				}
				$sql.=$envio.",";
				if(isset($user['cond'])){
					$cond=1;
				}else{
					$cond=0;
				}
				$sql.=$cond;
				$sql.=")";
				echo $sql."<br/>";
				//ejecuto la sql
				$respuesta=consulta($sql);
				$respuesta=mysql_affected_rows();
				if ($respuesta==1) {
					//la ha añadido
					echo "Datos guardados<br/>";
				
				}else{
					//ha fallado el salvado
					echo "Ha ocurrido un fallo al guardar";
					echo mysql_error()."<br/>";
					echo mysql_errno()."<br/>";
				}
				echo "<br/>";
				$this->action_listado();
	
			}
		} else {
		
			include "vistas/vadd.php";
		}

	}
	function conectabbddusuarios(){
		global $host, $username, $password;
		$database="usuarios";
		$this->modelo->desconecta();
		$this->modelo->conecta($host,$username,$password,$database);
	}
	function action_listado(){
	
		$sql = "select * from usuario";
		if(isset($_POST['patron']) && $_POST['patron']!=null  && $_POST['patron']!=""){
			$sql.=" where ";
			$sql.=" username LIKE '%".$_POST['patron']."%' ";
			$sql.=" OR email LIKE '%".$_POST['patron']."%' ";
			$sql.=" OR idciudad IN (
					Select idciudad 
					from ciudad 
					where nombre LIKE '%".$_POST['patron']."%' )";
	
		}
		echo $sql."<br/>";
		$respuesta=$this->consulta($sql);
		$datos=$this->cogedatosusuarios($respuesta);
	
		include_once "vistas/vlistado.php";

	}
	function action_add(){
	
	}
	function action_show(){
		$sql = "select * from usuario where id=".
		$_GET['id'];
		$respuesta=$this->consulta($sql);
		$datos=$this->cogedatosusuarios($respuesta);
		include_once "vistas/vshow.php";
	}
	function action_edit(){
	
	}
	function action_delete(){
	
		if(isset($_GET['confirm'])
		&&$_GET['confirm']==1){
		
			$sql="delete from usuario where id=".
			$_GET['id'];
			$respuesta=$this->consulta($sql);
			$respuesta=mysql_affected_rows();
			if($respuesta==1){
				echo "borrado usuario";	
			}else{
				echo "fallo al borrar";
			}
		}else{
			$this->action_show(true);
		
		}
	

	}
	function action_index(){
		$this->action_listado();
	}
}
?>
