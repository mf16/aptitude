$(window).load(function() {
	$('#buttonSideMenu').click();
});

// On clicking '+ new class'
function newClass(){
	//$('#pageContent').html(LOADING_BAR_GIF);
	$.ajax({url:"includes/class.Dashboard.php?action=newClass",success:function(result){
	    $("#dashboard_body").html(result);
	  }});
}
