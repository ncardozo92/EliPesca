$(function(){

    var productos = []; //almacena a todos los producto que son traidos
    var listaProductos = $("#lista-productos"); //la tabla contenedora

    function insertarCabezeraTabla(){

        listaProductos.html("<tr><th>id</th><th>nombre</th><th>descripcion</th><th>categoria</th><th>imagen</th><th>precio</th></tr>");
    }

    function insertarFilaProducto(item){
                
            listaProductos
                .append( "<tr><td>"+item.id+"</td><td>"+item.nombre+"</td><td>"+item.descripcion+
                    "</td><td>"+item.categoria+"</td><td>"+item.imagen+"</td><td>"+item.precio+"</td></tr>");
        }
    
     $("#buscar").on("keyup",function(){

        var valor = $(this).val();

        insertarCabezeraTabla();

        if(valor == ""){
            productos.forEach(function(item){
                listaProductos
                    .append( "<tr><td>"+item.id+"</td><td>"+item.nombre+"</td><td>"+item.descripcion+
                    "</td><td>"+item.categoria+"</td><td>"+item.imagen+"</td><td>"+item.precio+"</td></tr>");
            });
        }
        else{

            productos.forEach(function(item){

                if(item.nombre.includes(valor))
                    insertarFilaProducto(item);
            });
        }
     });

    $.ajax({

        "url" : "get_productos",
        "type" : "GET",
        "dataType" : "json",
        "success" : function(responce){
            
            productos = responce;
            insertarCabezeraTabla();
            productos.forEach(insertarFilaProducto);
        },
        "error" : function(){
                alert("hubo un problema al buscar los productos, por favor intentelo más tarde");
            }
    });
       
});
