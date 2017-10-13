 var viewportwidth;
 var viewportheight;

 //define text
        var loadText1 = 'Department of Computer Science';
        var loadText2 = " ";//"In Association with";
        var loadText3 = " ";//<SPONSER>";
        var loadText4 = "Presents";
        var loadCounter = "3 2 1 LAUNCH!!!";
  
 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  
 if (typeof window.innerWidth != 'undefined')
 {
      viewportwidth = window.innerWidth,
      viewportheight = window.innerHeight
 }
  
// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
 
 else if (typeof document.documentElement != 'undefined'
     && typeof document.documentElement.clientWidth !=
     'undefined' && document.documentElement.clientWidth != 0)
 {
       viewportwidth = document.documentElement.clientWidth,
       viewportheight = document.documentElement.clientHeight
 }
  
 // older versions of IE
  
 else
 {
       viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
       viewportheight = document.getElementsByTagName('body')[0].clientHeight
 }

 $(window).load(function () {

 	$("#ship").css("top", viewportheight/2 - $("#ship").width()/2);
 	// $("#ship").css("left", -25000);
 	$("#loadText1").css("top", viewportheight/4 );
 	// $("#loadText1").css("left", viewportwidth/2);// - loadText1.length/2);

 	// flyAway();
 	writeloadText1();
 });

 function flyAway(){

 	$("#ship").animate({"left":viewportwidth*2},2000,"swing",hideCurtain);
 	setTimeout(function(){ 	
 		$("#frameDiv").animate({"left":viewportwidth*2},2000,"swing",hideCurtain);

 		var loadedDiv = document.createElement("div");
 		loadedDiv.setAttribute("id","loaded");
 		document.getElementsByTagName('body')[0].appendChild(loadedDiv);

	},400);
 }

 function hideCurtain(){

 	$("#ship").css("display","none");
 	$("#frameDiv").css("display","none");
 }

 function writeloadText1(){

        //text is split up to letters
        $.each(loadText1.split(''), function(i, letter){

            //we add 100*i ms delay to each letter 
            setTimeout(function(){

                //we add the letter to the container
                $('#loadText1').html($('#loadText1').html() + letter);
                $("#loadText1").css("left", viewportwidth/4 - $('#loadText1').html().length );

                if( $('#loadText1').html().length == loadText1.length){

                	$("#loadText2").css("top", viewportheight/4 + 55);//- ($("#loadText1").height + 20) );

                	$.each(loadText2.split(''), function(i, letter){

		            //we add 100*i ms delay to each letter 
		            setTimeout(function(){

		                //we add the letter to the container
		                $('#loadText2').html($('#loadText2').html() + letter);
		                $("#loadText2").css("left", viewportwidth/2 - $('#loadText2').html().length );

		                if( $('#loadText2').html().length == loadText2.length){

		                	$("#loadText3").css("top", viewportheight/4 + 150);//- ($("#loadText1").height + 20) );
		 					
		                	$.each(loadText3.split(''), function(i, letter){

				            //we add 100*i ms delay to each letter 
				            setTimeout(function(){

				                //we add the letter to the container
				                $('#loadText3').html($('#loadText3').html() + letter);
				                $("#loadText3").css("left", viewportwidth/3 - $('#loadText3').html().length );

				                if( $('#loadText3').html().length == loadText3.length){

				                	$("#loadText4").css("top", viewportheight/2 + 100);//- ($("#loadText1").height + 20) );

				                	$.each(loadText4.split(''), function(i, letter){

						            //we add 100*i ms delay to each letter 
						            setTimeout(function(){

						                //we add the letter to the container
						                $('#loadText4').html($('#loadText4').html() + letter);
						                $("#loadText4").css("left", viewportwidth/2 - $('#loadText4').html().length );

						                if( $('#loadText4').html().length == loadText4.length){

						                	$("#loadCounter").css("top", viewportheight/2 );//- ($("#loadText1").height + 20) );
 											$("#loadCounter").css("left", viewportwidth/2 );

						                	$.each(loadCounter.split(' '), function(i, letter){

								            //we add 100*i ms delay to each letter 
								            setTimeout(function(){

								                //we add the letter to the container
								                $('#loadCounter').html(letter);

								                if( $('#loadCounter').html() == "LAUNCH!!!"){	
								                	$("#loadCounter").css("left", viewportwidth/2 - 100);							                	
								                	
								                	setTimeout(function(){
								                		// $('#loadCounter').html("Launch !!!");
								                		//- $('#loadCounter').html().length );

								                		setTimeout(function(){
								                			flyAway();
								                		},500);
								                	},500);
								                }
								            
									            }, 1000*i);
									        });
						                	
						                }
						            
							            }, 100*i);
							        });
				                	
				                }
				            
					            }, 100*i);
					        });
		                	
		                }
		            
			            }, 100*i);
			        });

	        	}
            
            }, 100*i);
        });

 }

//document.write('<p>Your viewport width is '+viewportwidth+'x'+viewportheight+'</p>');
