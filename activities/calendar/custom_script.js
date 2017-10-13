/*
@author: Shammi Hans
@desc: script to genrate calendar, asked in Homify Front end developer interview
*/

/* few global issues */
var FebNumberOfDays ="";
var dateNow = new Date();
var month = dateNow.getMonth();
var day = dateNow.getDate();
var year = dateNow.getFullYear();
var weekNo = dateNow.getDay();
var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];
var minyear = 1945;
var maxYear = 2050;
var dayNames = ["Sun","Mon","Tue","Wed","Thurs","Fri", "Sat"];
var dayPerMonth = [31,FebNumberOfDays,31,30,31,30,31,31,30,31,30,31];

/* ready steady go!! */
$('document').ready(function() {
    generateCalendarHtml();
    generateDates();
    enableNotes();
    monthYearSelection();
    $('.j-curr-month').val(month).change();
});

/* tum mujhe khoon do main tumhe aazaadi dunga..
give me div-id I'll generate calendar HTML
*/
function generateCalendarHtml() {
    var table = $('<table>');
    var tbody = $('<tbody>');
    var td = $('<td>');
    td.attr('title','Click to write notes.').addClass('cl-day j-day');
    var inputBox =  $('<textarea>');
    inputBox.attr('type', 'text').css({'border':'1px solid #000', 'display':'none', 'resize':'none'}).addClass('cl-day j-event-text');
    var dayText = $('<div>');
    var evntDiv = $('<div>');
    dayText.addClass('j-dayText cl-dayText');
    td.append(inputBox).append(dayText)
    .append(evntDiv.addClass('j-day-event cl-day-event').text('Click to see the event'));
    var tr = $('<tr>');
    tr.addClass('cl-week j-week');
    for (var i = 0; i < 7; i++) {
      td.attr('col', i).show();
      tr.append(td.clone());
    }
    for (var i = -1; i < 6; i++) {
      tr.attr('row', i).show();
      tbody.append(tr.clone());
    }
    table.append(tbody).addClass('cl-ml-mr-auto').show();
    $('.j-calendar').html(table).show();
}

/* ek tho permission chahiye tha!!
  call to enable note writing feature
 */
function enableNotes() {
  var _tdDay = $('tr').not('tr:eq(0)').find('td');
  _tdDay.on('click', function() {
    var _this = $(this);
    if (_this.hasClass('cl-disabled')) {
      return;
    }
    _this.find('.j-day-event').hide();
    _this.find('textarea').show().focus();
  });
  $('textarea').on('focusout', function() {
    var note = $(this).hide().val();
    if ($.trim(note).length > 0) {
      $(this).siblings('.j-day-event').show();
    } else {
       $(this).siblings('.j-day-event').hide();
    }
  });
}

function setFebDays(year, month) {
  if (month ==1 ) {
    if ( (year%100!=0) && (year%4==0) || (year%400==0)){
      FebNumberOfDays = 29;
    }else{
      FebNumberOfDays = 28;
    }
    dayPerMonth[1] = FebNumberOfDays;
  }
}

function generateDates() {
  for (var i = 0; i < monthNames.length; i++) {
    var option = $('<option>').attr('value', i).html(monthNames[i]);
    $('.j-curr-month').append(option);
  }
  for (var i = minyear; i < maxYear; i++) {
    var option = $('<option>').attr('value', i);
    if (i == year) {
      option.attr('selected', 'true');
    }
    option.html(i);
    $('.j-curr-year').append(option);
  }
  var weekRow = $('tr:eq(0)');
  for(i = 0; i < 7; i++) {
    weekRow.find('td:eq(' + i+ ')').text(dayNames[i]).addClass('cl-disabled');
  }
}

function populateDays() {
  var month = $('.j-curr-month').val();
  var year = $('.j-curr-year').val();
  setFebDays(year, month);
  var daysInMonth = dayPerMonth[month];
  $('.j-dayText').text('');
  var monthStart = new Date(year, month, 1);
  var weekStart = monthStart.getDay();
  var counter = 1;
  for (var i=0; i < 6 && counter<=daysInMonth; i++) {
    for(var j=0; j < 7 && counter<=daysInMonth; j++) {
      if (i>0 || j>=weekStart) {
        var _currCell = $('tr[row="' + i + '"] td[col="' + j + '"]' ).find('.j-dayText');
	if (counter == day) _currCell.addClass('cl-today');
	_currCell.text(counter++);
      }
    }
  }
  if ($('tr[row="5"] td[col="0"]').find('.j-dayText').text() == "") {
    $('tr[row="5"]').hide();
  } else {
    $('tr[row="5"]').show();
  }
//disable empty days
	$.each($('.j-dayText'), function(){
		var _this = $(this);
		if (_this.text() =='') {
			_this.parents('td').addClass('cl-disabled');
		} else {
			_this.parents('td').removeClass('cl-disabled');
		}
	});

}

function monthYearSelection() {
  $('.j-curr-month, .j-curr-year').on('change', function() {
    saveEvents();
    populateDays();
    resetEvents();
  });
}
function  resetEvents() {
	$('.j-event-text').val('');
	$('.j-day-event').hide();
}
function saveEvents() {
  //API integration
}