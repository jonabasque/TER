<!--MODULES/CIENTES/cclientes.php-->
<?php
class Cter extends Controlador{
	private $tablero;
  	private $jugadores;
	private $turno;

	function __construct(){
		$this->tablero = new Tablero();
		$this->jugadores[0]=new Jugador('o');
     		$this->jugadores[1]=new Jugador('x');
		$this->turno = new Turno ();
     		//echo 'Consructor de TER!!';
     		include_once "vistas/vgeneral.php";
     		$this->carga_accion();
     		
     		
	}
	function action_inicio(){
	   // $this->action_jugar();
	}

	function action_jugar(){
	    $this->Jugar();
	}
	
	
	public function Jugar(){
		$this->tablero->Mostrar();
		for($i=0;$i<5;$i++){
			$this->jugadores[$this->turno->Toca()]->Poner($this->tablero);//Toca funciona perfectamente y Poner también.
			$this->turno->Cambiar();// Cambiar funciona perfectamente.
			$this->tablero->Mostrar();
			echo "turno".$i."a".$this->tuno->Toca();
		}
		/*
		$ficha=$this->jugadores[$this->turno->Toca()];//Guardamos el valor de atributo $ficha en la variable $ficha para pasarla por HayTER
		if($this->tablero->HayTER($ficha)){// HayTER funciona perfectamente.
			//COMO EN HayTER YA SE CONTROLA LA FICHA, SIMPLEMENTE CANTAMOS AL JUGADO QUE NO TOCA, 
			//POR QUE ANTES HABIAMOS CAMBIADO EL TURNO
			$this->jugadores[$this->turno->NoToca()]->Victoria();// Al que no toca?? no sería al reves?? 
		}else{  //EN EL CASO QUE NO HAYA 3 EN RAYA DEL QUE LE TOCA....
			//$this->jugadores[$this->turno->Toca()]->Victoria();//Me parece que esto sobraria, no habría 3 en raya del contrario. Creo :(
			//VOLVERIAMOS A MOSTRAR EL TABLERO Y MOVERIAMOS HASTA ABURRIRNOS O HACER 3 EN RAYA
			$this->tablero->Mostrar();
			while (!$this->tablero->HayTER($ficha)){
				$this->turno->Cambiar();//Comprobado que funciona correctamente.
				$this->jugadores[$this->turno->Toca()]->Mover($this->tablero);//Parece que esta bien, pero es muy largo y lioso asiu qeu está en duda.
				$this->tablero->Mostrar();// vamos por aquí controlando el flujo
			}
			$this->jugadores[$this->turno->Toca()]->Victoria();
		}
		*/
	}//fin metodo Jugar
	
}


class Jugador extends Cter{
	private $ficha;

	public function __construct($ficha){
		$this->ficha= $ficha;
	}//fin metodo constructor Jugador
 
	public function Poner($tablero){

		echo "Juega".$this->ficha;
		
		$destino = new Coordenada(); // creemos que no hy que llamarlo con this
		
		do {    //RECOGEMOS EL VALOR DE DESTINO...
    			$destino->Recoger();
		}while(!$destino->Ocupado($destino->ficha));
		// en este metodo no necesitamos saber que ficha tiene si no si solo está ocupada la coordenada de destino
		
		$tablero->Poner($destino, $this->ficha);// este poner es de Tablero no de Jugador
		/**/
	}//fin metodo Poner
	/*
	public function Mover($tablero) { 
		$origen = new Coordenada();
		// creamos un objeto de la clase Coordenada para meter la coordenada y la ficha origen.
		do{
	   		 $origen->Recoger();
	   		 //Llamamos al metodo Recoger al menos una vez del objeto origen y recibimos una casilla valida.
		}while(($this->jugadores[$this->turno->Toca()]!=$origen->ficha) || ($this->tablero->Ocupado($origen->ficha));
		// Mientras el jugador no sea igual a la ficha que hay en el origen o no este el origen ocupado.
		
		//COMO LA COORDENADA DE LA FICHA A SACAR ES VALIDA...
		$this->tablero->Sacar($origen->coordenada);
		//LLAMAMOS AL METODO PONER DE ESTA MISMA CLASE PARA PONER LA FICHA RECOGIDA.
		$this->Poner($this->tablero);
	}//fin metodo Mover
	*/

	public function Victoria(){
		echo "Las ".$this->ficha."ganar!!";
	}//fin meetodo Victoria
	
	public function getFicha (){
	    return $this->ficha;
	}

}//FIN CLASE Jugador

