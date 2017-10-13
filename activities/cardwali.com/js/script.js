$(document).ready(function() {
    
   	//carousel    
    jQuery('#mycarousel').jcarousel();
    
    //button
   	$('.button ')
	.hover(function(){
		$(this).find('span')
		.stop().animate({width:'100%', left:'0%', top:'0%',height:'100%'}, {duration:200})
	}, function(){
		$(this).find('span')
		.stop().animate({width:'0', left:'50%',top:'50%',height:'0'}, {duration:200})
	})
    
    //icons
    $('#icons .img_act').css({opacity:0})
	
	$('#icons a').hover(function(){
		$(this).find('.img_act').stop().animate({opacity:1})						 
	}, function(){
		$(this).find('.img_act').stop().animate({opacity:0})						 
	})
    
    //zoomImg 
   	$('.zoomImg').fadeTo(400, 0)
    
	$('.zoomImg').hover(function(){
          $(this).stop().fadeTo(400, 0.6)
	}, function(){
        $(this).stop().fadeTo(400, 0)
	}) 
  
    
/*SUPERFISH MENU*/   
    $('.menu #menu').superfish({
	   delay: 100,
	   animation: {
	   opacity: 'show'
	   },
       speed: 'slow',
       autoArrows: false,
       dropShadows: false,
    });
})



$(window).load(function() {
    
    var linkpage = 0;
    
   	var content=$('#content'),
    nav=$('.menu');
	nav.navs({
		useHash:true,
		hoverIn:function(li){
    		    $('a > div',li).stop().animate({top:"-40px"},400, "easeOutExpo")
                $('a > strong',li).stop(true, true).animate({color:"#FFF",top:"80px"},550, "easeOutExpo")
                $('a > span',li).stop(true, true).animate({color:"#bccc3f",top:"8px"},400, "easeOutCirc")    
                
                if (linkpage == 0){
                    $('a > .im',li).stop(true).delay(_delay).animate({height:"237", top:"-237", "margin-left":"0"},550, "easeOutExpo") 
                    }
		},
		hoverOut:function(li){
			if (!li.hasClass('with_ul',li) || !li.hasClass('sfHover')) {
				$('a > div',li).stop().animate({top:"-120px"},350, "easeInExpo")
                $('a > strong',li).stop(true, true).delay(250).animate({color:"#FFF",top:"28px"},625, "easeOutExpo")
                $('a > span',li).stop(true, true).animate({color:"#bccc3f",top:"-42px"},325, "easeInExpo")
               // if (linkpage == 0){
                    $('a > .im',li).stop(true).animate({height:"0", top:"0", "margin-left":"100"},550, "easeOutExpo")                    
                 //   }
			}
		}				
	})	
    
    $('.submenu_1>li>a ').bind('click',function(e){
        $(this).parent().parent().addClass('with_pic');
        $(this).parent().parent().siblings('a').find('.im').stop(true).animate({height:"0", top:"0", "margin-left":"100"},550, "easeOutExpo");
    });
    
    $('.submenu_2>li>a ').bind('click',function(e){
        $(this).parent().parent().parent().parent().addClass('with_pic');
        $(this).parent().parent().parent().parent().siblings('a').find('.im').stop(true).animate({height:"0", top:"0", "margin-left":"100"},550, "easeOutExpo");
    });
    
    var _delay = 0;
    
    $('#content').tabs({

		preFu:function(_){
            
			_.li.stop(true, true).css({left:1800, display:"block"},700,"easeInCirc")		
		}
		,actFu:function(_){
		  linkpage = _.n;
          
			if(_.curr){	
			 if(_.curr.index() == 0){
  		            $('.menu').stop().delay(500).animate({top:"250px"});
                    $('#logo').stop().delay(600).animate({top:"90px"},500,"easeInOutExpo")
                    $('#menu > li').eq(linkpage).find('a .im').stop(true).delay(500).animate({height:"237", top:"-237", "margin-left":"0"},550, "easeOutExpo") 
			 
                    
             }else{
                $('#logo').stop().animate({top:"0px"},500,"easeInOutExpo");
                $('.menu').stop().animate({top:"0px"},500,"easeInOutExpo");
                
                if (_.pren == undefined){
                    $('#menu > li').eq(_.n).find('a .im').stop(true).animate({height:"0", top:"0", "margin-left":"100"},550, "easeOutExpo") 
                 }
                 
                if (_.pren == 0){
                    $('#menu > li').eq(_.pren).find('a .im').stop(true).animate({height:"0", top:"0", "margin-left":"100"},550, "easeOutExpo") 
			 
                }
             }
                 
				_.curr.css({left:0},0).css({left:-1800},0).css({display:"block"}).stop(true, true).delay(480).animate({left:0},700,"easeOutExpo")
                overButton = _.curr.index()
                
            }
			if(_.prev){
                if (_.pren == 0){
                    $('#menu > li').eq(_.n).find('a .im').stop(true).animate({height:"0", top:"0", "margin-left":"100"},550, "easeOutExpo") 
			 
                } else {
                }
				_.prev.stop(true, true).animate({left:1800},700,"easeInExpo", function(){ _.prev.css({display:"none"})})
                outButton = _.prev.index()
            }  
		}
	})	
	$('nav')
		.navs({
			useHash:true
			,
		})
		.navs(function(n){			
			$('#content').tabs(n)
		})
})