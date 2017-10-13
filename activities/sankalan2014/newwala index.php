<?php
session_start();
if (isset($_COOKIE["viewed"])){
	
	

 }
else{
	setcookie("viewed","true", 0);
	
}
?>

<!DOCTYPE html>
<html scrolling="no">
<head>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    	<meta content="Sankalan 2014, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description">
		<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2014, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		
		<title> Sankalan 2014 - Annual festival of Delhi University Computer Science Society </title>


	<link rel="stylesheet" type="text/css" href="./styles/load.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/common.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/starfield.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/console.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/pages.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/newGenie.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/fileupload.css"></style>
	<link rel="stylesheet" type="text/css" href="./styles/scroller.css"></style>
        <link rel="stylesheet" type="text/css" href="./styles/sponsor_styles.css"></style>


	<link rel="stylesheet" type="text/css" href="styles/slider.css">
	<link rel="stylesheet" type="text/css" href="styles/jquery-ui.css">  <!-- Do not Use CDN --> 


<style type="text/css">

.no_display
{
	display:none;
}
.events
{
	position: absolute;
	top:0px;
	width: 100%;
	text-align: center;

}

</style>
 	

	<script type="text/javascript" src="./scripts/jquery.min.js"></script>
	<script type="text/javascript" src="./scripts/bowser.min.js"></script>

	<script type="text/javascript" src="./scripts/jquery-ui.min.js"></script>
	<script type="text/javascript" src="./scripts/jscrollpane.min.js"></script>

	<script type="text/javascript" src="./scripts/load.js"></script>
	<script type="text/javascript" src="./scripts/starfield.js"></script>
	<script type="text/javascript" src="./scripts/console.js"></script>
	<script type="text/javascript" src="./scripts/slider.js"></script>
	<script type="text/javascript" src="./scripts/pageSlider.js"></script>
	<script type="text/javascript" src="./scripts/pages.js"></script>
	<script type="text/javascript" src="./scripts/newGenie.js"></script>
	<script type="text/javascript" src="./scripts/fileUpload.js"></script>
	<script type="text/javascript" src="./scripts/girnewale.js"></script>
	<script type="text/javascript" src="./scripts/contactus.js"></script>
	<script type="text/javascript" src="./scripts/jquery.jrumble.1.3.min.js"></script>
	<script type="text/javascript" src="./scripts/login.js"></script>
	<script type="text/javascript" src="./scripts/fbLogin.js"></script>
	<script type="text/javascript" src="./scripts/create_team.js"></script>
        <script type="text/javascript" src="./scripts/remove.js"></script>
<script type="text/javascript" src="./scripts/jquery.flip.min.js"></script>
	<script type="text/javascript" src="./scripts/sponsor_script.js"></script>
<script type="text/javascript" src="./scripts/forgot_passwd.js"></script>



<script type="text/javascript">




$(".scroll-pane").jScrollPane();


function go(number,selected)
{

	toggleDiv(number);

	if(number==1 && selected==1)
	{
		// toggleOverlay(selected);
	}

	else if(number==selected)
	{
		// toggleOverlay(selected);
	}

	else
	{		
		if($(".overlay-genie").css("visibility")=="visible")
		{
			// toggleOverlay(selected);
			// setTimeout(function(){toggleOverlay(number)},1000);
		}
		else
		{
			// setTimeout(function(){toggleOverlay(number)},1000);
		}
	}

}
</script>

<!-- facebok -->
<script type="text/javascript">
window.fbAsyncInit = function() {
        FB.init({
          appId      : '1449976178568717',
          status     : true,
          xfbml      : true
        });

        console.log("FB INITED");
			FB.Event.subscribe('auth.authResponseChange',function(response){
				console.log("FB AUTH CHANGE" + response.status);

				handleFBLoginStatus(response);
			});

			
      };



      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));		
</script>


<script type="text/javascript">

var genieObject;

var rumbling = false;
var rumblePage;

function initRumble(id){
	$('#' + id).jrumble({
		x: 2,
		y: 2,
		rotation: 2
	});
}

function startRumble(id){
	rumbling = true;

	$('#' + id).trigger("startRumble");
}

function stopRumble(id){
	rumbling = false;

	$('#'+id).trigger("stopRumble");
}

function resizeGenie(genieObj) {
	genieObject = genieObj
	genieObj.css("width",viewportwidth);
}

