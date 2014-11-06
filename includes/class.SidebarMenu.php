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
		<div class = "operatorToolbar">
			<div class="scrollable">
			    <div class="operatorButton" onclick='editor.insertText("≥");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/gte.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("≤");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/lte.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("∪");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/union.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("∩");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/intersection.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("e");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/e.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("π");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/pi.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("i");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/i.png"></div>
			    <div class="operatorButton" onclick='editor.insertText("÷");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/divide.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("∞");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/infinity.gif"></div>
			    <div class="operatorButton" onclick='editor.parentheses();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/parenthesis.gif"></div>
			    <div class="operatorButton" onclick='editor.brackets();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/brackets.gif"></div>
			    <div class="operatorButton" onclick='editor.absoluteBraces();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/absolute.gif"></div>
			    <div class="operatorButton" onclick='editor.fraction();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/fraction.gif"></div>
			    <div class="operatorButton" onclick='editor.exponent();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/exponent.gif"></div>
			    <div class="operatorButton" onclick='editor.squareRoot();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/squareroot.gif"></div>
			    <div class="operatorButton" onclick='editor.nthRoot();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/nroot.gif"></div>
			    <div class="operatorButton" onclick='editor.insertText("f(x)");'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/fx.gif"></div>
			    <div class="operatorButton" onclick='editor.base10Log();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/log.gif"></div>
			    <div class="operatorButton" onclick='editor.naturalLog();'><img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/editor/ln.gif"></div>
			</div>
		</div>

		<div id="slidingMenu">
			<h1>Aptitude</h1>
			<span id="studentName"><?php echo $_SESSION['userFirstname'].' '.$_SESSION['userLastname']; ?></span>
			<hr style="margin:0px; border-top: 1px solid #F26522;">
			<!--<a href="#services">Timeline</a>-->
			<a href="#services">Account Settings</a>
			<span></span>
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
