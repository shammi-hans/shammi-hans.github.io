var selected = 0;
var divWidth;
var divHeight;

function initNewGenie()
{

	getViewportDimentions();
	
	$(".eventInfo").css("width",viewportwidth/2);
	$(".eventInfo").css("margin-top",parseInt($("#topConsoleBottomPlateLeft").css("height")));
	$(".eventInfo").css("margin-left",viewportwidth/2 - ((viewportwidth/1.2)/2));
	// $(".eventInfo").css("margin-right","auto");
	$(".eventInfo").css("display","none");
	
}

function resizeNewGenie()
{

	getViewportDimentions();

	divWidth = viewportwidth/1.2;
	divHeight = viewportheight/3;
	
	$(".eventInfo").css("width",viewportwidth/1.2);
	$(".eventInfo").css("height",viewportheight/3);
	$( "#eventDiv" ).css("width",viewportwidth/1.2);
	$( "#eventDiv" ).css("height",viewportheight/3);


	$("#events_info_" + selected).css("height",divHeight + 25);
	$("#events_info_" + selected).css("width",divWidth);


	$(".eventInfo").css("margin-top",parseInt($("#topConsoleBottomPlateLeft").css("height")));
	$(".eventInfo").css("margin-left",viewportwidth/2 - ((viewportwidth/1.2)/2));

}

function toggleDiv(target)
{

	getViewportDimentions();

	divWidth = viewportwidth/1.2;
	divHeight = viewportheight/3;


	if(selected == 0){
		selected = target;
		
		$( "#eventDiv" ).css("width",0);
		$( "#eventDiv" ).css("height",0);
		$("#events_info_" + target).removeClass("no_display");
		$("#events_info_" + target).css("height",divHeight + 25);
		$("#events_info_" + target).css("width",divWidth);
		$("#events_info_" + target).css("bottom",0);
		$(".eventInfo").css("display","block");
		$( "#eventDiv" ).stop(false,false).animate({width:divWidth, height: divHeight}, 500);
	}
	else if(selected == target){}

	else{
		// $("#events_info_" + selected).addClass("no_display");

		var temp = selected;
		$( "#eventDiv" ).stop(false,false).animate({width:0, height: 0}, 500, function(){

			$(".eventInfo").css("display","none");
			$("#events_info_" + temp).addClass("no_display");

			setTimeout(function(){
				$("#events_info_" + target).removeClass("no_display");
				$(".eventInfo").css("display","block");
				$( "#eventDiv" ).stop(false,false).animate({width:divWidth, height: divHeight}, 500);
			},500);			
		});
		selected = target;
	}

	
}