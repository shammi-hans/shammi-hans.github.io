var lakdiApp = angular.module('bindLakdi', [])

    .controller('LakdiController', ['$scope', '$interval', '$timeout', function($scope, $interval, $timeout) {
	$scope.fBplayerListObj = [];
	$scope.fBplayerList = [];
	$scope.player1 = 'Smi';
	$scope.player2 = 'Raj';
	$scope.player3 = 'Vicky';
	$scope.player4 = 'Rakesh';
	$scope.fbDrpdwnShowCounter = 0;
	
	$scope.player1change = function(plyr, ind) {
		$('.jq-fb-drpdwn[index="' + ind + '"').removeClass('fb-div-show');
		if (!plyr || !plyr.name) return false;
		$scope.player1 = plyr.name;
	};
	$scope.player2change = function(plyr, ind) {
		$('.jq-fb-drpdwn[index="' + ind + '"').removeClass('fb-div-show');
		if (!plyr || !plyr.name) return false;
		$scope.player2 = plyr.name;
	};
	$scope.player3change = function(plyr, ind) {
		$('.jq-fb-drpdwn[index="' + ind + '"').removeClass('fb-div-show');
		if (!plyr || !plyr.name) return false;
		$scope.player3 = plyr.name;
	};
	$scope.player4change = function(plyr, ind) {
		$('.jq-fb-drpdwn[index="' + ind + '"').removeClass('fb-div-show');
		if (!plyr || !plyr.name) return false;
		$scope.player4 = plyr.name;
	};
	$('.jq-select-fb-friends').off('click').on('click', function() {
		var showing = false;
		if (!$(this).hasClass('fb-inv')) {
			showing = true;
			$(this).addClass('fb-inv');
			$('.jq-fb-select').hide();
			$('.jq-fb-done').show();
		} else {
			showing = false;
			$(this).removeClass('fb-inv');
			$('.jq-fb-select').show();
			$('.jq-fb-done').hide();
		}
		angular.forEach($('.jq-fb-drpdwn'), function(drpdown,i) {
			if (showing ) {
				$(drpdown).addClass('fb-div-show');
			} else {
				$(drpdown).removeClass('fb-div-show');
			}
			
		});
	});
	/***** fb scripts *****/			
	 $scope.checkLoginState = function() {
		FB.getLoginStatus(function(response) {
			$scope.statusChangeCallback(response);
		});
	 };
	var intervalTimer = $interval(function() {
	console.log('checking');
		var _ele = $('#fb-div .fb-login-button');
		if (_ele.children().length > 0) {
			$scope.checkLoginState();
			$interval.cancel(intervalTimer);
			intervalTimer = undefined;
		}
	}, 500);
		
	 $scope.statusChangeCallback = function(response) {
		console.log('statusChangeCallback ', response);
		if (response.status === 'connected') {
			if (response.authResponse) {
				$scope.loggedInUserAndFriendListInfo(response.authResponse);
			}
		} else {
			// The person is not logged into your app or we are unable to tell.
			$('#status').html('Please log into this app.');
		}
	};
	
	$scope.loggedInUserAndFriendListInfo = function(authRes) {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
			$timeout(function() {
				$scope.fBplayerListObj.push({'name': response.name, 'uid': response.id});
				$scope.fBplayerList.push({'name': response.name, 'uid': response.id});
			});
		      	console.log(response, 'Successful login for: ' + response.name);
		      	document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
		      	setTimeout(function() {$('#status').fadeOut();}, 5000);      	
		});
		var usrId = authRes.userID;
		var aToken = authRes.accessToken;
		var frndlistUrl =  "/" + usrId + "/friends?access_token=" + aToken;
		FB.api(
			frndlistUrl,
	    		function (response) {
				console.log(response);
				if (response && !response.error) {
					angular.forEach(response.data, function(frnd) {
						$scope.fBplayerListObj.push({'name': frnd.name, 'uid': frnd.id});
						$scope.fBplayerList.push({'name': frnd.name, 'uid': frnd.id});
					});
				}
			}
		);
	};
	/***** end of fb scripts *****/

}]);

   /* lakdiApp.directive('lakdiRow', function() {

		return {

			restrict: 'E',

			scope: {

				card: "=",

				channel: "=",

				searchToken: "@",

				cardIndex: "@"

			},

			controller: ['$scope', '$http', '$element', '$compile', function($scope, $http, $element, $compile) {



			}]

		}

	});*/

				

