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
		<style type="text/css">
		/*New designs css - start*/
			h1{
				font-size: 60px;
				font-family: minion pro;
				color:#F79234;
				text-transform:uppercase;
				letter-spacing:2px;
			}
			h3{
				font-size: 20px;
				font-family: nexabold;
				color: #F79234;
				text-transform: uppercase;
				letter-spacing: 4px;
			}
			.chapter-number>img{
				width: 100%;
			}
			.text-body{
				padding-left: 0px !important;
				margin-top:5px;
			}
			.no-padding{
				padding:0px;
			}
			.material-body{
				padding-left: 0px;
				padding-top: 8%;
				padding-right: 25px;
			}
			.section-number{
				font-size: 20px;
				font-family: nexabold;
				color: #27292B;
				text-transform: uppercase;
				letter-spacing:4px;
				padding-bottom:30px;
			}
			.section-title{
				margin-bottom: 0px;
			}
			.section-title-container{
				padding-bottom: 30px;
			}
			.practiceTitle{
				font-family: nexabold;
				color: #F79234;
				font-size: 21px;
				padding-top: 30px;
				letter-spacing: 3px;
				padding-bottom: 10px;
			}
			.practiceWrapper{
				padding-right: 25px;
			}
			.practiceContainer{
				padding-left: 0px;
				margin-top:0px;
			}
			.practiceNumber{
				text-align: right;
				padding-right: 40px;
			}
			/*New designs css - end*/
			.aboutTitle{
				font-family: open sans;
				font-weight: 700;
				letter-spacing: 2px;
			}
			span{
				font-family: open sans;
				letter-spacing: 2px;
			}
		</style>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
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
			<section id="headerSpacer" style="height: 75px;"></section>
			<section class="container loader"></section>

			<section class="col-md-2 no-padding">
				<div class="chapter-number">
					<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/solid-arrow.png"/>
				</div>
			</section>
			<section class="col-md-10 material-body">
				<section class="row-fluid section-title-container">
					<h1 class="section-title">student profile</h1>
					<span class="section-number">math 1010-a</span><br>
				</section>
				<section class="row">
					<section class="col-md-3">
						<img class="roundedProfile" src="<?php echo $_SERVER['DOCUMENT_ROOT'];?>img/global/profile-photo.png">
						<h3 class="text-center section-number">Ricky Sapp</h3>
						<section class="col-md-12 dataContainer" style="border: 2px solid #F79234;">
							<h3>About</h3><br>
							<p><span class="aboutTitle">Major:</span><span> Economics</span></p>
							<p><span class="aboutTitle">Year:</span> <span> Sophomore</span></p>
							<p><span class="aboutTitle">ID #:</span> <span> 26-248-4058</span></p>
							<br>
							<h3>Contact</h3><br>
							<p><span class="aboutTitle">Phone:</span><span> 328-485-4832</span></p>
							<p><span class="aboutTitle">Email:</span> <span> rickysapp28@gmail.com</span></p>
							<p><span class="aboutTitle">Address:</span> <br><span> 593 N 183 E<br>Provo, UT 84606</span></p>
						</section>
					</section>
					<section class="col-md-9">
					</section>
				</section>
			</section>


			<section class="container body">
				<section class="row-fluid profile_body">
					<div class="col-md-3">
						<section class="row-fluid">
							<div class="col-md-12">
							</div>
						</section>
						<section class="row-fluid">
							<section class="col-md-12 dataContainer margin-top" style="border: 2px solid #F79234;">
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
							<article class="col-lg-12 hidden-xs hidden-sm">
								<table clas="activityTable">
									<thead>
									</thead>
									<tbody>

									</tbody>
									<tfoot>
									</tfoot>
								</table>
								<section class="activityChart">
									<?php
									$days = 0;
									while ($days < 7){
										$days++;
										$weeks = 0;
										while ($weeks < 28){
											$weeks++;
											$rand = rand(1,4);
											switch ($rand) {
												case 1:
													echo '	<div><div class="activityHigh"><div class="tooltip" title="June 12: High Activity"></div></div></div>';
													break;
												case 2:
													echo '	<div><div class="activityLow"><div class="tooltip" title="September 7: Moderate Activity"></div></div></div>';
													break;
												default:
													echo '	<div><div class="activityNone"><div class="tooltip" title="April 20: No activity"></div></div></div>';
													break;
											}
										}
										echo '<br>';
									}
									?>
								</section>
							</article>
						</section>
						<section class="row-fluid margin-top">
							<article class="col-md-12 margin-top" style=" padding-top:15px; padding-bottom:15px;">
								<article id="profileHeroChart" style="height: 500px;"></article>
							</article>
						</section>
						<section class="row-fluid margin-top">
							<article class="col-md-12" style="padding-top:15px; padding-bottom:15px;">
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

