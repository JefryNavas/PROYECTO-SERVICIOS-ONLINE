$(document).ready(function () {

    
    $('#contratarservicio').click(function(){
        $('#calificar').hide();
        $('#contratar').show();
        
        return false;
    })
    $('#calificarusuario').click(function(){
        $('#calificar').show();
        $('#contratar').hide();
        
        return false;
    })

    
});