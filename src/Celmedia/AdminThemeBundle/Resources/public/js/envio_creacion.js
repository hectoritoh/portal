
$(document).ready(  function(){

	/// configuracion de campos


});




function initControls(){

	$("#form_tipo_tarjeta").change(  function(){
		var tipo_tarjeta = $(this).val(); 
		$.ajax({
			url: Routing.generate('celmedia_admin_theme_get_tipo_mensaje_image', { id_tipo : tipo_tarjeta }) , 
			success: function(  response  ){
				$("#envioDetalle").html(  response );
			}
		}); 
	}); 

}




function setTipoDeEnvio( tipo_mensaje ,  nombre_tipo_envio ){
	
	$("#mensajeTipoEnvio").html("Selecionado el tipo de envio \" "  +  nombre_tipo_envio  + " \" "); 
	$.ajax({
		url: Routing.generate('celmedia_admin_theme_get_tipo_mensaje_form', { id_tipo : tipo_mensaje }) , 
		success: function( response){
			$("#envioContenido").html(response);
			initControls(); 
		},
		error:function( error ){
			alert("error en el request");
		} 
	});
}



function setCampana(  nombre_campana ){
	$("#envioNombre").html("El envio se llama  \" "  +  nombre_campana + " \" "); 
	$("#envioContenido").hide('slow'); 	
}


