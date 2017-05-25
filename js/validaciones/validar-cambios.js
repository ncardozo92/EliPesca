$(function(){

    inputs = $("input");
    alertas = $(".text-danger");

    $("form").submit(function(){

        var retorno = true;

        alertas.css("visibility","hidden");

        if(inputs.eq(1).val() == "" || inputs.eq(1).val().lenght < 5)
            retorno = mostrarAlerta(0);

        if(inputs.eq(3).attr('disabled') != 'disabled'){
            if((inputs.eq(3).val() != inputs.eq(4).val()) || (inputs.eq(3).val().lenght<4) || (inputs.eq(3).val() == "" || inputs.eq(4).val() == ""))
                retorno = mostrarAlerta(1);
        }

        return retorno;
    });
});