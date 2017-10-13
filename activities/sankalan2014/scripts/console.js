 var viewportwidth;
 var viewportheight;

 // //define text
 //        var loadText1 = 'Department of Computer Science';
 //        var loadText2 = "In Association with";
 //        var loadText3 = "<SPONSER>";
 //        var loadText4 = "Presents";
 //        var loadCounter = "3 2 1 LAUNCH!!!";
  
 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  
  function getViewportDimentions(){
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
}
// $(window).load(function(){

// 	initConsole();
	
// });

function initConsole(){

  console.log("width : " + viewportwidth + "\nheight: " + viewportheight);

  $("#windShield").css("width",viewportwidth);
  $("#windShield").css("height",viewportheight);

  $("#startEngineText").css("font-size",viewportheight/35);
  $("#startEngineText").css("left",viewportwidth/2 - parseInt($("#startEngineText").css("width"))/2);
	
	$("#topConsoleBottomPlateLeft").css("width",viewportwidth/3);
  $("#topConsoleBottomPlateRight").css("width",viewportwidth/3);
  $("#topConsoleBottomPlateLeft").css("height",viewportheight/11);
  $("#topConsoleBottomPlateRight").css("height",viewportheight/11);
  $(".topConsoleTitle").css("font-size",viewportwidth/33);
  $(".topConsoleTitle").css("left",viewportwidth/2 - parseInt($(".topConsoleTitle").css("width"))/2);


  $("#bottomConsole").css("height",parseInt($("#controlPanel").css("height")) - parseInt($("#controlPanel").css("height"))/7);
  $("#bottomConsole").css("width",parseInt($("#controlPanel").css("width")) );
  $("#bottomConsole").css("left",0 );

  $("#bottomConsoleControls").css("left",parseInt($("#topConsoleBottomPlateLeft").css("width")) );

  $(".button3d").css("font-size",viewportwidth/83);


  $("#speedControls").css("left", viewportwidth/2  - parseInt($("#speedControls").css("width"))/3   );// - parseInt($("#slider").css("width"))/2);
  $("#speedControls").css("margin-top", 10);// - parseInt($("#slider").css("width"))/2);
  $("#slider").css("height", parseInt($("#controlPanel").css("height"))/4.5);
  $("#slider").css("width", parseInt($("#controlPanel").css("width"))/145);
  
  $(".copyright").css("font-size",viewportwidth/80);
  $(".copyright").css("left",viewportwidth/2 - parseInt($(".copyright").css("width"))/2);

}

function resizeConsole(){
  console.log("Resizing console");

  getViewportDimentions();
  
  initConsole();
};

function HyperDrive(){

  // setTimeout(function(){
  //   if($("#hyperdrive").text() === "Deactivate"){
  //     stopRumble(rumblePage);
  //   }
  //   else{
  //     startRumble(rumblePage);
  //   }
  // },1000);

if($("#hyperdrive").text() != "Deactivate"){
  $({ n: star_speed }).animate({ n: 100}, {
      duration: 1000,
      step: function(now, fx) {
          star_speed = now;
          $("#slider").slider('value',now);
      }
  });
  $("#slider").slider( "option", "disabled", true );

  $("#hyperdrive").text("Deactivate");
   initRumble(rumblePage);
  setTimeout(function(){ 
    startRumble(rumblePage);
  },1000);
}
else{
  $("#hyperdrive").text("HyperDrive");

  $({ n: star_speed }).animate({ n: 2}, {
      duration: 1000,
      step: function(now, fx) {
          star_speed = now;
          $("#slider").slider('value',now);
      }
  });
  $("#slider").slider( "option", "disabled", false );
  setTimeout(function(){
    stopRumble(rumblePage);
  },1000);
}
};

function turnOffEngine(){
  if($("#hyperdrive").text() === "Deactivate"){
    setTimeout(function(){
      stopRumble(rumblePage);
    },1000);
  }
  $({ n: star_speed }).animate({ n: 0}, {
      duration: 1000,
      step: function(now, fx) {
          star_speed = now;
      },
   complete:function(){

    $("#offButton").blur();

  $("#hyperdrive").text("HyperDrive");

  $("#lightsOff").css("opacity",0.9);
  $("#lightsOff").css("display","inherit");

  $("#startEngineText").css("display","inherit");

  engineStarted = false;

  }});

}

