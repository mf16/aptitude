<?php
include_once "class.ProfileDAO.php";
class Profile {
	protected $ProfileDAO;
	function __construct(){
		$this->ProfileDAO = new ProfileDAO();
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
				<?php
				$classes=$this->ProfileDAO->getClassesByAdminid('math',1);
				foreach($classes as $class){
					echo '<a href="'.$_SERVER['DOCUMENT_ROOT'].'class/'.$class['group_id'].'">'.$class['group_name'].'</a>';
				}
				?>
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
			<section id="headerSpacer"></section>
			<section class="container loader"></section>
			<section class="container body">
				<section class="row-fluid profile_body">
					<div class="col-md-3">
						<section class="row-fluid">
							<div class="col-md-12">
								<h3 class="text-center">John Hancock</h3>
								<img class="roundedProfile" src="<?php echo $_SERVER['DOCUMENT_ROOT'];?>img/global/profile_photo.png">
							</div>
						</section>
						<section class="row-fluid">
							<section class="col-md-12 dataContainer margin-top">
								<h3>About</h3>
								<hr class="noMarginTop">
								<div>
									<h4>College History</h4>
									<span>Utah Valley University</span><br>
									<span>&emsp; Sept 2013 - Present</span><br>
									<span>Harford Community College</span><br>
									<span>&emsp; Sept 2010 - May 2011</span><br>
								</div>
								<br>
								<div>
									<h4>Recent Topics</h4>
									<a href="<?php echo $_SERVER['DOCUMENT_ROOT'];?>concept"><span>Chapter 5: Section 1.2</span><br>
									<span>&emsp; Evaluating domain of functions</span></a><br>
									<a href="<?php echo $_SERVER['DOCUMENT_ROOT'];?>concept"><span>Chapter 5: Section 1.2</span><br>
									<span>&emsp; Combination of functions</span></a><br>
									<a href="<?php echo $_SERVER['DOCUMENT_ROOT'];?>concept"><span>Chapter 5: Section 1.3</span><br>
									<span>&emsp; Composition of functions</span></a><br>
								</div>
								<br>
								<div>
									<h4>Credits</h4>
									<span>Credits this semester: 15</span>
								</div>
								<br>
								<div>
									<h4>Personal</h4>
									<span>Email: john@hancock.com</span><br>
									<span>Birthday: June 4th</span><br>
									<span>Interests:</span><br>
									<p>Mountain Biking, Golf, Graphic Design</p>
								</div>
							</section>
						</section>
					</div>
					<div class="col-md-9">
						<section class="row-fluid">
							<article class="col-md-12">
								<table class="activityTable">
									<tbody>
										<?php
										$days = 0;
										while ($days < 7){
											$days++;
											echo '<tr>';
											$weeks = 0;
											while ($weeks < 49){
												$weeks++;
												$rand = rand(1,4);
												switch ($rand) {
													case 1:
														echo '	<td title="June 12: High Activity"><div class="activityHigh"></div></td>';
														break;
													case 2:
														echo '	<td title="September 7: Moderate Activity"><div class="activityLow"></div></td>';
														break;
													default:
														echo '	<td title="April 20: No activity"><div class="activityNone"></div></td>';
														break;
												}
											}
											echo '</tr>';
										}
										?>
									</tbody>
								</table>
							</article>
						</section>
						<section class="row-fluid margin-top">
							<article class="col-md-12 dataContainer" style="padding-top:15px; padding-bottom:15px;">
								<article id="profileHeroChart" style="height: 500px;"></article>
							</article>
						</section>
						<section class="row-fluid margin-top">
							<article class="col-md-12 dataContainer" style="padding-top:15px; padding-bottom:15px;">
							</article>
						</section>
					</div>
				</section>
			</section>
			<section class="footerSpacer">
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
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		drawFooter($this->foot());
	}
	function foot(){
	}

	function drawTimeline(){
		echo 'timeline here';
	}
	
	function newClass(){
		?>
		Subject: <select id='className'>
		</select>
		Class Name (Smith01 for example): <input id='className' type='text' />
		<?php
	}
}
$profile= new Profile();

