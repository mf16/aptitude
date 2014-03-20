function login(){
	alert('asdf');
	//$('#pageContent').html(LOADING_BAR_GIF);
	username=$('#username').val();
	password=$('#password').val();
	$('#pageContent').load('includes/class.Login.php?action=login&username='+username+'&password='+password);
}
