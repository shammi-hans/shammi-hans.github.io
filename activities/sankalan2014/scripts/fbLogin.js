
function handleFBLoginStatus(response){

	if(response.status === 'connected'){
		console.log("Authorized");

	}
	else if(response.status === 'not_authorized'){
		console.log("not_authorized");
	}
	else{
		console("not Logged in on FB");
	}

}

function FBRegister(){
console.log("FBRegister");
	FB.getLoginStatus(function(response){

		if(response.status === 'connected'){
			console.log("Authorized");

			FB.api("/me",function(response){
				var fb_name = response.name;
			});

			FB.api("/me",function(response){
				var fb_email = response.email;
			});
			
			window.location = "http://www.facebook.com/dialog/oauth/?client_id=1449976178568717&redirect_uri=http://www.sankalan.info/Main/backend/fbRed.php&scope=email,read_friendlists,publish_actions";
		}
		else if(response.status === 'not_authorized'){

			console.log("not_authorized");
			//Redirect to FB Permissions
			window.location = "http://www.facebook.com/dialog/oauth/?client_id=1449976178568717&redirect_uri=http://www.sankalan.info/Main/backend/fbRed.php&scope=email,read_friendlists,publish_actions";

		}
		else{
			console.log("not Logged in on FB");
			//redirect to FB login
			window.location = "http://www.facebook.com/dialog/oauth/?client_id=1449976178568717&redirect_uri=http://www.sankalan.info/Main/backend/fbRed.php&scope=email,read_friendlists,publish_actions";
			
		}
	});
}

function FBLogin(){
var fb_email;

	FB.getLoginStatus(function(response){

		if(response.status === 'connected'){
			console.log("Authorized");

			FB.api("/me",function(response){
				var fb_name = response.name;
			});

			FB.api("/me",function(response){
				fb_email = response.email;

				var email=fb_email;
				console.log(fb_email);
		        var dataString = 'email=' + email;

				$.ajax(
	        	{
	            type: "POST",   
	            url: "./backend/fblogin.php",   
	            data: dataString,
	            success: function(html)
	            {
	                           
	               if(html=='0')
	               {
	                window.location="./";
	               }
	                else if(html=='2')
	                {
	                    // $('#feedbackdiv').css("display","none");
	                    // $('#thanks2').css("display","block");
	                    alert("User dont exist");
	                }
	                else
	                {
	                    // $('#feedbackdiv').css("display","none");
	                    // $('#thanks3').css("display","block");
	                    alert("Some Error Occurred.");
	                }
	              
	            }
        });
			});


			

		    
		}
		else if(response.status === 'not_authorized'){

			console.log("not_authorized");
			alert("You are not registered on Sankalan.info with your facebook account");
			//Redirect to FB Permissions
			// window.location = "http://www.facebook.com/dialog/oauth/?client_id=414627815349276&redirect_uri=http://localhost/WebDev/sankalanMain/backend/fbRed.php&scope=email,read_friendlists,publish_actions";

		}
		else{
			console("not Logged in on FB");
			//redirect to FB login
			window.location = "http://www.facebook.com/dialog/oauth/?client_id=1449976178568717&redirect_uri=http://www.sankalan.info/Main/backend/fbRed.php&scope=email,read_friendlists,publish_actions";
		}
	});

}