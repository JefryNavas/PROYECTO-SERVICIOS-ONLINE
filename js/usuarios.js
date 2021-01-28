$(document).ready(function () {

    
    $('#experienciabtn').click(function(){
        $('#trabajos_realizados').hide();
        $('#experiencia').show();

    })
    $('#trabajobtn').click(function(){
        $('#experiencia').hide();
        $('#trabajos_realizados').show();

    })

    
});