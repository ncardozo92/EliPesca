$(function(){

    usuario = $("#usuario");
    password = $("#password");
    alertas = $("span.text-danger");

    $("form").submit(function(){

            var retorno = true;

            alertas.css("visibility","hidden");

            if(usuario.val() ==""){
                retorno = mostrarAlerta(0);
            }

            if(password.val() ==""){
                retorno = mostrarAlerta(1);
            }
            
            return retorno;    
    });
});