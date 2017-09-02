$(function(){

    campos = $("input");
    alertas = $("span.text-danger");
    
    $("form").submit(function(){
       
        var retorno = true;
        var inputs = $(this).find("input");
        var selects = $(this).find("select");
 
        $(this).find(".text-danger").css("visibility","hidden");

                inputs.each(function(){

                        var current = $(this);
                        var currentType = current.attr("type");
                        var currentVal = current.val();

                        switch(currentType){
                                case "text":
                                if(currentVal.length == 0){
                                        retorno = false;
                                        current.parent().find(".text-danger").css("visibility","visible");
                                }
                                break;
                                        
                                case "number":
                                if(currentVal.length == 0 || isNaN(currentVal)){
                                        retorno = false;
                                        current.parent().find(".text-danger").css("visibility","visible");
                                }
                                break;
                        }
           
                });

        if(selects.eq(0).val() == ""){
                selects.parent().find(".text-danger").css("visibility","visible");
                retorno = false;
        }

        return retorno;
    });
});