<?php
include_once "class.SidebarMenuDAO.php";
class SidebarMenu extends SidebarMenuDAO {
	function __construct(){
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
		}
	}

	function draw(){
		?>
		<div id="slidingMenu">
			<h1>Aptitude</h1>
			<span id="studentName"><?php echo $_SESSION['userFirstname'].' '.$_SESSION['userLastname']; ?></span>
			<hr style="margin:0px; border-top: 1px solid #F26522;">
			<!--<a href="#services">Timeline</a>-->
			<a href="#services">Account Settings</a>
			<span>Classes</span>
			<hr style="margin:0px; border-top: 1px solid #F26522;">
			<?php
			switch($_SESSION['userType']){
				case 'professor':
					$classes=$this->getGroupByProfessorid('math',$_SESSION['userid']);
					break;
				case 'student':
					//load classes for student
					break;
			}
			foreach($classes as $class){
				echo '<a href="'.$_SERVER['DOCUMENT_ROOT'].'class/'.$class['group_id'].'">'.$class['group_name'].'</a>';
			}
			?>
			<a href="#">+ Create new class</a>
		</div>

		<header>
			<div id="header">
				<!--Button to expand slideout-->
				<section id="buttonSideMenu"> <!--// onclick="displayMenu()"-->
				</section>
				<article>
					<span class="phoneHide" id="aptitude">Aptitude</span>
				</article>
			</div>
		</header>
	<?php
	}
}
$sidebarMenu=new SidebarMenu();
