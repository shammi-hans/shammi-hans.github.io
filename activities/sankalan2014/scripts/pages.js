function initPages(){

	getViewportDimentions();

	$("#eventFrame").css("width",viewportwidth);
	// $("#eventFrame").focus();
	$("#eventFrame").css("margin-top",viewportheight - parseInt($("#controlPanel").css("height") ) - parseInt($("#eventFrame").css("height"))*1.1 );

	$(".events").css("margin-top",parseInt($("topConsoleBottomPlateLeft").css("width")) - 500);
	// $(".events").css("background-color","red");


	$(".home").css("margin-top",parseInt($("#topConsoleTitle").css("height")));
	$(".home").css("margin-left",viewportwidth/2  -  parseInt($(".home").css("width"))/1.9);

        $("#sponsors").css("width",viewportwidth/2);
	$("#sponsors").css("height",viewportheight/2);

	$("#sponsors").css("margin-top",parseInt($("#topConsoleTitle").css("height"))*1.4);
	$("#sponsors").css("margin-left",viewportwidth/2 - parseInt($("#sponsors").css("width"))/1.35);

	$(".mainLogo").css("margine-top",500);


	$(".about").css("margin-top",parseInt($("#topConsoleTitle").css("height")));	
	$(".about").css("width",viewportwidth/1.5);
	$(".about").css("height",viewportheight/2);
	$(".about").css("margin-left",viewportwidth/2  -  parseInt($(".about").css("width"))/2);


}