function resizeGenieAgain () {
	genieObject.css("width",viewportwidth);
}
	
	function resizePage(){

		starResize();
		resizeConsole();
		resizeNewGenie();
		// resizeGenieAgain();
		initPages();
	}

	function initPage(){

// Stop rumble on element
// $('#topConsoleBottomPlateLeft').trigger('stopRumble');
		
		// alert(bowser.webkit );
		// alert(bowser.gecko);
		// alert(bowser.msie);
		// alert(bowser.gecko);

		if(bowser.msie && bowser.version <= 9){
			alert("INTERNET EXPLORER " + bowser.version + "!!!!\n" + "SERIOUSLY\n"+"huh....\n well\nThe website may not work as expected in your browser\n"+"Good luck :/" );
			// window.location = "//google.com";
		}

		$("#eventFrame").css("width",viewportwidth);
		starStart()
		initConsole();
		initSlider();
		initPages();
		initNewGenie();
		initRumble();

		document.forms("register_form").reset();
	}

	// //If not Logged in 
	// register_fall();

	// //If Logged in
	// myPage();

// function openRespectivePage(){

// 	//If not Logged in 
// 	register_form_fall();

// 	//If Logged in
// 	// myPage_fall();

// }

function scroll()
{
   $("#eventDiv").scrollTop(0);
}

var everyThingHasBeenLoaded = false;


$(window).load(function()
{
	everyThingHasBeenLoaded = true;
	$(".load").css("display","none");
	$("#topConsoleTitle").css("display","block");
	$(".copyright").css("display","block");
	$("#startEngineText").css("display","block");
	
});

function hidemedam()
{
$("#results").css("display","none");
}

//onmousewheel="return false;" onscroll="scrollTo(0,0);"

</script>

<style>
.form-error
{
	font-size: 12px;
	color:#000;
}


</style>

</head>
<body  onresize="resizePage()" onmousewheel="return false;" onscroll="scrollTo(0,0);" > <!--Smi has changed onload="initPage()" -->

<!-- <body> -->


<div style="position:absolute;top:0px;left:0px;height:100%;width:100%;background-color:rgba(0,0,0,0.5);z-index:900;" id="results" onclick="location.href = 'missionmarsended.php';"> <!--Smi has changed onclick="hidemedam()" -->

<div style="position:absolute;right:10px;top:0px;color:#fff;font-size:20px;cursor:pointer;" onclick="location.href = 'missionmarsended.php';"><!--Smi has changed onclick="hidemedam()" -->

<p>X</p>

</div>

<div style="top:2%;left:0px;color:#fff;position:absolute;width:100%;">

<div style="width:100%;text-align:center;">
<h1>Sankalan ended with a great success</h1>
<h2>Congratulations to all the winners</h2>

<img class="blink" src="./images/trap.png">
<h2 class="blink" style="color: rgba(252, 36, 36, 0.8); margin-top:0px; text-shadow: 10px 0px 20px rgb(237, 99, 99),0 0 60px #FFF, 0 0 10px #FFF; ">
Mission Mars is over.<br>We are trapped in space to float infinitely.<br>Dealing with the technical problem, it may take a light year or so. Click to continue...</h2> <!--Smi has added this img & h2 tag -->
</div>
</div>


</div>

<div id="webFrame" >

<div id="fb-root"></div>
	<canvas id="starfield" style="background-color: rgb(0, 0, 0); position: absolute;opacity:1;" onkeypress="startEngines()"></canvas>

	<div id="windShield"></div>

