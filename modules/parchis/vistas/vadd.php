    	<form name="register_user" id="register_user" action="index.php?module=usuarios&action=register" method="post">
                <!--USUARIO-->
    		<label for="user[usuario]">Nombre de Usuario.<br/><?php
					    			if (isset($errores['usuario'])) {
										imprime_fallos($errores['usuario']);	
									} 
					    			
					    			?>
                </label>
    		<input type="text" name="user[usuario]" id="usuario" tabindex="1" value="<?php
								    			if (isset($user['usuario'])) {
													imprimesinoesnull($user['usuario']);	
												}
								    			
								    			?>"
    		 />	
                 <br/>
                 

                 <!--CONTRASEÑA-->
    		 <label for="user[pass]">Contraseña.<br/><?php 
					    		 if (isset($errores['pass'])) {
					    			imprime_fallos($errores['pass']);
								 }
					    			?>
                 </label>
    		 <input type="password" name="user[pass]" id="pass" value="" />
                 <br/>


                 <!--CONTRASEÑA 2-->
    		 <label for="user[pass2]">Repita Contraseña.<br/><?php
					    		 	if (isset($errores['pass2'])) { 
					    			imprime_fallos($errores['pass2']);
					    			}?>
                 </label>
    		 <input type="password" name="user[pass2]" id="pass2" value="" />
                 <br/>


                 <!--EMAIL-->
    		 <label for="user[email]">Email.<br/><?php
				    		 	if (isset($errores['email'])) { 
				    				imprime_fallos($errores['email']);
				    			}?>
                 </label>
    		 <input type="text" name="user[email]" id="email" value="<?php
						    		 	if (isset($user['email'])) { 
						    				imprimesinoesnull($user['email']);
						    			}?>" />
                 <br/>
    		

                 <!--CIUDAD-->
    		 <label for="user[ciudad]">Ciudad.<br/><?php
				    		 	if (isset($errores['prov'])) { 
				    				imprime_fallos($errores['prov']);
				    			}?>
                </label><?php
				echo " <select name='user[idciudad]'>";
				foreach ($ciudades as $key => $value) {
					echo "<option value=".$value['id'];
	    		 	if (isset($user['idciudad']) &&
	    		 	$user['idciudad']==$value['id']) {
					 	 echo " selected='true' ";
					}
	    		 	echo ">".$value['nombre']."</option>";
				}
				echo "</select><br/>";
    		        ?>

                 <!--C. POSTAL-->
    		 <label for="user[cp]">Código Postal.<br/><?php
    		 	if (isset($errores['cp'])) { 
    				imprime_fallos($errores['cp']);
    			}?></label>
    		 <input type="text" name="user[cp]" id="cp" value="<?php
					    		 	if (isset($user['cp'])) { 
					    				imprimesinoesnull($user['cp']);
					    			} ?>" />
                <br/>
    		 

                 <!--BOLETIN-->
    		 <label for="user[envio]">Envio de boletín.<br/><?php
    		 	if (isset($errores['envio'])) { 
    				imprime_fallos($errores['envio']);
    			}?></label>
    		 <label>Sí</label>
    		 <input type="radio" name="user[boletin]" id="envio" value="si" <?php
								    		 if (isset($user['boletin'])
								    		 &&$user['boletin']==1) { 
								    		 	echo "checked='true'";
								    		 }?>/>
    		 <label>No</label>
    		 <input type="radio" name="user[boletin]" id="envio" value="no" <?php
								    		 if (isset($user['boletin'])
								    		 &&$user['boletin']==0) { 
								    		 	echo "checked='true'";
								    		 }?>/>
                 <br/>


		<!--CONDICIONES-->
    		 <label for="user[cond]">Acepta las condiciones de uso?<br/><?php
							    		 	if (isset($errores['cond'])) { 
							    				imprime_fallos($errores['cond']);
							    			}?>
                 </label>
    		 <input type="checkbox" name="user[cond]" id="cond" value="si" <?php
								    		 if (isset($user['cond'])) { 
								    		 	checkedsimanda($user['cond']);
								    		 }?>/>
                 <br/>

                 <!--SUBMIT-->
    		 <input type="submit" name="user[submit]" id="submit" value="Enviar" />
                 <br/>
    	</form>

