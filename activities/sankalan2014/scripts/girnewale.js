if (!window.location.hash){ window.location.hash = '!home'}
      var ANIMATION_TIME = 2000;
      var ANIMATION_TYPE = 'easeInOutQuart';
      var SCREEN_HEIGHT = 850;
      var height=Math.round(document.documentElement.clientHeight/2);
      var width=Math.round(document.documentElement.clientWidth/2);
       var styles = {
		top : "500"+"px",
		left: "200"+"px"
		};

function register_form_fall()
{
	$("#register_container").css("z-index","100");
	$("#register_container").animate(
	{
		top:"0px"
	},1000,"easeOutElastic",function()
	{
	});
}

function register_form_hide()
{
	$("#register_container").animate(
	{
		top:"-800px"
	},1000,"easeInElastic",function()
	{
		$("#register_container").css("z-index","0");
	});
		
}



function myPage_fall()
{
	$("#myPage_container").css("z-index","100");
	$("#myPage_container").animate(
	{
		left:"0px"
	},1000,"easeOutElastic",function()
	{
	});
}

function myPage_hide()
{
	$("#myPage_container").animate(
	{
		left:"-2000px"
	},1000,"easeInElastic",function()
	{
		$("#myPage_container").css("z-index","0");
	});
		
}

function news_fall()
{
	$("#news_container").css("z-index","100");
	$("#news_container").animate(
	{
		top:"0px"
	},1000,"easeOutElastic",function()
	{
	});
}

function news_hide()
{
	$("#news_container").animate(
	{
		top:"-800px"
	},1000,"easeInElastic",function()
	{
		$("#news_container").css("z-index","0");
	});
		
}

function contact_fall()
{
	$("#contact_container").css("z-index","100");
	$("#contact_container").animate(
	{
		top:"0px"
	},1000,"easeOutElastic",function()
	{
	});
}

function contact_hide()
{
	$("#contact_container").animate(
	{
		top:"-800px"
	},1000,"easeInElastic",function()
	{
		$("#contact_container").css("z-index","0");
	});
		
}

function set_checkbox(element)
{
	var check=document.getElementById("check");

	if(check.checked)
	{
		check.checked=false;
	}

	else
	{
		check.checked=true;
	}
}