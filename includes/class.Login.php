<?php
include_once "global.php";
include_once "class.LoginDAO.php";
class Login extends LoginDAO {
	private $loginUserid;
	function __construct($loginUserid){
		$this->loginUserid=$loginUserid;
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

	function setLogin($userid){
		//session_unset();
		if(!isset($_SESSION['userid'])){
			$userInfo=$this->getUserDetailsByid($userid);
			$_SESSION['userid']=$userid;
			$_SESSION['userFirstname']=$userInfo['user_firstname'];
			$_SESSION['userLastname']=$userInfo['user_lastname'];
			$_SESSION['userEmail']=$userInfo['email'];
			$_SESSION['userType']=$userInfo['user_type'];
		} else {
		}
	}

	function head(){
		?>
		<script src='js/<?php echo strtolower(__CLASS__).'.js'; ?>' ></script>
		<?php
		echo 'javascript loaded';
	}

	function draw(){
	// this is the real login content
	/*
		echo '<div id="pageContent">';
			echo '<h1>draw function for Login</h1>';
			echo 'email_address: ';
			echo '<input type="textbox" id="email"/>';
			echo '<br/>';
			echo 'password: ';
			echo '<input type="password" id="password"/>';
			echo '<div style="border:1px solid black" onclick="login();" />Login</div>';
		echo '</div>';
		*/
		//session_unset();


		// for testing
		print_r($_SESSION);
		print_r($this->loginUserid);
		if(isset($this->loginUserid) && $this->loginUserid!=''){
			$this->setLogin($this->loginUserid);
		} else {
			session_unset();
		}
		if(!isset($_SESSION['userid'])){
			echo '<a href="'.$_SERVER['DOCUMENT_ROOT'].'login/1"><div style="border:1px solid black">Login as Professor</div></a>';
			echo '<a href="'.$_SERVER['DOCUMENT_ROOT'].'login/2"><div style="border:1px solid black">Login as Student - Most things not working yet</div></a>';
		} else {
			echo '<a href="'.$_SERVER['DOCUMENT_ROOT'].'login"><div style="border:1px solid black">Logout</div></a>';
		}
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

$login = new Login($loginUserid);
