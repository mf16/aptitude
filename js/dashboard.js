$(window).load(function() {
	toggleMenu();
});

function toggleMenu(){
	if($('#slidingMenu').offset().left < 0){
		// Show Menu
		$( '#slidingMenu' ).animate({'left' : "+=200px"}, 1000);
		$( 'header' ).animate({'margin-left' : "+=200px"}, 1000);
		$( 'footer' ).animate({'margin-left' : "+=200px"}, 1000);
		$( '#content' ).animate({'margin-left' : "+=200px"}, 1000);
	} else{
		// Hide Menu
		/*
		$( '#slidingMenu' ).animate({'left' : "-=200px"}, 1000);
		$( 'header' ).animate({'margin-left' : "-=200px"}, 1000);
		$( 'footer' ).animate({'margin-left' : "-=200px"}, 1000);
		$( '#content' ).animate({'margin-left' : "-=200px"}, 1000);
		*/
	}
}

// On clicking '+ new class'
function newClass(){
	//$('#pageContent').html(LOADING_BAR_GIF);
	$.ajax({url:"includes/class.Dashboard.php?action=newClass",success:function(result){
	    $("#dashboard_body").html(result);
	  }});
}
