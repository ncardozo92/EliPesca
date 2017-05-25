$(function(){

    $("#selector-categorias").change(function(){

        var categoria = $(this).val();

        window.location = "productos?categoria=" + categoria;
    });

});