var play1moreBtnClicked = 0; //global variable

var keyAllowedArray = [8,9,37,38,39,40,46,48,49,50,51,52,53,54,55,56,57];

var extraAllowed = 2;

var minAllowed = 2;



var blindVal = $("#blind").val() =="" ? 5 : parseInt( $("#blind").val() );

jQuery(document).ready(function($) {

	

		console.log("ladkdi loaded");

		bindScoreInputActions();

		bodyReady();

		$("#play1more").off('click').on('click', function() {

			if(play1moreBtnClicked < 29) {

				play1moreBtnClicked = play1moreBtnClicked + 1;

				$tr = $('#firstRow-0').clone();

				$tr.attr('id','firstRow-' + play1moreBtnClicked).attr('index',play1moreBtnClicked).show();

				$tr.children().each(function(){

					$(this).attr('pIndex',play1moreBtnClicked);

				});

				var roundN = play1moreBtnClicked + 1;

				$tr.attr('title','Round '+roundN);

				$tr.find('.roundNum').html(roundN).attr('title','Round '+roundN);

				$('#tbody').append($tr);

				var objDiv = document.getElementById("tabDiv");

				objDiv.scrollTop = objDiv.scrollHeight;

				bindScoreInputActions();

				bodyReady();

				scrollTabName();

			} else {

				alert("Seriously! I mean come on yaarr!! itne der me to main v bore ho gya !?   :(");

			}

		});

		$("#del1row").off().on('click', function() {

			$tr = $('#tbody').children().last();

			var canDelete = true;

			$tr.find(".num").each(function(){

			if($(this).val()!= "" ){

				canDelete = false;

				return false;

			  }			   

			})

			if(!canDelete) {

				alert("Round has been already started. Can't delete!!");

			}

			if(play1moreBtnClicked > 0) {

				play1moreBtnClicked = play1moreBtnClicked - 1;

				$tr.remove();

			} else {

				alert("kam se kam 1 round to khelo!!");

			}

		});

		

		var nightMode = function(_this){

			$('#mask').css({height: $(window).height(), width: $(window).width()})

				  .fadeTo('slow', 0,function(){

					  $('#stary').fadeIn('slow');

					  $('#mask').hide();

					  _this.attr("night","true").html('Day Light');

				});

			$("body").removeClass("day-mode").addClass("night-mode");

		};

		var dayMode = function(_this) {

			$('#stary').fadeOut('slow', function(){

					//$('#stary').hide();

					_this.attr("night","false").html('Night Mode');

				});

			$("body").removeClass("night-mode").addClass("day-mode");

		};

		$("#toggleMode").off('click').on('click',function(){

			var _this = $(this);

			if(_this.attr("night")=="false") {

				nightMode(_this);

			} else {

				dayMode(_this);

			}	

		});

		$("#saveScreen").off('click').on('click',function(){

			    html2canvas(document.body, {

			      onrendered: function(canvas) {



			        $("#hiddenCanvas2").html(canvas);

			      },

			      width: 300,

			      height: 300

			    });

				setTimeout(function(){

					exportCanvasAsPNG("myCanvas", "test.png");

					//window.location.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");  // here is the most important part because if you dont replace you will get a DOM 18 exception.

		      		

	      		},10);



		});

		$("#totScore").off('click').on('click',function(){

			$(".win-img").siblings(".plyr").each(function(){

				$(this).val("0");

			});

	     	$(".calcScore:visible").trigger("dblclick");

		});



		$("#maxHand").on('change', function() {

			extraAllowed = parseInt( $(this).val() );

		});

		$("#minHand").on('change', function() {

			minAllowed = parseInt( $(this).val() );

		});

});



