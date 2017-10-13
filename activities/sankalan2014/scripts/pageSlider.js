// var currentPage;
// var currentPagePrevLoc;
// var numberOfPages =2;

// function initPageSlider(){

// 	console.log("initPageSlider");
// 	getViewportDimentions();
// 	var pages = $(".pages");

	


// 	currentPage = $("#home").get(0);
// 	currentPagePrevLoc = [viewportwidth/2 - parseInt($(currentPage).css("width"))/2, viewportheight + 150 ];

// 	$(currentPage).css("display","block");
// 	$(currentPage).css("left",viewportwidth/2 - parseInt($(currentPage).css("width"))/2);
// 	$(currentPage).css("bottom",parseInt($(controlPanel).css("height")));

// 	console.log(parseInt($(currentPage).attr("id")));
// $("#0").animate({left:'250px'});
// };

// function openPage(targetPage){

// 	console.log(targetPage);

// 	$(targetPage).css("display","block");

// 	targetPageLoc = [parseInt($(targetPage).css("left")),parseInt($(targetPage).css("bottom"))];

// 	$(targetPage).animate({"left":viewportwidth/2 - parseInt($(currentPage).css("width"))/2, "bottom": parseInt($(controlPanel).css("height")) },{duration:500});
	
// 	$(currentPage).animate({"left":currentPagePrevLoc[0], "bottom": currentPagePrevLoc[1]},500);

// 	// setTimeout(function(){

// 		$(currentPage).css("display","none");
// 	// },500);
	
// 	currentPage = targetPage;
	
// 	currentPagePrevLoc = targetPageLoc;
// }

$(function ()
{

	console.log("initPageSlider");
  var wrapper_ = document.getElementById('wrapper'),
  _this = this;
 //clouds_ = $('#clouds');

  $(wrapper_).addClass('loaded');

  _this.activeMenu = $('a[href=' + window.location.hash.replace('!','') +']').toggleClass('active');
  _this.activePage = $(window.location.hash.replace('!',''));
  rumblePage = _this.activePage.attr("id");
  initRumble(rumblePage);

  var top_  = parseInt(_this.activePage.css('top')), // - (viewportheight - $("#controlPanel").height() - _this.activePage.height() ),//parseInt($("#controlPanel").css("width"))),
      left_ = parseInt (_this.activePage.css('left')), //- (viewportwidth/2 - _this.activePage.width() ),
      list_ = wrapper_.childNodes;
      target_ = null;


  for (var i = 0 ; i<list_.length ; i++){
    if (list_[i].nodeType != 3 ){
      var self = $(list_[i]),
          selfTop = parseInt ( self.css('top')) - top_;
          selfLeft = parseInt ( self.css('left')) - left_;
      self.css({ left: selfLeft, top: selfTop});
    }
  }


  function animatePages_ (target_) {
  	getViewportDimentions();

    


    console.log(_this.activePage.attr("id"));

    for (var i = 0 ; i<list_.length ; i++){
      if (list_[i].nodeType != 3 ){
        var self = $(list_[i]),
            selfTop = parseInt ( self.css('top')) - top_ ;//+ (viewportheight - parseInt($("#controlPanel").css("height")) - parseInt(self.css("height")));
            selfLeft = parseInt ( self.css('left')) - left_ ;// + (viewportwidth/2 - parseInt(self.css("width"))/2);
            // console.log()

        self.animate({ left: selfLeft, top: selfTop}, ANIMATION_TIME, ANIMATION_TYPE,function(){
          console.log("done Animating");
          rumblePage = _this.activePage.attr("id");
          
        });
      }
    }
  }

  function stopAnimation_() {
    $(list_).stop();
    // clouds_.stop();
    // clouds_.find('div').stop();
  }

  $('nav').bind ('click', function(e){




    target_ = e.target;
    console.log("Click");
    while (target_ && target_.tagName != 'A' && target_ != this) { target_ = target_.parentNode;}

    if (target_.tagName == 'A') {

      if (target_.getAttribute ('href') != window.location.hash.replace('!','')){
        var nextPage = $(target_.getAttribute ('href').match(/#[^#]*$/)[0]);
        top_  = parseInt ( nextPage.css('top'));
        left_ = parseInt ( nextPage.css('left'));

        window.location.hash = target_.getAttribute ('href').match(/#[^#]*$/)[0].replace('#','!');

        stopAnimation_();


        if($("#hyperdrive").text() === "Deactivate"){

          // window.location.hash = target_.getAttribute ('href').match(/#[^#]*$/)[0].replace('#','?abc');
          window.location.hash = "!" + _this.activePage.attr("id");
          console.log(target_.getAttribute ('href'));
          e.stopPropagation();
          return;
        }

        // animateClouds_ ();


    // var selected=0;

    // var array=$(".events");
    
    // for(i=0;i<array.length;i++)
    //     {
    //        ++selected;
    //       if(array[i].className.search("no_display")==-1)
    //       {
    //         break;
    //       }
    //     }

    //   if($(".overlay-genie").css("visibility")=="visible")
    //   {
    //     toggleOverlay(selected);
    //   }
     
      animatePages_ (target_);

        if (_this.activeMenu) _this.activeMenu.toggleClass('active');
        _this.activeMenu = $(target_).toggleClass('active');
        _this.activePage = nextPage;
      }
      e.stopPropagation();
      return false;
    }
  })

  $(window).bind('resize',function(){
    if ($(wrapper_).height() > SCREEN_HEIGHT){
      $(list_).css ({'marginTop': $(wrapper_).height()/10})
      	$('#home').removeClass('startPageLowRes')
		$('#home').addClass('startPageHiRes');
		$('#what').removeClass('whatPageLowRes')
		$('#what').addClass('whatPageHiRes');
    } else{
      $(list_).css ({'marginTop':0});
      $('#home').removeClass('startPageHiRes')
		$('#home').addClass('startPageLowRes');
	    $('#what').removeClass('whatPageHiRes');
		$('#what').addClass('whatPageLowRes');
    }
  }).trigger('resize');
});