function hidePopup()
{
	$("#register_your_team").css("visibility","hidden");
	$(".fade_bg").css("visibility","hidden");
}

function showPopup(){

	$cy=$(window).height()/2;
	$cx=$(window).width()/2;
	$popupwidth=$("#register_your_team").width();
	$popupheight=$("#register_your_team").height();
	$y=$cy-($popupheight/2);
	$x=$cx-($popupwidth/2);
	
	$("#register_your_team").css("visibility","visible");
	$("#register_your_team").css("top", $y);
	$("#register_your_team").css("left", $x);
	$(".fade_bg")
	.css("visibility","visible")
	.animate({"opacity":0},0,function(){
		$(this).animate({"opacity":.5})
		})
	.css("background-color","#000")
	.css("width",$(window).width())
	.css("height",$(window).height())
	.css("top",0)
	.css("left",0);
	
}

$(function(){

$("#change_passwd_bt").click(function()
{
$("#change_passwd_bt").addClass("no_display");
$("#cancel_passwd_bt").addClass("no_display");
$(".loading1").removeClass("no_display");
        
        var change_email = $("#change_email").val();
        if(change_email=='')
        {
        	//print error
        	return;
        }

        var secret_key= $("#change_secret").val();
        if(secret_key=='')
        {
        	$(".loading1").addClass("no_display");
        	$("#password_change_form").addClass("no_display");
        	$("#password_change_secret").removeClass("no_display");
        	return;
        }

        var password=$("#change_passwd").val();
        if(password=='')
        {
        	//print error
        	return;
        }

        var pass=$("#change_passwd_confirm").val();
        if(password!=pass)
        {
        	$(".loading1").addClass("no_display");
        	$("#password_change_form").addClass("no_display");
        	$("#password_change_error").removeClass("no_display");
        	return;
        }

        var dataString = 'change_email='+change_email+'&secret_key='+secret_key+'&password='+password;

        $.ajax(
        {
            type: "POST",   
            url: "./backend/user_options.php",   
            data: dataString,
            success: function(html)
            {
               if(html=='0')
               {
               		$(".loading1").addClass("no_display");
		        	$("#password_change_form").addClass("no_display");
		        	$("#password_change_error").removeClass("no_display");                
		        }
                else if(html=='1')
                {
                   $(".loading1").addClass("no_display");
		        	$("#password_change_form").addClass("no_display");
		        	$("#password_change_user").removeClass("no_display"); 
                }
                else if(html=='2')
                {
                 	$(".loading1").addClass("no_display");
		        	$("#password_change_form").addClass("no_display");
		        	$("#password_change_success").removeClass("no_display");   
                }
                else
                {
                	$(".loading1").addClass("no_display");
		        	$("#password_change_form").addClass("no_display");
		        	$("#password_change_error").removeClass("no_display"); 
                }
              
            }
        });
    

        return false;
    });
});

