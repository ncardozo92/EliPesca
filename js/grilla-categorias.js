$(function(){

    $("form").submit(function(event){

        event.preventDefault();

        var categoria = $("#nombre-categoria");
        var grillaCategorias = $("#grilla-categorias");

        $.ajax({

            url: "../categoria/guardar_categoria",
            method: "post",
            data: {categoria: categoria.val()},
            dataType :"json",
            success: function(json){
                
                grillaCategorias.find("tr").slice(1).remove();
                
                categoria.val("");
                json.forEach(function(item){

                    grillaCategorias.append("<tr><td>"+ item.id +"</td><td>"+ item.nombre +"</td><td><label class='label label-danger' data-categoria="+ item.id +"><span class='glyphicon glyphicon-remove'></span></label></td></tr>");
                });
            },
            error: function(){

                console.log("error");
            }

        });
    });

    $(".eliminar").click(function(){

        var idCategoria = $(this).data("categoria");

        $(this).parent().parent().css("display","none");
        
        $.ajax({

            url: "../categoria/eliminar_categoria",
            method: "post",
            data: {idCategoria: idCategoria},
            success: function(data){
            }
        });
        
    });
});