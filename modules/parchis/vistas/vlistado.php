		<a href='index.php?module=usuarios&action=register'>Registrar</a><br />
		<form action="index.php?module=usuarios&action=listado" method="post">
			<label for="patron">Buscar:</label>
			<input type="text" name="patron" id="patron"
			value="<?php
				if(isset($_POST['patron']) &&
				$_POST['patron']!=null && $_POST['patron']!=""){
					echo $_POST['patron'];
				}
			?>"
			/>
			<input type="submit" name="submit" id="submit" value="Buscar" />
		</form>
		<br/>
	<?php
	if (is_array($datos)) {
		echo "<table>";
		foreach ($datos as $key => $value) {
			?>
			<tr>
			<td><?php echo $value['userid'];?></td>
			<td><?php echo $value['username']?></td>
			<td><?php echo $value['email'];?></td>
			<td>
			<a href='index.php?module=usuarios&action=show&id=<?php echo $value['userid'];?>'>Mostrar</a>
			<br/>
			<a href='index.php?module=usuarios&action=edit&id=<?php echo $value['userid'];?>'>Editar</a>
			<br/>
			<a href='index.php?module=usuarios&action=delete&id=<?php echo $value['userid'];?>'>Borrar</a>
			<br/>
			</td>
			</tr>
			<?php
		}
		echo "</table>";
	}
?>
