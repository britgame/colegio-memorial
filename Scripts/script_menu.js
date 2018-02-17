$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */
	
	$('.ir_topo1').click(function(e){

										  
		// If a link has been clicked, scroll the page to the link's hash target:
		
		$.scrollTo( this.hash || 0, 500);
		e.preventDefault();
	});

});

jQuery("document").ready(function($){
    
    var menu_top = $('.menu_top');
	var logo = $('.logo_menu');
	var top = $('.ir_topo1');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 215) {
            menu_top.addClass("menu_nav");
			logo.addClass("logo_menu_fixo");
			top.addClass("ir_topo2");
        } else {
            menu_top.removeClass("menu_nav");
			logo.removeClass("logo_menu_fixo");
			top.removeClass("ir_topo2");
        }
    });
 
});