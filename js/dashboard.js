$(window).load(function() {
	displayMenu();
});

function displayMenu(){
	if($('#slidingMenu').offset().left < 0){
		$( '#slidingMenu' ).animate({'left' : "+=200px"}, 1000);
		$( 'header' ).animate({'margin-left' : "+=200px"}, 1000);
		$( 'footer' ).animate({'margin-left' : "+=200px"}, 1000);
		$( '#content' ).animate({'margin-left' : "+=200px"}, 1000);
	}
}

// On clicking '+ new class'
function newClass(){
	//$('#pageContent').html(LOADING_BAR_GIF);
	$.ajax({url:"includes/class.Dashboard.php?action=login",success:function(result){
	    $("#pageContent").html(result);
	  }});
}
