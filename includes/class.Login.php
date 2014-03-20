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
			$this->draw();
		}
	}

	function head(){
		?>
		<script src='js/<?php echo strtolower(__CLASS__).'.js'; ?>' ></script>
		<?php
		echo 'javascript loaded';
	}

	function draw(){
		drawHeader($this->head());
		echo '<div id="pageContent">';
			echo '<h1>draw function for Login</h1>';
			echo 'email_address: ';
			echo '<input type="textbox" id="email"/>';
			echo '<br/>';
			echo 'password: ';
			echo '<input type="password" id="password"/>';
			echo '<div style="border:1px solid black" onclick="login();" />Login</div>';
		echo '</div>';
		drawFooter($this->foot());
	}

	function foot(){
	}
	function login(){
		echo 'asdf';
	}
}

$login = new Login();
