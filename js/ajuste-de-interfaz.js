$(function(){    
    var menu = $("nav");
    var boton = $(".boton-menu");
    var wallPaper = $("#wallpaper");
    var about = $("#about");

    if($(window).width() >= 768)
        $("section").first().css("min-height",($(window).height()-$("header").height()-$("footer").height()-menu.height()));
    else
        $("section").first().css("min-height",($(window).height()-$("header").height()));

    wallPaper.css({"height" : ($(window).height() - $("header").height() - menu.height())});

    about.css({"margin-top" : (wallPaper.height()/2) - (about.height()/2)});

    boton.click(function(){

        var tiempoDeAnimacion = 500;
        menu.slideToggle(tiempoDeAnimacion);

    });
});