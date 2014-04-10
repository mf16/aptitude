<?php
include_once "global.php";
class Login{
	function __construct(){
		if(isset($_SESSION['userEmail'])){
			//forward to dashboard
		}
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			drawHeader($this->head());
			$this->draw();
			drawFooter($this->foot());
		}
	}

	function head(){
		?>
		<script src='js/<?php echo strtolower(__CLASS__).'.js'; ?>' ></script>
		<?php
		echo 'javascript loaded';
	}

	function draw(){
		echo '<div id="pageContent">';
			echo '<h1>draw function for Login</h1>';
			echo 'email_address: ';
			echo '<input type="textbox" id="email"/>';
			echo '<br/>';
			echo 'password: ';
			echo '<input type="password" id="password"/>';
			echo '<div style="border:1px solid black" onclick="login();" />Login</div>';
		echo '</div>';
	}

	function foot(){
	}
	function login(){
		$username=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		if(login($username,$password) | ($username=='' &&$password=='')){
			?>
			<script>location.href='dashboard'</script>
			<?php
		} 
		else{
			echo 'login failed';
			//incorrect what?
		}
	}
}

$login = new Login();
