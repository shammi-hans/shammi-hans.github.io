<?php 
session_start();

if(isset($_SESSION['email']) || isset($_GET['code']))
{
?>

<html>

<head>

<link rel="shortcut icon" href="../images/favicon.ico">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    	<meta content="Sankalan 2014, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description">
		<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2014, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		
		<title> Sankalan 2014 - Annual festival of Delhi University Computer Science Society </title>

<script src="../scripts/jquery.min.js"></script>



<?php 
if(isset($_SESSION['email']))
{
if(!isset($_GET['rand']) || !isset($_SESSION['rand']) || !isset($_SESSION['id']))
{
	return;
}

$session_id = session_id();



if($_SESSION['id']!=$session_id)
{
	return;
}


$rand=$_GET['rand'];
$rand1=md5($_SESSION['rand']);

if($rand!=$rand1)
{
	return;
}
?>

<script type="text/javascript">
$(function() {
	$.ajaxSetup({cache: false});

	$(".complete_button").click(function() {

$(".complete_button").addClass("no_display");
$(".loading").removeClass("no_display");

		$(".error2").addClass("no_display");
$(".already").addClass("no_display");
$(".success").addClass("no_display");
$(".no_email").addClass("no_display");
$(".error21").addClass("no_display");
		$(".error").css("display","none");
	var phone	 = $("#phone").val();
 	var check=document.getElementById("accom");
	var accom=0;
	if(check.checked)
	{
		accom='yes';
	}
	else
	{
		accom='no';
	} 	

  
    var dataString = 'phone=' + phone + ' &accom=' + accom;
	if(phone==''){
		$(".error").css("display","block");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");
		return false;
	}
        if(phone.search(/^([0])?([0-9]{10})$/))
//	if(phone.search(/^(\(\+[0-9]{2}\))?([0-9]{10})$/))
	{

		$(".error1").css("display","block");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");
	}

	
	else{
			$.ajax({
			type: "POST",	
	  		url: "./regis_complete.php",	
	   	data: dataString,	
	  		cache: false,	
	  		success: function(html){
		   	if(html=="1")
		   	{
		   		$(".error").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

		   		setTimeout(function()
				{
					window.location="../";
				},1500);

			}
			else if(html=="2")
			{
				$(".already").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

				setTimeout(function()
				{
					window.location="../";
				},1500);
			}
			else if(html == "3")
			{	
				$(".success").removeClass("no_display");
				setTimeout(function()
				{
					window.location="../";
				},2000);
			}	
			else if(html == "4")
			{
				$(".no_email").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

				setTimeout(function()
				{
					window.location="../";
				},1500);
			}	  		
			else
			{
				$(".error").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

				setTimeout(function()
				{
					window.location="../";
				},1500);
			}
		}
  	});
	}
   return false;
	});

});
</script>




<?php

}

if(isset($_GET['code']))
{
	$_SESSION['code']=$_GET['code'];
?>

<script type="text/javascript">

$("#pardekepeeche").css("display","block");

var fb_email = "";
var fb_name = new Array();

var gotFBDetails = false;

window.fbAsyncInit = function() {
    FB.init({
      appId      : '1449976178568717',
      status     : true,
      xfbml      : true
    });

		//FB.Event.subscribe('auth.authResponseChange',function(response){
		FB.getLoginStatus(function(response){
			handleFBLoginStatus(response);
		});
			
		//});
  };
  
  var gotname = false;
  var gotemail = false;
  
  function showform(){
  	if(gotname && gotemail){
  		$("#pardekepeeche").css("display","none");
  	}
  }

function handleFBLoginStatus(response){
	FB.getLoginStatus(function(response){

		if(response.status === 'connected'){
			console.log("Authorized");

			FB.api("/me",function(response){
				fb_name = response.name.split(" ");
				console.log(fb_name[0] + " " + fb_name[1]);
				gotname = true;
				showform();
			});

			FB.api("/me",function(response){
				fb_email = response.email;
				console.log(fb_email);
                        gotFBDetails = true;
                        	gotemail = true;
				showform();
			});

			
		}
		else if(response.status === 'not_authorized'){

			console.log("not_authorized");
			//Redirect to FB Permissions
			window.location = "http://www.facebook.com/dialog/oauth/?client_id=1449976178568717&redirect_uri=http://www.sankalan.info/Main/backend/fbRed.php&scope=email,read_friendlists,publish_actions";

		}
		else{
			console("not Logged in on FB");
			//redirect to FB login
			window.location = "http://www.facebook.com/dialog/oauth/?client_id=1449976178568717&redirect_uri=http://www.sankalan.info/Main/backend/fbRed.php&scope=email,read_friendlists,publish_actions";
			

		}
	});
}

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
  
<script type="text/javascript">
$(function() {
	$.ajaxSetup({cache: false});
	$(".complete_button").click(function() {
$(".complete_button").addClass("no_display");
$(".loading").removeClass("no_display");

$(".error2").addClass("no_display");
$(".already").addClass("no_display");
$(".success").addClass("no_display");
$(".no_email").addClass("no_email");
$(".error21").addClass("no_display");

	console.log(fb_name[0]);

$(".error").css("display","none");
	var phone	 = $("#phone").val();
 	var check=document.getElementById("accom");
	var accom=0;
	if(check.checked)
	{
		accom='yes';
	}
	else
	{
		accom='no';
	} 	
 var dataString = 'fb=1&lname='+fb_name[0]+'&llname='+fb_name[1]+'&email='+fb_email+'&phone=' + phone + ' &accom=' + accom;
  
   
	if(phone==''){
		$(".error").css("display","block");
		return false;
	}
	if(phone.search(/^(\(\+[0-9]{2}\))?([0-9]{10})$/))
	{

		$(".error1").css("display","block");
	}


  
   	
	else{			
			$.ajax({
			type: "POST",	
	  		url: "./regis_complete.php",	
	   	data: dataString,	
	  		cache: false,	
	  		success: function(html){
	  			//alert(html);
		   	if(html=="0")
		   	{
		   		$(".error2").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");


setTimeout(function()
{
window.location="../";
},1000);
			}
			else if(html=="1")
			{
				$(".already").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

setTimeout(function()
{
window.location="../";
},1500);


			}
			else if(html == "3")
			{	
				$(".success").removeClass("no_display");
				postOnWall();
setTimeout(function()
{
window.location="../";
},2000);

			}	
			else if(html == "4")
			{	
				$(".no_email").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

setTimeout(function()
{
window.location="../";
},1500);

			}	
			else
			{
				$(".error21").removeClass("no_display");
$(".loading").addClass("no_display");

$(".complete_button").removeClass("no_display");

setTimeout(function()
{
window.location="../";
},1500);

			}
			}	  		
  			});
		}
   return false;
	});
});

function postOnWall(){
	params = {}
	params['message'] = "I just registered for Sankalan 2014 on Sankalan.info.\nParticipate and win prizes worth thousands of rupees. \nLike it at: https://www.facebook.com/DUCS.Sankalan";
	params['name'] = "SANKALAN 2014";
	params['link'] = "www.sankalan.info";
	params['picture'] = "https://m.ak.fbcdn.net/profile.ak/hprofile-ak-frc3/t1/p200x200/1613981_635501569844700_92318247_n.jpg";
	params['description'] = "SANKALAN 2014, The Annual Technical festival of Department of Computer Science, University of Delhi";

	FB.api('/me/feed', 'post', params , function (response) {
	                            
        if (!response || response.error) {
            //alert("Please try again"+response.error);
            var params = {};
            params['message'] = "I just registered for Sankalan 2014 on Sankalan.info.\nParticipate and win prizes worth thousands of rupees. \nLike it at: https://www.facebook.com/DUCS.Sankalan";
			params['name'] = "SANKALAN 2014";
			params['link'] = "www.sankalan.info";
			params['picture'] = "https://m.ak.fbcdn.net/profile.ak/hprofile-ak-frc3/t1/p200x200/1613981_635501569844700_92318247_n.jpg";
			params['description'] = "SANKALAN 2014, The Annual Technical festival of Department of Computer Science, University of Delhi";

            FB.api('/me/feed', 'post', params , function (response) {
                                        
                                        if (!response || response.error) {
                                            //alert("Please try again"+response.error);
                                        } else {
                                           //alert("Posted on FB");
                                        }
                                        
            });

        } else {
           //alert("Posted on FB");
        }
	                            
	});
}

</script>


<?php
}?>

<script type="text/javascript">
	function set_checkbox()
	{
		var check=document.getElementById("accom");

	if(accom.checked)
	{
		accom.checked=false;
	}

	else
	{
		accom.checked=true;
	}

}
	function hide_me()
	{
		$(".error").css("display","none");	
		$(".error1").css("display","none");	
		
	}

</script>


<style type="text/css">
	*
	{
		margin:0;
		padding: 0;
	}
	.no_display
	{
		display: none;
	}

	.error
	{
		display: none;
		color:#fff;
	}

	.error1
	{
		display: none;
		color: #fff;
	}
	body
	{
		height: 100%;
		width: 100%;
		background: url(../images/mars.png) no-repeat center center fixed; 
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		-o-background-size: cover;
  		background-size: cover;
	}

	#cover
	{
		height: 100%;
		width: 100%;
		top:0px;
		position: absolute;
		background-color: #000;
		opacity: 0.9;
	}
.no_display
{
display:none;
}


</style>

</head>

<body>
<div id="pardekepeeche"  style="position:absolute;width:100%;height:100%; background-color:black; opacity:0.8; z-index:100;display:none;">
&nbsp;
</div>

<div id="cover">

	<div>
		<div style="width:100%;text-align:center;font-size:30px;margin-top:50px;color:#fff">
			<p>Complete Your Registration</p>
		</div>


<div style="margin-top:40px;text-align:center;">
<p style="color:#fff;font-size:20px;">Phone number format :</p>
<ul style="color:#fff;list-style:none;">
<li>0xxxxxxxxxx</li>
<li>or</li>
<li>xxxxxxxxxx</li>
</ul>
<form id="complete_registration_form" style="padding:15px 30px 0px 15px;">
<table style="margin-left:auto;margin-right:auto;">

<tr>

<td style="text-align:center;">
<div>
<input type="text" placeholder="Phone number" onfocus="hide_me()" name="phone" id="phone" style="width:360px;height:50px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;" >
<p class="error">Field is Empty</p>
<p class="error1">Not a correct phone number <br> Should contain only digits </p>
</div>
</td>
</tr>

<tr>
<td colspan="2">
<br>
<br>
<div style="width:360px;height:30px;padding:5px;color:#fff"><input id="accom" type="checkbox" value="yes" name="accom" style="padding:2px;width:20px;height:20px;"><label style="margin-left:10px;font-size:20px;cursor:pointer;" onclick="javascript:set_checkbox()">Want Accomodation</label></div></td>
</tr>

<tr >
<td colspan="2" align="center" valign="middle">
<br>
<br>

<button class="complete_button" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:172px;height:50px;border-radius:5px;padding: 7px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115">Complete</button>
<img src="../images/loading.gif" height="60px" width="70px" class="no_display loading">

</td>

</tr>

</table>
</form>

<div style="font-size:20px;color:#fff;text-align:center">

<div class="no_display error2" style="width:100%;text-align:center;">
<p>Some Error Occurred, Please contact us. Redirecting to the Main Page </p>
</div>

<div class="no_display already" style="width:100%;text-align:center;">
<p>You have already registered. Redirecting to main page...</p>
</div>

<div class="no_display success"  style="width:100%;text-align:center;">
<p>Please check your Email for your registration Details..</p>
<p> Visit MyPage on <a href="sankalan.info" > Sankalan.info</a> to create a Team, or to join an existing one.</p>
</div>

<div class="no_display error21"  style="width:100%;text-align:center;">
<p>Some Error Occurred, Please contact us. Redirecting to the Main Page </p>
</div>


<div class="no_display no_email"  style="width:100%;text-align:center;">
<p>You have registered but there is some problem in sending you email. Please contact us!</p>
</div>

</div>

</div>
</div>


</div>




</body>
</html>



<?php 
}

else
{
	
	echo "<meta http-equiv='refresh' content='0;http://www.sankalan.info'>";
}

?>