class Tablero extends Cter {
	private $posiciones;
	private $identificadores;
	private $VACIO;
	private $casilla;// No tiene sentido por que nos la van a pasar siempre.

	public function __construct (){
	    $this->posiciones = array();
	    $this->identificadores = array(array("f1c1", "f1c2", "f1c3"),
					   array("f2c1", "f2c2", "f2c3"),
					   array("f3c1", "f3c2", "f3c3")
					 );
	    $this->VACIO = "-";
	    $this->casilla= "";
	    for($i=0;$i<3;$i++){
		for($j=0;$j<3;$j++){
		    $this->posiciones[$i][$j]=$this->VACIO;
		}
	    }
	    
	}//fin metodo Constructor Tablero
	
	
	public function Mostrar(){
	
	    include_once "vistas/vtablero.php";//deberiamos recargar la pagina o elimnar la otra vista.
	}//fin metodo Mostrar
	
	
	/*
	public function HayTER($ficha){ //OJO!!!! TENEMOS QUE CONTROLA QUE NOS LO PASEN CON VALOR
	    
	    $victoria = false; //siendo variables creemos que no se llaman con $this
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
	    }
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
	    return $victoria;
	}//fin metodo HayTER
	
	public function Ocupado($casilla){//OJO!!!! TENEMOS QUE CONTROLA QUE NOS LO PASEN CON VALOR
		if ($casilla=="-"){
		    return false;
		}else{
		    return true;
		}
	}//fin metodo Ocupado

	public function Poner($casilla, $ficha){ //OJO!!!! TENEMOS QUE CONTROLA QUE NOS LO PASEN CON VALOR
	    for ($i=0;$i<3;$i++){
		for($j=0;$j<3;$j++){
		    if ($this->identificadores[$i][$j] == $casilla){
			$fila = $i;
			$column = $j;
			break;
		    }    
		}
	    }	
	    $this->posiciones[$fila][$column] = $ficha ;
	}//fin metodo Poner
	
	public function Sacar($casilla){
		$this->Poner($casilla, $VACIO);
		// En la casilla origen ponemos un vacio.
	}//fin metodo Sacar
	*/
}// FIN CLASE Tablero

class Coordenada extends Tablero{

	private $ficha;// HABRIA QUE MIRAR SI SE PUEDE USAR LA FICHA DE LA CLASE JUGADOR.
	private $coordenada;

	public function Recoger(){
	
	?>
	<script type="text/javascript">
	    $(function(){
		jQuery(".casillas").each(function(){
		    jQuery(this).on("click", function(){
			var casilla = jQuery(this).attr("id");
			var ficha = jQuery(this).text();
			alert(ficha+" | "+casilla);
			jQuery.ajax({
			    url:"cter.php",    
			    type: "POST",
			    data: {
				coordenada: casilla,
				ficha: ficha,
			    },
			    dataType:"text"
			});//fin llamada ajax
		    });//fin evento click
		});//fin bucle each
	    });
	</script>
		
	<?php
		echo "Pulsa una casilla";
		// recoger fila y columna, es decir la coordenada de la ficha, o el id del div
		if (isset($_POST['ficha']) && $_POST['ficha']!=NULL && $_POST['ficha']!="") {//seleccion de la accion
		    $tipo=$_POST['ficha'];//OJO!!! EN EL ARRAY DE CASILLAS, LAS VACIAS TIENEN QUE VENIR CON UN GUION -
		    $this->ficha=$tipo;
		}
		if (isset($_POST['coordenada']) && $_POST['coordenada']!=NULL && $_POST['coordenada']!="") {//seleccion de la accion
		    $this->coordenada=$_POST['coordenada'];
		}else{
		    $this->coordenada="";
		}
		echo $this->coordenada;
		echo $this->ficha;
	}//fin metodo Recoger

}//FIN CLASE Coordenada

class Turno extends Cter{
	private $turno;
	
	public function __construct(){
	    $this->turno=0;
	}
	
	public function Cambiar(){
	    //El cambio debe de hacerlo solo, sin pasarle un parametro
	    $this->turno=$this->NoToca();
	}//fin metodo Cambiar
	
	public function Toca(){
	     return $this->turno;	
	}//fin metodo Toca
	
	public function NoToca(){
	    return ($this->turno+1)%2;
	}//fin metodo NoToca
}//FIN CLASE TURNO


?>
<!---------FIN DEL ARCHIVO (modules/clientes/cclientes.php)------------------->
