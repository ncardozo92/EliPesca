$(function(){

/*
    usuario = $("#usuario");
    password = $("#password");
    alertas = $("span.text-danger");

    $("form").submit(function(){

            var retorno = true;

            alertas.css("visibility","hidden");

            if(usuario.val() ==""){
                console.log(usuario.val().length);
                retorno = mostrarAlerta(0);
            }

            if(password.val() ==""){
                retorno = mostrarAlerta(1);
            }
            
            return retorno;    
    });
*/
    $(".login-user-form").submit(function(){

        $(this).find(".text-danger").css("visibility","hidden");

        var resultado = true;
        var inputs = $(this).find("input");
        var condiciones = {

           "minNameSize" : 5,
           "maxNameSize" : 12,
           "minPasswordSize" : 4,
           "maxPasswordSize" : 10
        };

        

        inputs.each(function(){

            var current = $(this);
            var currentType = current.attr("type");
            var currentVal = current.val();

            switch(currentType){
                case "text":
                    if(currentVal.length < condiciones.minNameSize ||currentVal.length > condiciones.maxNameSize){
                        resultado = false;
                        current.parent().find(".text-danger").css("visibility","visible");
                    }
                    break;
                            
                case "password":
                    if(currentVal.length < condiciones.minPasswordSize ||currentVal.length > condiciones.maxPasswordSize){
                        resultado = false;
                        current.parent().find(".text-danger").css("visibility","visible");
                    }
                    break;
            }
        });
        return resultado;
    });

    $(".user-form").submit(function(){

        var resultado = true;

        $(this).find(".text-danger").css("visibility","hidden");

        var userName = $("[name='usuario']");
        var password1 = $("[type='password']").eq(0);
        var password2 = $("[type='password']").eq(1);
        var condiciones = {

           "minNameSize" : 5,
           "maxNameSize" : 12,
           "minPasswordSize" : 4,
           "maxPasswordSize" : 10
        };


        if(userName.val().length < condiciones.minNameSize ||userName.val().length > condiciones.maxNameSize){
            resultado = false;
            userName.parent().find(".text-danger").css("visibility","visible");
        }

         if(password1.val().length < condiciones.minPasswordSize ||password1.val().length > condiciones.maxPasswordSize || password1.val() != password2.val()){
            resultado = false;
            password2.parent().find(".text-danger").css("visibility","visible");
        }

        console.log(resultado);
        return resultado;
    });
 
});
