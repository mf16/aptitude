<?php
class Dashboard {
	function __construct(){
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}
	function head(){
	}

	function draw(){
		drawHeader($this->head());
		echo '
		<!-- wrapper -->
		<div class="page-wrap">
			<div id="slidingMenu">
				<h1>Aptitude</h1>
				<span id="studentName">John Doe</span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="#services">Account Settings</a>
				<span>Classes</span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="class">Test Class</a>
				<a href="#">+ Create new class</a>
			</div>

			<header>
				<div id="header">
					<!--Button to expand slideout-->
					<section id="buttonSideMenu">
					</section>
					<article>
						<span id="aptitude">Aptitude</span>
					</article>
				</div>
			</header>
			<section id="headerSpacer"></section>
			<section class="container loader"></section>
			<section class="container body">
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
		</footer>';

		drawFooter($this->foot());
	}
	function foot(){
	}
}
$dashboard= new Dashboard();

