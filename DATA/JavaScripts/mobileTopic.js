// JavaScript Document
$(document).ready(function(e) {
    $(document).on('focusin', '.writtingBox textarea', function(e){
		$('nav').fadeOut(500);
		$('footer').fadeOut(500);	
	});
	$(document).on('focusout', '.writtingBox textarea', function(e){
		$('nav').fadeIn(500);
		$('footer').fadeIn(500);	
	});
});