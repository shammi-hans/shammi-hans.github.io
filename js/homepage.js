$(document).ready(function(e) {
  var browserShortcutMsg = "";
  var browserChrome = $.browser.chrome;
  var browserMozilla = $.browser.mozilla;
  var browserOpera = $.browser.opera;
  var browserMsie = $.browser.msie;
  if(browserChrome == true) {
     browserShortcutMsg = ' This is Chrome,, right? So press "Ctrl+Shift+J" & check out by changing device from the dropdown list. ';
  } else if (browserMozilla == true) {
     browserShortcutMsg = ' This is firefox,, right? So press "Ctrl+Shift+M" & check out by changing resolution from the dropdown list. ';
  } else if(browserOpera == true) {
     browserShortcutMsg = ' This is opera,, right? So press "Ctrl+Shift+J" & check out by changing device from the dropdown list. ';
  } else if (browserMsie == true) {
     browserShortcutMsg = ' This is IE,, right? So download & open firefox/chrome/opera & then read further, as "Ctrl+Shift+2" doesn\'t work. ';
  } else{
    browserShortcutMsg = ' There are some errors,, can\'t detect your browser? So download & open firefox/chrome/opera & then read further. ';
  }
  $('#browserShortcuts').html(browserShortcutMsg);
  
  $('#nav li').off("click").on("click", function() {
	  var _this = $(this);
	  if(_this.hasClass("jq-cv")) {
		  $('.jq-close-menu').addClass("bg-black");
	  } else {
		  $('.jq-close-menu').removeClass("bg-black");
	  }
	  $('.jq-close-menu').click();
	  
  });
 });