<?php
class Dashboard {
	function draw(){
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
			<section id="headerSpacer">
			</section>
			<section class="container">
				<div id="graph">
				</div>
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

	}
}