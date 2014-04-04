function login(){
	//$('#pageContent').html(LOADING_BAR_GIF);
	email=$('#email').val();
	password=$('#password').val();
	$.ajax({url:"includes/class.Login.php?action=login&email="+email+"&password="+password,success:function(result){
	    $("#pageContent").html(result);
	  }});
}