<div id="android_link" style="position:absolute;left:0px;top:13%;" title="Download Android App">
<a href="./android/Sankalanv1.0.apk" ><img src="./images/android.png"></a><br>
</div>

	<div id="icons">

		
		<a href="https://www.facebook.com/DUCS.Sankalan" target="_blank"><img src="./images/fbIcon.png" class="icons" onclick="" ></a> <br />
		<a style="text-decoration:none;"href="javascript:contact_fall()"><img src="./images/phn.png" class="icons" > </a> <br />
		<!-- <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div> -->
		<!-- <div style="position:absolute;left: 10px;"><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FDUCS.Sankalan&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:65px;width:50px;" allowTransparency="true"></iframe>	</div> 
		
	</div>
	

	<div id="topConsole">
		
			<div class="console topConsoleBottomPlate" id="topConsoleBottomPlateLeft">
				<marquee scrolldelay=5 scrollamount=2 class="news" id="newsTopLeft" onclick="news_fall()" ><a style="color:black;text-decoration: none;" href="javascript:news_fall()">Sankalan ended with a great success and congratulations to all the winners</a></marquee>
			</div>
			<div class="console topConsoleBottomPlate" id="topConsoleBottomPlateRight">
				<marquee scrolldelay=5 scrollamount=2 class="news" id="newsTopLeft" onclick="news_fall()"><a style="color:black;text-decoration: none;" href="javascript:news_fall()">Sankalan ended with a great success and congratulations to all the winners</a>
			</marquee></div>
			<div class="topConsoleTitle shake no_display" id="topConsoleTitle">SANKALAN-2014</div>		
	</div>

	<img id="controlPanel" src="./images/contolPanel.svg" style="position:absolute; alt="PANEL WAS HERE" ">

	<div id="bottomConsole">
	 		
		<div class="controls" id = "bottomConsoleControls">	
		<nav>		
			<a href="#events" class="button3d">Events</a>			
			<a href="#sponsors" class="button3d">Sponsors</a>			
			<a href="#home" class="button3d">Home</a>			
			<a href="#about" class="button3d">About Us</a>	
			<a href="./pages/schedule.pdf" target="_blank" class="button3d" style="outline:none;">Schedule</a>

		</nav>		
		</div>

		<div id="speedControls">
			<!-- <a href="javascript:alert('Wait For It...')" class="button3d" id="regButton">Register</a> -->
			<!-- <a href="javascript:openRespectivePage()" class="button3d" id="regButton">Register</a> -->
			<?php 
			if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
			{

				echo "<a href='javascript:myPage_fall()' class='button3d' id='regButton'>My Page</a>";
			}
			else
			{
				echo "<a href='../gallery/srijan.php' class='button3d' class='srij' id='regButton' >SRIJAN</a>";
			}?>

				<!--echo "<a href='javascript:register_form_fall()' class='button3d' id='regButton' >Register</a>";-->

			<!-- <a href="javascript:myPage_fall()" class="button3d">MyPage</a> -->
			<a href="javascript:turnOffEngine()" class="button3d" id="offButton">OFF</a>
			<a href="javascript:HyperDrive()" class="button3d" id="hyperdrive">HyperDrive</a>
			<span style="margin-left : 5px;">   </span>
			<span id="slider"></span>
<!--<a href="./pages/rules.pdf" target="_blank" class="button3d" style="outline:none;margin-left:20px;">Rules</a>-->

		</div>
		

		<div class="copyright no_display">
		 	 <p>Copyright &copy; 2014 |  Sankalan, Delhi University</p>
		</div>
	</div>

