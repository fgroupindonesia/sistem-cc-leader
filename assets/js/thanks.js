jQuery(function($) {

	$('body').on('click', '#btn-finished', function(){

		window.location = "/dashboard";

	});

	// automatic 3detik lewat 
	setTimeout(function(){ 

		window.location = "/dashboard";

	 }, 3000);



});