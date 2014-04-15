<?php
include_once "class.DashboardDAO.php";
include_once "class.SidebarMenu.php";
class Dashboard {
	protected $DashboardDAO;
	function __construct(){
		$this->DashboardDAO = new DashboardDAO();
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}
	function head(){
		$headerText='';
		$headerText.='<script src="js/'.strtolower(__CLASS__).'.js"></script>';
		$headerText.='<link href="css/includes/'.strtolower(__CLASS__).'.css" type="text/css" rel="stylesheet">';
		return $headerText;
	}

	function draw(){
		global $sidebarMenu;
		drawHeader($this->head());
		$sidebarMenu->draw();
		?>
		<!-- wrapper -->
		<div class="page-wrap">
			<section id="headerSpacer"></section>
			<section class="container loader"></section>
			<section class="container body" style="padding-left:150px;">
				<div id="dashboard_body">
					<?php
					$this->drawTimeline();
					?>
				</div>
				<section class="row-fluid">
					<section class="col-md-6 col-md-offset-3">
						<img src="img/global/watermark.png">
					</section>
				</section>
			</section>

		</div>
		<!-- wrapper : end -->
		<footer class="site-footer col-md-12">
			<section>
				<img src = "img/global/icon.ico" />
				<span>Powered by Aptitude LLC.</span>
			</section>
			<section id="feedback">
				<a href="feedback.php"><span>Have feedback?</span></a>
			</section>
		</footer>
		<?php

		drawFooter($this->foot());
	}
	function foot(){
	}

	function drawTimeline(){
	}
	
	function newClass(){
		?>
		Subject: <select id='className'>
		</select>
		Class Name (Smith01 for example): <input id='className' type='text' />
		<?php
	}
}
$dashboard= new Dashboard();

