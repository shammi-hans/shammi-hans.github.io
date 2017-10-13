$(window).load(function(){
		$('.slider')._TMS({
			show:0,
			pauseOnHover:false,
			prevBu:'.sprev',
			nextBu:'.snext',
			playBu:'.play',
			duration:400,
			preset:'gSlider',
            easing:"easeInOutExpo",
			pagination:false,//'.pagination',true,'<ul></ul>'
			pagNums:false,
			slideshow:7000,
			numStatus:false,
			banners:false,// fromLeft, fromRight, fromTop, fromBottom
			waitBannerAnimation:false,
			progressBar:'<div class="progbar"></div>'
		})		
 })