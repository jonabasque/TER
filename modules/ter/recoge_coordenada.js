$(function(){
	jQuery(".casillas").each(function(){
	    jQuery(this).on("click", function(){
		var casilla = jQuery(this).attr("id");
		var ficha = jQuery(this).text();
		alert(ficha+" | "+casilla);
		jQuery.ajax({
		    url:"index.php?module=cter",    
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