<!-- <div class="blink no_display"  id="startEngineText" >Press Enter to Start</div> 
     <div class="load" style="position:absolute;top:50%;left:48%;width:100px;color:#fff;z-index:900;">Loading...</div> --> <!--Smi has changed commented this line-->
	<div  onclick="startEngine()" id="lightsOff" style="z-index:500;"></div>

	

	<div  id="wrapper" style="position:relative;">

		<?php 
		include 'sponsors.php'
		?>
		
		<div class="pages neonPage about " id="about" style="overflow-y:scroll;" >

			<div id="aboutButtons">
				<a class="button1" target="_blank"  href="//sankalan.info/gallery" >Gallery</a>
			</div>

			<div style="margin-top:30px; letter-spacing: 2px; font-size: 15px; text-align:justify;line-height:25px; text-shadow:none;">
				Established in the year 1922, the University of Delhi is one of the prestigious institutions of India. Since its inception, it has been a center of academic excellence. <br /><br />

				The Department of Computer Science was established in the University of Delhi in the year 1981, with the objective of imparting quality education in the field of Computer Science. 
				The Master of Computer Applications (MCA) program started in the Department in 1982-83 was among the first such programs in India. The M.Sc. Computer Science program, introduced in the year 2004, aims to develop core competence in Computer Science and to prepare the students to carry out research and development work, as well as take up a career in the IT industry. <br /><br />

				The Department is proud of its nearly 1000+ alumni at important positions in IT industry in India and abroad.<br /><br />

				The students of the Department established the Delhi University Computer Science Society (DUCSS) in the year 2004. The society conducts technical events to enrich students’ academic skills and also provides a common meeting ground for students pursuing different courses within the Department. As its first endeavour, DUCSS started Sankalan-Compiling Innovations  in 2005, a two-day technical festival as its annual technical fest.
				Growing from its very humble beginning, Sankalan today has established itself as one of the top technical fests of the country. Sankalan has always lived up to its expectations and has been much appreciated by many for its growing success each passing year. It provides an unparalleled platform where participants from various universities and colleges  from all over the country compete and explore their potential through various events. Now its time for Sankalan once again.<br /><br />
				 
				Sankalan 2014 to be held on 8th-9th March'14 is going to be a two-day festival, encompassing several technical and non-technical events. The festival will be organized in the Delhi University Conference Centre, North Campus, University of Delhi.
			</div>

			<div style="text-align:center;">
				
				<!-- <h1>Organising Panel:-</h1> -->

				<!-- <table style="margin:0 auto;cellspacing:10px; border-collapse:separate; border-spacing: 10px; text-shadow:none;">					
					
					<tr>
						<td>Kirti Khandelwal</td>
						<td>Manish Kumar</td>
						<td>Tanu Garg</td>
					</tr>
					<tr>
						<td>(President)</td>
						<td>(Secretary)</td>
						<td>(Tresurer)</td>
					</tr>
					<tr>
						
						<td>9876543210</td>
						<td>9717817629</td>
						<td>9654333761</td>
					</tr>
				</table>
				<table style="margin:0 auto;cellspacing:10px; border-collapse:separate; border-spacing: 10px; text-shadow:none;">					
					
					<tr>
						<td>Jyoti Balwani</td>
						<td>Shailender Rajput</td>
					</tr>
					<tr>
						<td>(Vice President)</td>
						<td>(Joint Secretary)</td>					
					</tr>
					<tr>
						<td>8800580521</td>
						<td>9711889789</td>
						<td></td>					
					</tr>
				</table> -->

			</div>

			<div style="font-size:10px; margin-top: 100px;">
				*Notice: Each and every information on this website can be changed at anytime by the respective authority.
			</div>

		</div>


		<div class="pages " id="home" style="width:100%;" >
			<div class="neonPage home shake"style="position:absolute;">
				<h2 >The Annual Technical Festival of Department of Computer Science, University of Delhi </h2>	
				<table style="margin:0 auto">
				<tr >
					<td > 
							<img src="./images/mainLogo.png" height="200px" width="200px">	
					</td>
					<td>
						<h1 style="font-size:50px;margin:0;padding:0">SANKALAN 2014</h1>
						<!-- <br> -->
						<h2 style="margin:0 ;text-align:right;padding:0">Compiling Innovations...</h2>
						<!-- <h2 style="padding-top:0%;">8th-9th March</h2> -->
						<!-- <h3 style="padding-top:0%;">Confrence Centre, University of Delhi</h3> -->
					</td>
					<tr>
						<td>
							<!-- <h2 style="padding-top:0%;">8th-9th March</h2>							 -->
						</td>
					</tr>
				</tr>			
				</table>
							<h2 style="margin-top:-2%;">8th-9th March</h2>	
						<h3 style="padding-top:0%;margin-top:-2%;margin-bottom:-1.5%;">Conference Centre, University of Delhi</h3>

					
				<!-- <div style=" height:200px;"> background:url('./images/mainLogo.png') no-repeat center;
						<h1 style="font-size:50px; padding-top:5%;">SANKALAN 2014</h1>
						
				</div> -->
			</div>		
								
		</div>


		<div class="pages" id="events" style="width:100%; position:relative;">

			<iframe id="eventFrame" src="./events.html" style="position: absolute; background: transparent;" scrolling="no" frameborder="0"></iframe>
			<div class="neonPage eventInfo" id="eventDiv" style=";position:absolute;overflow-y:scroll; overflow-x:hidden">
			<?php include 'events_details.html' ?>
			</div>	
			
		</div>

		
	</div>




	<?php 
		include 'news.php';
	?>
	<?php 
		include 'contactus.php';
	?>
</div>

<?php
	if (isset($_COOKIE["viewed"])){
		// if(intval($_COOKIE["viewcount"]) < 3){
			echo "<!--";

		// }
	}
