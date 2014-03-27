function login(){
	//$('#pageContent').html(LOADING_BAR_GIF);
	username=$('#username').val();
	password=$('#password').val();
	$.ajax({url:"includes/class.Login.php?action=login&username="+username+"&password="+password,success:function(result){
	    $("#pageContent").html(result);
	  }});
}
