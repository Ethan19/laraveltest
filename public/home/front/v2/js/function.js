	$(function(){
		clearInterval(timer);
		var timer = setInterval(function(){
			$('#main').show();
			$('.ds_1').slideUp(1500);
		},5000);
		
		$("#main").windowScroll({
            'choose': 0,
            'verticalSpeed': 1, 
            'objControlUl': '#main .stageControl',
            'list': '#main .stage',
            'crash': true,
            //'toTop': '.toTop',
            'toBottom': '.arrow_down',
            'liHover': 'stageSelect'
        });
        scrollH();
        moverBallFn();
	})
function scrollH(){
	var left = $('.toLeft');
    var right = $('.toRight');
    var length=$('.ds_5_type').length;
    var i=0;
    var w = $('.scroll_h').width()*length;
    var list_w = parseInt($('.ds_5_type').width());
    $('.scroll_list').css('width',w+'px');

    $(left).on('click',function(){
    	if(i==0){
    		return false;
    	}else{
    		i--;
    		if(i==0){
    			$('.scroll_list').animate({
        			'margin-left':0
        		})
        		return false;
    		}
    		var left = parseInt($('.scroll_list').css('margin-left'));

    		$('.scroll_list').animate({
    			'margin-left':left+(list_w+10)+'px'
    		})
    	}
    })
    $(right).on('click',function(){
    	if(i>(length-1)){
    		return false;
    	}else{
    		if(i==length-2) return false;
    		i++;
    		
    		$('.scroll_list').animate({
    			'margin-left':-(list_w*i)-(10*i)+'px'
    		})
    	}
    	
    })
}
function moverBallFn(){    
	var left = ( $(window).width() - $('.ds_6_box').width())/2;
	$('.ds_6_box').css({
    	'margin-left':left+'px'
    })
}   