?>
<div id="frameDiv" style="z-index:10000;">

	<div class="metal linear" id="curtain">
		
	</div>

	<div class="loadText" id="loadText1" style="font-size: 40px"></div>
	<div class="loadText" id="loadText2" style="font-size: 35px"></div>
	<div class="loadText" id="loadText3" style="font-size: 40px"></div>
	<div class="loadText" id="loadText4" style="font-size: 35px"></div>
	<div class="loadText" id="loadCounter" style="font-size: 40px"></div>
	

	<div id="ship">

		<span style="display: inline-block; width: 10em; height: 10em">
		<span style="position: relative; display: inline-block; width: 10em; height: 10em">
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border-top:2.962962962962963em solid #f1ef15;border-bottom:2.962962962962963em solid #f1ef15;border-left:2.0370370370370368em solid #f1ef15;border-right:2.0370370370370368em solid #f1ef15;border-radius:2.0370370370370368em / 2.962962962962963em;left:2.962962962962963em;top:9.814814814814815em"></i>
		<i style="position: absolute;display:inline-block;width:4.0740740740740735em;height:11.11111111111111em;background-color:#b1a3a3;left:2.962962962962963em;top:2.0370370370370368em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:2.0370370370370368em solid transparent;margin-top:-1.92em;border-bottom:2.0370370370370368em solid #000000;left:2.962962962962963em;top:0em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:1.6666666666666665em solid #000000;border-radius:1.6666666666666665em;left:3.333333333333333em;top:2.4074074074074074em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:1.2962962962962963em solid #ffffff;border-radius:1.2962962962962963em;left:3.7037037037037033em;top:2.7777777777777777em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:1.4814814814814814em solid transparent;border-right:1.4814814814814814em solid #386c00;border-bottom:1.4814814814814814em solid #386c00;left:0.1em;top:10.185185185185185em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:1.4814814814814814em solid transparent;border-left:1.4814814814814814em solid #386c00;border-bottom:1.4814814814814814em solid #386c00;left:7.037037037037036em;top:10.185185185185185em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:1.6666666666666665em solid #f18515;border-top:none;border-bottom-right-radius:1.6666666666666665em;border-bottom-left-radius:1.6666666666666665em;left:3.333333333333333em;top:13.148148148148147em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:0.9259259259259258em solid #f11515;border-top:none;border-bottom-right-radius:0.9259259259259258em;border-bottom-left-radius:0.9259259259259258em;left:4.0740740740740735em;top:13.148148148148147em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border-top:2.4074074074074074em solid #000000;border-bottom:2.4074074074074074em solid #000000;border-left:1.6666666666666665em solid #000000;border-right:1.6666666666666665em solid #000000;border-radius:1.6666666666666665em / 2.4074074074074074em;left:3.333333333333333em;top:6.111111111111111em"></i>
		<i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border-top:2.0370370370370368em solid #ffffff;border-bottom:2.0370370370370368em solid #ffffff;border-left:1.2962962962962963em solid #ffffff;border-right:1.2962962962962963em solid #ffffff;border-radius:1.2962962962962963em / 2.0370370370370368em;left:3.7037037037037033em;top:6.481481481481481em"></i></span></span>
	
	</div>

</div>

<?php
	if (isset($_COOKIE["viewed"])){
		// if(intval($_COOKIE["viewcount"]) < 3){
		echo "-->";
		

	}
?>

<script src="./scripts/classie.js"></script>
<script src="./scripts/demo12.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.38/jquery.form-validator.min.js"></script>

<script>
$.validate({
	modules : 'security',
	onSuccess : function() {

					$("#register_submit").click(function()
					{
						var sum = parseInt($("#sum").val());
					var num1 = parseInt($("#num1").val());
					var num2 = parseInt($("#num2").val());
					if( sum != ( num1 + num2 ) )
					{
						alert('Enter the valid Sum');
						return false; // Will stop the submission of the form
					}
					
					else
						return true;
							
					});

				}			

	});
</script>
</body>
</html>

<!-- 
.metal {
  position: relative;
  /*margin: 40px auto;*/


  
  font: bold 6em/2em "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
  text-align: center;
  color: hsla(0,0%,20%,1);
  text-shadow: hsla(0,0%,40%,.5) 0 -1px 0, hsla(0,0%,100%,.6) 0 2px 1px;
  
  background-color: hsl(0,0%,90%);
  box-shadow: inset hsla(0,0%,15%,  1) 0  0px 0px 4px, /* border */
    inset hsla(0,0%,15%, .8) 0 -1px 5px 4px, /* soft SD */
    inset hsla(0,0%,0%, .25) 0 -1px 0px 7px, /* bottom SD */
    inset hsla(0,0%,100%,.7) 0  2px 1px 7px, /* top HL */
    
    hsla(0,0%, 0%,.15) 0 -5px 6px 4px, /* outer SD */
    hsla(0,0%,100%,.5) 0  5px 6px 4px; /* outer HL */ 
  
  transition: color .2s;
} -->