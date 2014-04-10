<?php
include_once "class.SectionDAO.php";
class Section {
	protected $SectionDAO;
	function __construct(){
		$this->SectionDAO = new SectionDAO();
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}
	function head(){
		$headerText='';
		$headerText.='<script src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		$headerText.='<link href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/'.strtolower(__CLASS__).'.css" type="text/css" rel="stylesheet">';
		return $headerText;
	}

	function draw(){
		drawHeader($this->head());
		?>
		<!-- wrapper -->
		<div class="page-wrap">
			<div id="slidingMenu">
				<h1>Aptitude</h1>
				<span id="studentName"><?php echo $_SESSION['userFirstname'].' '.$_SESSION['userLastname']; ?></span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="#services">Timeline</a>
				<a href="#services">Account Settings</a>
				<span>Classes</span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="#" onclick="newClass()" >+ Create new class</a>
			</div>

			<header>
				<div id="header">
					<!--Button to expand slideout-->
					<section onclick="toggleMenu()" id="buttonSideMenu">
					</section>
					<article>
						<span class="phoneHide" id="aptitude">Aptitude</span>
					</article>
				</div>
			</header>
			<section id="headerSpacerSmall"></section>
			<section class="container loader"></section>
			<section class="container body">
				<section class="row-fluid">
					<section class="col-md-9">
					</section>
					<section class="col-md-3 rightSideBar">
						<section class="row-fluid">
							<article class="col-md-12 text-center">
								<span class="header">Introduction</span>
							</article><br>
							<article class="divider"></article>
						</section>
					</section>
				</section>
			</section>
			<section class="footerSpacer">
			</section>
		</div>
		<!-- wrapper : end -->
		<footer class="site-footer col-md-12">
			<section class="col-md-3">
				<img src = "img/global/icon.ico" />
				<span>Powered by Aptitude LLC.</span>
			</section>
			<section class="col-md-2 col-md-offset-4" id="feedback">
				<a href="feedback.php"><span>Have feedback?</span></a>
			</section>
		</footer>
		<script type="text/javascript">
			var profilePage = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>profile";
		</script>
		<?php
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		
		drawFooter($this->foot());
	}
	function foot(){
	}
}
$section= new Section();

