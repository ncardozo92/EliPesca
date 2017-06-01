$(function(){

    campos = $("input");
    alertas = $("span.text-danger");
    
    $("form").submit(function(){

        var retorno = true;

        alertas.css("visibility","hidden");

        if(campos.eq(0).val() == "")
                retorno = mostrarAlerta(0);

        if(campos.eq(1).val() == "")
                retorno = mostrarAlerta(1);

        if(campos.eq(3).val() == "" || isNaN(campos.eq(3).val()))
                retorno = mostrarAlerta(2);

        return retorno;
    });
});