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
			<section class="container loader">
			</section>
			<section class="container body">
				<section class="row-fluid">
					<div class="col-md-8">
						<div class="col-md-12 dataContainer">
							<h3>Class Completion Progress</h3>
							<div id="completionProgress"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12 dataContainer">
							<h3>Struggling Students</h3>
							<table class="table" style="border-color:#484848;">
								<thead>
									<tr>
										<th></th>
										<th>Student Name</th>
										<th>Progress</th>
									</tr>
								</thead>
								<tbody>';
								$c = 0;
								while ($c < 5){
									echo '
									<tr>
										<td><img class="roundedPhotoSmall" src="img/global/profile_photo.png"></td>
										<td>John Hancock</td>
										<td class="percentBehind">-5%</td>
									</tr>';
									$c++;
								}
							echo '	
								</tbody>
							</table>
						</div>
					</div>
				</section>
				<section class="row-fluid margin-top">
					<div class="col-md-5">
						<div class="col-md-12 dataContainer" id="completionDate">
							<h3>Course Progress</h3>
							<table class="table">
								<thead>
									<tr>
										<th>
											Completed?
										</th>
										<th>
											Section
										</th>
										<th>
											Completion Date
										</th>
									</tr>
								</thead>
								<tbody>';
									$sections=array('Inequalities', 'Absolute values', 'Functions', 'Cartesian plane', 'Pythagorean Theorem', 'Powers and Radicals', 'Scientific Notation', 'Scaling Problems', 'Quadratic Equations', 'Euclidean Algorithm', 'Factoring', 'Graphing Functions', 'Conic Sections', 'Linear Systems and Solutions');
									foreach ($sections as $current){
										echo '<tr>
												<td>
													<div class="checkbox">
														<input type="checkbox" checked>
													</div>
												</td>
												<td>
													'.$current.'
												</td>
												<td>
													August 7th
												</td>

											</tr>';
									}

							echo '
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-7">
						<div class="col-md-12 dataContainer" id="roster">
							<h3>Class Roster</h3>
							<table class="table">
								<thead>
									<tr>
										<th><!--Photo--></th>
										<th>Student Name</th>
										<th>Progress</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>';
								$c = 0;
								while ($c < 15){
									$c++;
									echo '
										<tr>
											<td><img class="roundedPhotoSmall" src="img/global/profile_photo.png"></td>
											<td>John Hancock</td>
											<td class="positiveProgress">+2%</td>
											<td>johnhancock@independant.us</td>
										</tr>';
								}
							echo '
								</tbody>
							</table>
						</div>
					</div>
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
		echo '';

		drawFooter($this->foot());
	}
	function foot(){
	}
}
$dashboard= new Dashboard();

