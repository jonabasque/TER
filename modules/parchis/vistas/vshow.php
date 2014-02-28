<?php
	if (is_array($datos) && count($datos)>0) {
			echo "ID: ";
			echo $datos[0]['userid'];
			echo "<br/>";
			echo "Nombre: ";
			echo $datos[0]['username'];
			echo "<br/>";
			echo "Email: ";
			if($datos[0]['email']!=null){
				echo $datos[0]['email'];
			}else{
				echo "no hay email!";
			}
			echo "<br/>";
			echo "CP: ";
			echo $datos[0]['cp'];
			echo "<br/>";
			echo "Ciudad: ";
			//echo $datos[0]['idciudad'];
			
			  $sql="Select * from ciudad where idciudad=";
			  $sql.=$datos[0]['idciudad'];
			  //echo $sql;
			  $respuesta=consulta($sql);
			  $datosc=cogedatosciudad($respuesta);
			  echo $datosc[0]['nombre'];
			  $sql="Select * from prov where idprov=";
			  $sql.=$datosc[0]['idprov'];
			  //echo $sql;
			  $respuesta=consulta($sql);
			  $datosp=cogedatosprov($respuesta);
			  echo " (".$datosp[0]['nombre'].")";
			  $sql="Select * from pais where idpais=";
			  $sql.=$datosp[0]['idpais'];
			  //echo $sql;
			  $respuesta=consulta($sql);
			  $datosp=cogedatospais($respuesta);
			  echo " ".$datosp[0]['nombre'];
			
			echo "<br/>";
			echo "Acepta el boletin: ";
			if($datos[0]['boletin']==1){
				echo " Si";
			}else{
				echo " No";
			}
			echo "<br/>";
			echo "Acepta las condiciones: ";
			if($datos[0]['acepta']==1){
				echo " Si";
			}else{
				echo " No";
			}
			echo "<br/>";
			echo "<a href='listadousuarios.php'>Volver</a>";
		}

	?>