
var ruta_preview = "";
var ruta_imagenes = "";


function submitMensaje() {

    $('#mensaje').ajaxForm(function(response) {
        $("#mensajeContenido").html(response);
        submitMensaje();
    });
}


function submitTarjeta() {

    $('#tarjeta').ajaxForm(function(response) {
        $("#tarjetaContenido").html(response);
        submitTarjeta();
    });
}









function mostrarPaso(id_current_bloque, elemento, ruta) {
    // $(".setup_block").slideDown(); 
    $(".setup_block:visible").effect("drop", 500);
    $("" + id_current_bloque).fadeIn();
    // $("" +  id_current_bloque +"_" +paso1_menu).fadeIn();


    $(".menu-paso").removeClass("active");
    $("" + id_current_bloque + "_menu").addClass('active');




    if (ruta !== undefined) {
        $("#contenido_resumen").load(ruta);
        $(".wizard-step").removeClass("active");
        $("#paso1Wizard, #paso2Wizard , #paso3Wizard, #paso4Wizard").addClass("active");
    }



    if (id_current_bloque === '#paso1') {
        $(".wizard-step").removeClass("active");
        $("#paso1Wizard").addClass("active");
    }

    if (id_current_bloque === '#paso2') {
        $(".wizard-step").removeClass("active");
        $("#paso1Wizard, #paso2Wizard ").addClass("active");
    }

    if (id_current_bloque === '#mensaje') {
        $(".wizard-step").removeClass("active");
        $("#paso1Wizard, #paso2Wizard , #paso3Wizard").addClass("active");
    }

    if (id_current_bloque === '#tarjeta') {
        $(".wizard-step").removeClass("active");
        $("#paso1Wizard, #paso2Wizard , #paso3Wizard").addClass("active");
    }
    if (id_current_bloque === '#paso4') {
        $(".wizard-step").removeClass("active");
        $("#paso1Wizard, #paso2Wizard , #paso3Wizard, #paso4Wizard").addClass("active");
    }


}




function init_form_target() {

    $('#form_ciudades').selectpicker();
    $("#form_fechaCumpleanos").datetimepicker({pickTime: false});

    $(".btn-genero").click(function() {
        $(".btn-genero").removeClass("active");
        $(this).addClass('active');
    });

    var genero = $("#form_genero").val();
    if (genero === 0) {
        $("#generoTodos").addClass("active");
    }
    if (genero === 1) {
        $("#generoMasculino").addClass("active");
    }
    if (genero === 2) {
        $("#generoFemenino").addClass("active");
    }
    var genero = $("#form_genero").val();
    if (genero === "0") {
        $("#generoTodos").addClass("active");
    }
    if (genero === "1") {
        $("#generoMasculino").addClass("active");
    }
    if (genero === "2") {
        $("#generoFemenino").addClass("active");
    }


    $('#target').ajaxForm(function(response) {
        $("#paso1Contenido").html(response);
        init_form_target();
    });

}

function init_form_mensaje() {
    $("#form_fechaEnvio").datetimepicker({pickTime: false});
    $('textarea[maxlength]').maxlength({threshold: 100, placement: 'top-right'});

    $('#mensajeForm').ajaxForm(function(response) {
        $("#mensajeContenido").html(response);
        ////submitMensaje();
        init_form_mensaje();
    });
}


function init_form_email() {
    $("#form_fechaEnvio").datetimepicker({pickTime: false});
    $('textarea[maxlength]').maxlength({threshold: 100, placement: 'top-right'});

    $('#emailForm').ajaxForm(function(response) {
        $("#emailContenido").html(response);
        ////submitMensaje();
        init_form_email()
    });
}






function init_form_tarjeta() {
    $('textarea[maxlength]').maxlength({threshold: 100, placement: 'top-right'});

    $("#form_fechaEnvio").datetimepicker({pickTime: false});
    $("input[name='form[fechaEnvio]']").datetimepicker({pickTime: false});
    $("#form_fechaIncio").datetimepicker({pickTime: false});
    $("#form_fechaFin").datetimepicker({pickTime: false});
    $("#form_tipo_tarjeta").trigger('change');

    $('#tarjeta_form').ajaxForm(function(response) {
        $("#tarjetaContenido").html(response);
        /// submitTarjeta();
        init_form_tarjeta();
    });

}




function init_form_tarjeta_email() {
    $('textarea[maxlength]').maxlength({threshold: 100, placement: 'top-right'});

    $("#form_fechaEnvio").datetimepicker({pickTime: false});
    $("input[name='form[fechaEnvio]']").datetimepicker({pickTime: false});
    $("#form_fechaIncio").datetimepicker({pickTime: false});
    $("#form_fechaFin").datetimepicker({pickTime: false});
    $("#form_tipo_tarjeta").trigger('change');

    $('#email_tarjeta_form').ajaxForm(function(response) {
        $("#emailTarjetaContenido").html(response);
        /// submitTarjeta();
        init_form_tarjeta_email();
    });

}






function cargarImagenTarjeta(elemento) {
    $.ajax({
        url: ruta_preview + "/" + $(elemento).val(),
        success: function(response) {
            $("#previewContainer").html("<img style='width:100%;'  src='" + ruta_imagenes + "/" + response.imagen + "'  />");
        }
    });
}


function cargarImagenTarjeta2(elemento) {
    $.ajax({
        url: ruta_preview + "/" + $(elemento).val(),
        success: function(response) {
            $("#previewContainer2").html("<img style='width:100%;'  src='" + ruta_imagenes + "/" + response.imagen + "'  />");
        }
    });
}

function setRutaAjaxPreview(ruta_ajax) {
    ruta_preview = ruta_ajax;
}

$(document).ready(function() {



    init_form_target();
    init_form_mensaje();
    init_form_tarjeta();
    init_form_email();
    init_form_tarjeta_email();

    $(".seleccion_tipo_mensaje").hover(function() {
        $(this).css("cursor", "pointer");
        $(this).css("border-radius", "3px");
        $(this).css("background-color", "#EBEBEB");
    }, function() {
        $(this).css("cursor", "normal");
        $(this).css("border-radius", "3px");
        $(this).css("background-color", "transparent");
    });



    $(".setup_block").hide();
    $(".current_item").show();


    var genero = $("#form_genero").val();
    if (genero === "0") {
        $("#generoTodos").addClass("active");
    }
    if (genero === "1") {
        $("#generoMasculino").addClass("active");
    }
    if (genero === "2") {
        $("#generoFemenino").addClass("active");
    }
    if (genero === 0) {
        $("#generoTodos").addClass("active");
    }
    if (genero === 1) {
        $("#generoMasculino").addClass("active");
    }
    if (genero === 2) {
        $("#generoFemenino").addClass("active");
    }


    $("select[name='form[tipo_tarjeta]']").trigger('change');
});


