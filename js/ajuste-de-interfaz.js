$(function(){    
    var menu = $("nav");
    var boton = $(".boton-menu");
    var wallPaper = $("#wallPaper");
    var tarjetaPresentacion = $("#tarjeta-de-presentacion");
    //var contenedorDeBoton = boton.parent();

    if(menu.css("display") == "none")
        $("section").css("min-height",($(window).height()-$("header").height()-$("footer").height()));
    else
        $("section").css("min-height",($(window).height()-$("header").height()-$("footer").height()-menu.height()));

    wallPaper.css({"height" : ($(window).height()-$("header").height())});

    tarjetaPresentacion.css({"margin-top" : (wallPaper.height()/2)-(tarjetaPresentacion.height()/2)})

    boton.click(function(){

        var tiempoDeAnimacion = 500;
        var reglasDeContenedor = {  "backgroundColor" : "",
                                    "color" : ""}
        
         if(menu.css("display") == "none"){

            reglasDeContenedor.backgroundColor = "#fff";
            reglasDeContenedor.color = "#008c9e";
        }
        else{

            reglasDeContenedor.color = "#fff";
            reglasDeContenedor.backgroundColor = "#008c9e";;
        }

        menu.slideToggle(tiempoDeAnimacion);

        contenedorDeBoton.css({"background-color" : reglasDeContenedor.backgroundColor, "color" : reglasDeContenedor.color});
    });
});