function bindScoreInputActions() {

	$('.calcScore').off('click').on('click', function(event) {

		if($(this).data("clicked")) {

			console.log($(this).data("clicked"));

			return;

		}

		$(this).data("clicked","true").css({"background":"grey"});

		$(this).parents(".row").children("td").find("input.score").each(function() {

			//console.log($(this));

			var blindObj = {"flag":false, "val":blindVal};

			var _thisInput = $(this);

			var scored = _thisInput.val() == "" ? 0 : parseInt(_thisInput.val());

			var finalScore;

			var index = _thisInput.attr("index");

			var siblingEst = _thisInput.parents(".row").find('.est[index="'+index+'"]');

			var estimate = minAllowed;

			if(siblingEst.val() == "") {

				var player = $(".j-player[index='"+index+"']").text();

				alert(player + " has not estimated any hand yet.");

				return;

			}

			if(siblingEst.data("blind")=="true") {

				blindObj.flag = true;

				estimate = parseInt(siblingEst.val())<blindVal ? blindVal : parseInt(siblingEst.val());

				blindObj.val = estimate;

				finalScore = calcLakdiScore(estimate, scored, blindObj);

			} else {

				checkEstimate(siblingEst);

				estimate = parseInt( siblingEst.val() == "" ? minAllowed : siblingEst.val() );

				finalScore = calcLakdiScore(estimate, scored);

			}

			lakdiColor(estimate, scored,_thisInput,blindObj);

			var playerScore = $('.plyr[index="'+index+'"]');

			var lastScore = playerScore.val() == "" ? 0 : playerScore.val();

			playerScore.val(parseInt(lastScore) + finalScore);

		});

		setWinners();

	});

	$('.calcScore').off('dblclick').on('dblclick', function(event) {

		$(this).data("clicked",null).css({"background":""});;

		

	});

}

function calcLakdiScore(estimate, scored, blindObj) {

	var result = 0 ;

	if(blindObj!=undefined  && blindObj.flag) {

		result = blindObj.val > scored ? estimate * (-20) : scored * 20 ;

	} else if(estimate > scored) {

		result = estimate * (-10);

	} else if(estimate == scored){

		result = estimate * 10;

	} else {

		if( $(".maxiHand").attr("enable")=="true" && (scored - estimate) > extraAllowed) {

			result = estimate * (-10);

		} else {

			result = (estimate * 10) + (scored - estimate);

		}

	}

	return result;

}

function bodyReady() {

	$(".num").on("keydown", function(event) {

		//Allowed keys present in arrays and Ctrl+A

		if($.inArray(event.keyCode, keyAllowedArray) != -1 || (event.keyCode == 65 && ( event.ctrlKey === true || event.metaKey === true ))) {

			//console.log(event.key, " allowed " + event.keyCode);

			return;

		} else {

			event.preventDefault();

			//console.log(event.key," prevented " + event.keyCode);

		}

	});

	$(".est").focusout(function(event) {

			calcTotHand($(this));

			checkEstimate($(this));

	}).off('dblclick').on('dblclick',function(){

		var _thisInput = $(this);

		if(_thisInput.data("blind")=="true") {

			_thisInput.data("blind",null).val("").css({"background":""});

			_thisInput.focus();		

		} else {

			_thisInput.data("blind","true").val("5").css({"background":"yellow"});

		}

	});

	$(".score").focusout(function(event) {

			calcTotHand($(this));

	});

	$("body").bind("click", function(e) {

		if($(e.target).parents("#minHand").length == 0 ) {

			if( $("#minHand").val() == "" ) {

				$("#minHand").addClass("shake");

				setTimeout( function(){

					$("#minHand").removeClass("shake");

				},1000);

			}

		}

	});

	//toggleExtraAllowed();

	$("#reset").on('click',function(){location.reload(true);});

}

