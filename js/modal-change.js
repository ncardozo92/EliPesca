$(function(){

    $(".producto").click(function(){

        var dataProducto = $(this).attr("data-producto");

        $.ajax({

            "url" : "producto/get_data_producto",
            "method" : "POST",
            "data" : {dataProducto},
            "dataType" : "json",
            "success" : function(json){

                var modal = $("#info-producto");

                modal.find(".modal-title").html(json.nombre).end();
                modal.find(".modal-body p").html(json.descripcion).end();
                modal.find(".modal-body label").html("precio: $" + json.precio).end();

                var imagen =  modal.find(".modal-body img");
                
                var indice = imagen.attr("src").lastIndexOf("/");

                var pathImagen = imagen.attr("src").substring(0,indice +1);

                imagen.attr("src", pathImagen.concat(json.img));
                imagen.attr("alt", json.nombre);
                imagen.attr("title", json.nombre);


            }
        })
    })
})