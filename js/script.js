/*----------------------------------------------------*/
/* CV
------------------------------------------------------ */

$(window).load(function(){

    $('.loader').fadeOut();    
    $('#preloader').delay(350).fadeOut('slow');    
    $('body').delay(350);   
	
});


 jQuery(document).ready(function($) {
	
/*----------------------------------------------------*/
/* Initializing jQuery Nice Scroll
------------------------------------------------------ */
$("html").niceScroll({
    cursorcolor:"#11abb0", // Set cursor color
    cursorwidth: "8", // Sety cursor width
    cursorborder: "", // Set cursor border color, default left none
  cursoropacitymin: "0.2"
});


/*----------------------------------------------------*/
/* FitText Settings
------------------------------------------------------ */

    setTimeout(function() {
	   $('h1.responsive-headline').fitText(1, { minFontSize: '28px', maxFontSize: '72px' });
	 }, 100);


/*----------------------------------------------------*/
/* Smooth Scrolling
------------------------------------------------------ */

   $('.smoothscroll').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 800, 'swing', function () {
	        window.location.hash = target;
	    });

	});


/*----------------------------------------------------*/
/* Appear Animation
------------------------------------------------------*/
  new WOW().init();

/*----------------------------------------------------*/
/* Parallax for Header Content
------------------------------------------------------*/
$(window).scroll(function(e){
  parallax();
});


function parallax() {
  var scrollPosition = $(window).scrollTop();
  $('.banner').css('margin-top', (0 - (scrollPosition * .8)) + 'px');
}

/*----------------------------------------------------*/
/* Highlight the current section in the navigation bar
------------------------------------------------------*/

	var sections = $("section");
	var navigation_links = $("#left-nav a");

	sections.waypoint({

      handler: function(event, direction) {

		   var active_section;

			active_section = $(this);
			if (direction === "up") active_section = active_section.prev();

			var active_link = $('#left-nav a[href="#' + active_section.attr("id") + '"]');

         navigation_links.parent().removeClass("current");
			active_link.parent().addClass("current");
			if(active_link.parent().hasClass("jq-cv")) {
				  $('.jq-close-menu').addClass("bg-black");
			  } else {
				  $('.jq-close-menu').removeClass("bg-black");
			  }
			new WOW().init();

		},
		offset: '35%'

	});


/*----------------------------------------------------*/
/*	Make sure that #header-background-image height is
/* equal to the browser height.
------------------------------------------------------ */

   $('header').css({ 'height': $(window).height() });
   $(window).on('resize', function() {

        $('header').css({ 'height': $(window).height() });
        $('body').css({ 'width': $(window).width() })
   });


/*----------------------------------------------------*/
/*  On scroll blur header
------------------------------------------------------*/
   (function() {
      $(window).scroll(function() {
        var oVal;
        oVal = $(window).scrollTop() / 100;
        return $(".header-overlay").css("opacity", oVal);
        });

      }).call(this);



/*----------------------------------------------------*/
/*	Fade In/Out Primary Navigation
------------------------------------------------------*/

  $('#menu').click(function(){
    $(document.body).toggleClass("show-menu");
    $('.menu').toggleClass("close-menu");
  });


  var Menu = {
    
    el: {
      ham: $('.menu'),
      menuTop: $('.menu-top'),
      menuMiddle: $('.menu-middle'),
      menuBottom: $('.menu-bottom')
    },
    
    init: function() {
      Menu.bindUIactions();
    },
    
    bindUIactions: function() {
      Menu.el.ham
          .on(
            'click',
          function(event) {
          Menu.activateMenu(event);
          event.preventDefault();
        }
      );
    },
    
    activateMenu: function() {
      Menu.el.menuTop.toggleClass('menu-top-click');
      Menu.el.menuMiddle.toggleClass('menu-middle-click');
      Menu.el.menuBottom.toggleClass('menu-bottom-click'); 
    }
  };

  Menu.init();

/* Animate Left Menu */ 

/*----------------------------------------------------*/
/*  Owl Carousel
/*----------------------------------------------------*/


    // $(document).ready(function() {
     
    /*
    $("#testimonial-slides").owlCarousel({
     
    navigation : false, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true
     
    // "singleItem:true" is a shortcut for:
    // items : 1,
    // itemsDesktop : false,
    // itemsDesktopSmall : false,
    // itemsTablet: false,
    // itemsMobile : false
     
    });
    */
     
    // });


/*----------------------------------------------------*/
/*  Google Map
/* Lado Sarai - Lat: 28.524694, Long: 77.191502
/* Marathahalli - Lat: 12.955804, Long: 77.709715

// commenting down code as GMaps got uotdated & using HTML embedded code for Gmap
------------------------------------------------------
    // main directions
      map = new GMaps({
        el: '#map', lat: 12.955804, lng: 77.709715, zoom: 13, zoomControl : true, 
        zoomControlOpt: { style : 'SMALL', position: 'TOP_LEFT' }, panControl : false, scrollwheel: false
      });
    // add address markers
    map.addMarker({ lat: 12.955804, lng: 77.709715, title: 'Shammi Hans',
      infoWindow: { content: '<p>Near Marathahalli Bridge,<br>Bengaluru, Karnataka, India</p>' } });

/*----------------------------------------------------*/
/*	contact form
------------------------------------------------------*/

   $('form#contactForm button.submit').click(function() {

      $('#image-loader').fadeIn();

      var name = $('#contactForm #contactName').val();
      var email = $('#contactForm #contactEmail').val();
      var subject = $('#contactForm #contactSubject').val();
      var message = $('#contactForm #contactMessage').val();

      var data = 'name=' + name + '&email=' + email +
               '&subject=' + subject + '&message=' + message;

      $.ajax({

	      type: "POST",
	      url: "sendEmail.php",
	      data: data,
	      success: function(msg) {

            // Message was sent
            if (msg == 'OK') {
               $('#image-loader').fadeOut();
               $('#message-warning').hide();
               $('#contactForm').fadeOut();
               $('#message-success').fadeIn();   
            }
            // There was an error
            else {
               $('#image-loader').fadeOut();
               $('#message-warning').html(msg);
	            $('#message-warning').fadeIn();
            }

	      }

      });
      return false;
   });


});


/*----------------------------------------------------*/
/*	Modal Popup
------------------------------------------------------*/

    $('a.hid-btn').magnificPopup({

       type:'inline',
       fixedContentPos: false,
       removalDelay: 200,
       showCloseBtn: true,
       mainClass: 'mfp-fade'

    });

	$(".item-wrap-a").on('click', function (e) {
		var _this = $(this);
		var url = _this.attr("url");
    if (url) {
  		$("#modal-loader").show();
  		$("#ifrmId").hide();
  		$("#ifrmId").load(function() {
  			$("#modal-loader").hide();
  			$("#ifrmId").show();
  		});
  		$("#ifrmId").attr("src",url);
  		$("#live-link").attr("href",url);
  		$('a.hid-btn').click();
    }
	});
    
	$(document).on('click', '.popup-modal-dismiss,.mfp-close', function (e) {
    		closeModal(e);
    });

	$(".mfp-container").bind("click", function(e) {
		if($(e.target).parents(".description-box").length == 0 || $(e.target).parents(".item-wrap").length == 0 ){
			closeModal(e);
		}
  
	});

	function closeModal(e){
			e.preventDefault();
    		$.magnificPopup.close();
			$("#ifrmId").html('').attr('src',null).hide();
			$("#live-link").attr("href",null);
	}



