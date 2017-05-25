$(function(){

    campos = $("input");
    alertas = $("span.text-danger");
    
    $("form").submit(function(){

        var retorno = true;

        alertas.css("visibility","hidden");

        if(campos.eq(1).val() == "")
                retorno = mostrarAlerta(0);

        if(campos.eq(2).val() == "")
                retorno = mostrarAlerta(1);

        if(campos.eq(4).val() == "" || isNaN(campos.eq(4).val()))
                retorno = mostrarAlerta(2);

        return retorno;
    });
});