function checkEstimate(_this) {

	var est = _this.val();

	if( est == "" || parseInt(est) < minAllowed) {

		

		_this.addClass("shake").css("background","red");

	} else if(_this.data("blind")!="true") {

		

		_this.removeClass("shake").css("background","white");

	}	

};



function toggleExtraAllowed() {

	$(".maxiHand").off('click').on('click', function() {

		var _this =	$(this);

		console.log(_this);

		if(_this.attr("enable") == "true") {

			_this.attr("enable","false");

		} else {

			_this.attr("enable","true");

		}

		$("#door").toggle('slide');

	});

}

function setWinners() {

	winners = [];

	$(".plyr").each(function(){

	  var _this = $(this);

	   var index = _this.attr("index"); 

	  var val = _this.val();

	  var obj = {"index":index,"val":val};

	  winners.push(obj);

	});

	winners.sort(function(a, b) {

		return parseFloat(b.val) - parseFloat(a.val); //descending order

	});

	$(winners).each(function(i){

		var card;

		switch(i) {

			case 0: {card = "A"; break;}

			case 1: {card = "K"; break;}

			case 2: {card = "Q"; break;}

			case 3: {card = "J"; break;}

			default: card = "10";

		};

	   	var _rank = $('.win-img[index="'+this.index+'"]').attr('src','../images/'+card+'.jpg');

	   	_rank.parents(".j-rank").attr("rank",i+1)

	});

	if($(".win-img").is(":visible")) {

		$(".win-img").toggle( "slide" );

	}

	$(".win-img").toggle( "slide" );

}

function calcTotHand(_this) {

	var selector = '';

	var totSumSelector = '';

	if(_this.hasClass('est')) {

		selector = '.est';

		totSumSelector = '.totHand'

	} else {

		selector = '.score';

		totSumSelector = '.totScore'

	}

	var totEst = 0;

	var sibTotHand = _this.parents(".row").find(totSumSelector);

	sibTotHand.css({"opacity":"1"});

	var siblingEst = _this.parents(".row").find(selector);



	$(siblingEst).each(function(){

		var val = $(this).val()=="" ? 0 : $(this).val();

		console.log("totEst : ", val);

		totEst += parseInt(val);

	});

	sibTotHand.val(totEst);

}

function lakdiColor(estimate, scored, _thisInput,blindObj) {

	if(scored < estimate  || (scored - estimate > extraAllowed && blindObj.flag == false) ) {

		_thisInput.addClass("bg-lakdi");

	}

	_thisInput.attr("title",_thisInput.val());

}

function scrollTabName() {

	$("#tabDiv").scroll(function (event) {

	    var scroll = $(this).scrollTop();

	  if(scroll>34) {

	    $(".j-tab-name-div").show();

	  } else {

	   $(".j-tab-name-div").hide();

	  }

	});

}



/*

** Screenshot

*/

function captureCurrentDiv()

	{

		html2canvas([document.getElementById('main-container')], {   

			onrendered: function(canvas)  

			{

				var img = canvas.toDataURL()

				$.post("save.php", {data: img}, function (file) {

				window.location.href =  "download.php?path="+ file});   

			}

		});

	}

	

	function captureFullPage()

	{

		html2canvas(document.body, {  

			onrendered: function(canvas)  

			{

				var img = canvas.toDataURL()

				$.post("save.php", {data: img}, function (file) {

				window.location.href =  "download.php?path="+ file});   

			}

		});

	}







function exportCanvasAsPNG(id, fileName) {



    var canvasElement = document.getElementById(id);



    var MIME_TYPE = "image/png";



    var imgURL = canvasElement.toDataURL(MIME_TYPE);



    var dlLink = document.createElement('a');

    dlLink.download = fileName;

    dlLink.href = imgURL;

    dlLink.dataset.downloadurl = [MIME_TYPE, dlLink.download, dlLink.href].join(':');



    $("#hiddenCanvas").html(dlLink);

    dlLink.click();

    document.body.removeChild(dlLink);

}


