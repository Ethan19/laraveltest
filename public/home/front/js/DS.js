$(function(){
	funBackOrFront();
	yearFn()
	$('.J_menu').on('click',function(){
		$('.anim_08').animate({
		    left: "0",
		    width: "toggle"
		  },1000);
		$('#nav').hide().next('.i_dele_m').show();
	})
	$('.menu-list').on('click',function(){
		$(this).parents('.anim_08').hide();
		$('#nav').show().next('.i_dele_m').hide();

	})
	$('.i_dele_m').on('click',function(){
		$(this).hide();
		$('.anim_08').hide();
		$('#nav').show();
	})
	//元素翻转
    function funBackOrFront() {
		$(".s5-anim").find('img').click(function() {
			//$(this).addClass('flipX');
	        if ($(this).hasClass("flipX")) {
	            $(this).addClass('flipXRever').removeClass('flipX');
	        } else {
	            $(this).addClass('flipX').removeClass('flipXRever');
	        }
	   	});
	};
	function yearFn(){
		var year = $('.year');
		$('.month_radius').each(function(){
			var left = $($('.month_radius')[0]).offset().left - 38;
			year.css('left',left+'px');
			$(this).on('click',function(){
				left = $(this).offset().left - 38;
				year.animate({
				    'left': left
				  },400);
				$(this).addClass('active').parent().siblings().find('.month_radius').removeClass('active');
			})
		})

	}
	
});
