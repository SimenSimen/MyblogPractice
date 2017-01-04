$(document).ready(function(){
	$("#registbtn").on('click',function(){
		$("#registpage").slideToggle('slow');
	});

	$('.close').on('click',function(){
		$('.navbar-inverse').fadeOut('fast');
	});

	$('#postbtn').on('click',function(){
		$('#postpage').fadeIn('fast');
	});

	$(this).on('click',function(){
		if($('#collapse-nav').hasClass('in'))
			{
				$('.collapse').collapse('hide');
			}
	});

	$("#loginbtn").on('click',function(){
		$(".navbar-inverse").fadeToggle('fast');
	});
});