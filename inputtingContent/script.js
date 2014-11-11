$(function() {
    $( ".sortable" ).sortable({placeholder: "ui-state-highlight"});
    $( ".sortable" ).disableSelection();
    $( ".subSortable" ).sortable({placeholder: "ui-state-highlight"});
    $( ".subSortable" ).disableSelection();

    $( ".sortable" ).sortable({
	  start: function( event, ui ) {
	  	$('.ui-state-highlight').css('height',  $(ui.item).css('height'));
	  	$('.ui-state-highlight').css('line-height', $(ui.item).css('height'));
	  }
	});
	$( ".subSortable" ).sortable({
	  start: function( event, ui ) {
	  	$('.ui-state-highlight').css('height',  $(ui.item).css('height'));
	  	$('.ui-state-highlight').css('width',  $(ui.item).css('width'));
	  	$('.ui-state-highlight').css('line-height', $(ui.item).css('height'));
	  }
	});
  });