$(function(){    
    var menu = $("nav");
    var boton = $(".boton-menu");
    var wallPaper = $("#wallpaper");
    var about = $("#about");

    $("section").css("min-height",($(window).height()-$("header").height()-$("footer").height()-menu.height()));

    wallPaper.css({"height" : ($(window).height() - $("header").height() - menu.height())});

    about.css({"margin-top" : (wallPaper.height()/2) - (about.height()/2)});

    boton.click(function(){

        var tiempoDeAnimacion = 500;
        menu.slideToggle(tiempoDeAnimacion);

    });
});