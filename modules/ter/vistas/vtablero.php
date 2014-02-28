<div id="tablero">
<?php
/*
for($i=0;$i<3;$i++){
	$f=i++;
	for($j=0;$j<3;$j++){
	$c=$j++;
	echo "<div class='casillas' id='f".$f."c".$c."'>".$this->posiciones[0][0]."</div>";
	}
	echo "<br />";
}
*/
?>
<div class="casillas" id="f1c1"><?php echo $this->posiciones[0][0]; ?></div>
<div class="casillas" id="f1c2"><?php echo $this->posiciones[0][1]; ?></div>
<div class="casillas" id="f1c3"><?php echo $this->posiciones[0][2]; ?></div><br/>
<div class="casillas" id="f2c1"><?php echo $this->posiciones[1][0]; ?></div>
<div class="casillas" id="f2c2"><?php echo $this->posiciones[1][1]; ?></div>
<div class="casillas" id="f2c3"><?php echo $this->posiciones[1][2]; ?></div><br />
<div class="casillas" id="f3c1"><?php echo $this->posiciones[2][0]; ?></div>
<div class="casillas" id="f3c2"><?php echo $this->posiciones[2][1]; ?></div>
<div class="casillas" id="f3c3"><?php echo $this->posiciones[2][2]; ?></div><br />

</div>