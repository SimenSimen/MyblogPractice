$(document).ready(function(){
	$("#registbtn").on('click',function(){
		$("#registpage").slideToggle('slow');
	});

	$('.close').on('click',function(){
		$('#postpage').slideUp('slow');
	});

	$('#postbtn').on('click',function(){
		$('#postpage').fadeIn('fast');
	});
});