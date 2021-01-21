$(document).ready(function () {

    $('#loginModal').click(function(){
        $('#loginModal').modal('show');
        
    })
    $('#iniciar').click(function(){
        $('#registerModal').modal('show');
        $('#loginModal').modal('hide');
        
    })
    $('#registrar').click(function(){
        $('#loginModal').modal('show');
        $('#registerModal').modal('hide');
        
        
    })

    $('#registerModal').click(function(){
        $('#registerModal').modal('show');
        
    })

   
        $('.carousel').carousel({
          interval: 2000
        });
      
    
});