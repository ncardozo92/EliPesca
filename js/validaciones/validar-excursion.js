$(function(){

    $("form").submit(function(){


        var fecha = $("#fecha");
        var descripcion = $("#descripcion");
        var destino = $("#destino");

        var validado = true;

        if(fecha.val() == ""){

            fecha.parent().find("span.text-danger").css("visibility","visible");
            validado = false;
        }

        if(descripcion.val().length >250){

            descripcion.parent().find("span.text-danger").css("visibility","visible");
            validado = false;
        }

        if(destino.val() == ""){
            
            destino.parent().find("span.text-danger").css("visibility","visible");
            validado = false;
        }
        

        return validado;
    });

});