$(document).ready(function() {   
  		
        $(window).resize(function(){
                  var aviso = $('.aviso');
                  aviso.css({ 
                      'left': ($(window).width() / 2 - $(aviso).width() / 2) + 'px', 
                      'top': ($(window).height() / 2 - $(aviso).height() / 2) + ($(window).scrollTop()) + 'px'
                  });
                });
        
        $(window).resize();

        $('.aviso').click(function(e){
            e.preventDefault();
          if ( $('.aviso').is(":visible") ) {
            $('.aviso').fadeOut('slow');
          }else {
            $('.aviso').fadeIn('slow');
          }
        });
});