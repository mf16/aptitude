$(document).ready(function(){
	//$("body").fadeIn(650);   we can turn this on after development. my netbook's too slow :p
	//$('.loader').html('<section class="row-fluid" style="margin-top:100px;"><section class="col-md-2 col-md-offset-5"><img src="img/global/ajax-loader.gif"></section></section>');

////////////Script for the sliding menu on side///////////////////
	//Click on the button to expand menu
	$('#buttonSideMenu').click(function() {
		var position = $( '#slidingMenu' ).css('left');
		if (position == '-200px'){
		    $( '#slidingMenu' ).animate({'left' : "+=200px"}, 500);
			$( 'header' ).animate({'margin-left' : "+=200px"}, 500);
			$( 'footer' ).animate({'margin-left' : "+=200px"}, 500);
			$( '#content' ).animate({'margin-left' : "+=200px"}, 500);
		}
	});
	$(document).bind('click', function (e) {
	 	var position = $( '#slidingMenu' ).css('left');
		if (position == '0px') {
			$( '#slidingMenu' ).animate({'left' : "-=200px"}, 500);	
			$( 'header' ).animate({'margin-left' : "-=200px"}, 500);
			$( 'footer' ).animate({'margin-left' : "-=200px"}, 500);
			$( '#content' ).animate({'margin-left' : "-=200px"}, 500);
		}
	});
	$('#slidingMenu').bind('click', function(e) {
	    e.stopPropagation();
	});
////////////////END script for sliding menu ///////////////////////

});
