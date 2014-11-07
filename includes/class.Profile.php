<?php
include_once "class.ProfileDAO.php";
class Profile extends ProfileDAO {
	protected $profileid;
	protected $ProfileDAO;
	function __construct($profileid){
		$this->profileid=$profileid;
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
		$headerText.='<link href="'.$_SERVER['DOCUMENT_ROOT'].'js/tooltip/jquery.qtip.min.css" type="text/css" rel="stylesheet">';
		$headerText.='<link href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/'.strtolower(__CLASS__).'.css" type="text/css" rel="stylesheet">';
		return $headerText;
	}

	function draw(){
		drawHeader($this->head());
		$profileInfo=$this->getUserByid($this->profileid);
		print_r($profileInfo);
		?>
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
			<style type="text/css">
				/* iPads (portrait) ----------- */
				@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) {
					.arrowContainer{
						display: none;
					}
					.ipadPortraitHidden{
						display: none;
					}
					.section-title-container{
						margin-left: 15px;
					}
					.ipadSmaller{
						margin-left: 35px;
						margin-right: 15px;
					}
				}

				/* iPads (portrait and landscape) ----------- */
				@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
					.roundedProfile{
						width: 50%;
					}

				}
				/* iPads (landscape) ----------- */
				@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) {
				/* Styles */
					.ipadLandscapeHidden{
						display: none;
					}
					.phoneHide{
						display: none;
					}
					.phoneShow{
						display: inline;
					}
				}
				/* Smartphones (portrait and landscape) ----------- */
				@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
					.phoneHide{
						display: none;
					}
					.phoneShow{
						display: inline;
					}
				}

				/* Smartphones (landscape) ----------- */
				@media only screen and (min-width : 321px) {
				/* Styles */
				}

				/* Smartphones (portrait) ----------- */
				@media only screen and (max-width : 320px) {
				/* Styles */
				}
			</style>
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

			<section class="col-md-2 arrowContainer no-padding">
				<div class="chapter-number">
					<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/solid-arrow.png"/>
				</div>
			</section>
			<?php
			if($this->profileid==$_SESSION['userid']){
				echo 'manage profile here';
			} else {
				if(!isset($profileInfo)){
					echo 'No user found with that profile id. Please use the back button and try again.';
					echo '<br/>';
					echo '<br/>';
					// skip everything until the footer
				} else {
				// display profile info
					echo 'choose which class if in multiple -> figure out how to automatically pull it if coming from class list without using GET';
					?>
					<section class="col-md-10 material-body">
						<section class="row-fluid section-title-container">
							<h1 class="section-title">student profile</h1>
							<span class="section-number">math 1010-a</span><br>
						</section>
						<section class="row">
							<section class="col-md-3">
								<div class="col-md-12 no-padding text-center" style="margin-bottom:15px;"><img class="roundedProfile" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'img/users/'.$profileInfo['pic_uri'];?>"></div>
								<h3 class="text-center section-number"><?php echo $profileInfo['user_firstname'].' '.$profileInfo['user_lastname'];?></h3>
								<section class="col-md-12 dataContainer ipadSmaller" style="border: 2px solid #F79234;">
									<h3>About</h3><br>
									<p><span class="aboutTitle">Major:</span><span> Economics</span></p>
									<p><span class="aboutTitle">Year:</span> <span> Sophomore</span></p>
									<p><span class="aboutTitle">ID #:</span> <span> 26-248-4058</span></p>
									<br>
									<h3>Contact</h3><br>
									<p><span class="aboutTitle">Phone:</span><span> 328-485-4832</span></p>
									<p><span class="aboutTitle">Email:</span> <span class="phoneHide"> <?php echo $profileInfo['email'];?></span><span class="phoneShow"><a href="mailto:rickysapp28@gmail.com">Email</a></span></p>
									<p><span class="aboutTitle">Address:</span> <br><span> 593 N 183 E<br>Provo, UT 84606</span></p>
								</section>
							</section>
							<section class="col-md-9">
								<div class="hidden-sm hidden-xs activityTable row">
									<div class="titleRow">
										<div>sep<div class="verticalMarker"></div></div>
										<div>oct<div class="verticalMarker"></div></div>
										<div>nov<div class="verticalMarker"></div></div>
										<div>dec<div class="verticalMarker"></div></div>
										<div>jan<div class="verticalMarker removeThird"></div></div>
										<div class="removeThird">feb<div class="verticalMarker removeSecond"></div></div>
										<div class="removeSecond">mar<div class="verticalMarker removeFirst"></div></div>
										<div class="removeFirst">apr</div>
									</div><br>
									<div class="titleMarkersContainer">
										<div class="titleMarkers">
										<!--line with tics goes here-->
									</div>
									</div>
									<br>
									<div class="activityContainer">
										<div class="dayMarkers">
											<div>M</div>
											<div>T</div>
											<div>W</div>
											<div>T</div>
											<div>F</div>
											<div>S</div>
											<div>S</div>
										</div>
										<?php
											$month = 1;
											$week = 1;
											$day = 1;
											$dayOfMonth = 1;
											while ($month < 9) {
												if($month == 8){
													echo '<div class="calendarBlock removeFirst calendarBlock_'.$month.'">';
												}
												elseif($month == 7){
													echo '<div class="calendarBlock removeSecond calendarBlock_'.$month.'">';
												}
												elseif($month == 6){
													echo '<div class="calendarBlock removeThird calendarBlock_'.$month.'">';
												}
												else{
													echo '<div class="calendarBlock calendarBlock_'.$month.'">';
												}
												while ($week < 5) {
													echo '<div class="week">';
													while ($day < 8) {
														$rand = mt_rand(1,8);
														if($rand == 1 || $rand == 3){
															$class = 'activityHigh';
															$data = 'High';
														}
														elseif ($rand == 2) {
															$class = 'activityLow';
															$data = 'Moderate';
														}
														else{
															$class = 'activityNone';
															$data = 'No';
														}
														echo '<div id="day_'.$dayOfMonth.'" class="'.$class.'" data-activity="'.$data.'"></div>';
														$day++;
														$dayOfMonth++;
													}
													echo '</div>';
													$day = 1;
													$week++;
												}
												echo '</div>';
												$week = 1;
												$dayOfMonth=1;
												$month++;
											}
										?>
										<br>
										<div class="legend col-md-12">
											<div class="col-md-4"><div class="legendHigh"></div> <span class='legendHighText'>High activity</span></div>
											<div class="col-md-4"><div class="legendLow"></div> <span class='legendLowText'>Moderate activity</span></div>
											<div class="col-md-4"><div class="legendNone"></div> <span class='legendNoneText'>No activity</span></div>
										</div>
										<section class="row-fluid margin-top">
											<article class="col-md-11 margin-top" style=" padding-top:15px; padding-bottom:15px;">
												<article id="profileHeroChart" style="height: 500px;"></article>
											</article>
										</section>
									</div>
								</div>
							</section>
						</section>
					<?php 
					} 
				}
				?>
			</section>


			<section class="container body">
				<section class="row-fluid profile_body">
					<div class="col-md-3">
						<section class="row-fluid">
							<div class="col-md-12">
							</div>
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
				<img src = "<?php echo $_SERVER['DOCUMENT_ROOT']; ?>img/global/icon.ico" />
				<span>Powered by Aptitude LLC.</span>
			</section>
			<section id="feedback">
				<a href="feedback.php"><span>Have feedback?</span></a>
			</section>
		</footer>
		<script type="text/javascript">
			$( window ).resize(function() {
				if($( window ).width() > 1589 && $( window ).width() < 1807){
					$('.removeFirst').css('display', 'none');
					$('.removeSecond').css('display', 'inline');
					$('.removeThird').css('display', 'inline');
					$('.titleMarkers').css('width', '939px');
				}
				else if ($( window ).width() > 1371 && $( window ).width() < 1589){
					$('.removeSecond').css('display', 'none');
					$('.removeThird').css('display', 'inline');
					$('.titleMarkers').css('width', '803px');
				}
				else if ($( window ).width() > 1154 && $( window ).width() < 1372){
					$('.removeThird').css('display', 'none');
					$('.titleMarkers').css('width', '667px');
				}
				else if ($( window ).width() > 1807){
					$('.removeFirst').css('display', 'inline');
					$('.removeSecond').css('display', 'inline');
					$('.titleMarkers').css('width', '1075px');
				}

				if($( window ).width() < 1898 && $( window ).width() > 1589){
					$('.removeFirst.verticalMarker').css('margin-top', '22px');
					$('.removeFirst.verticalMarker').css('margin-left', '30px');
				}
				if($( window ).width() < 1898 && $( window ).width() > 1371){
					$('.removeSecond.verticalMarker').css('margin-top', '22px');
					$('.removeSecond.verticalMarker').css('margin-left', '34px');
				}
				if($( window ).width() < 1898 && $( window ).width() > 0){
					$('.removeThird.verticalMarker').css('margin-top', '22px');
					$('.removeThird.verticalMarker').css('margin-left', '32px');
				}
			});

			 $(document).ready(function()
			 {
			 	console.log($( window ).width());
			 	if($( window ).width() < 1807 && $( window ).width() > 1589){
					$('.removeFirst').css('display', 'none');
					$('.titleMarkers').css('width', '939px');
				}
				if($( window ).width() > 1371 && $( window ).width() < 1589){
					$('.removeSecond').css('display', 'none');
					$('.removeFirst').css('display', 'none');
					$('.titleMarkers').css('width', '803px');
				}
				if($( window ).width() > 0 && $( window ).width() < 1372){
					$('.removeSecond').css('display', 'none');
					$('.removeFirst').css('display', 'none');
					$('.removeThird').css('display', 'none');
					$('.titleMarkers').css('width', '667px');
				}
			 	var block = 1;
			 	var day = 1;
			 	var month;
			 	var year;
			 	while (block < 9){
			 		switch(block) {
					    case 1:
					        month = 'September';
					        year = '2014';
					        break;
					    case 2:
							month = 'October';
							year = '2014';
							break;
						case 3:
							month = 'November';
							year = '2014';
							break;
						case 4:
							month = 'December';
							year = '2014';
							break;
						case 5:
							month = 'January';
							year = '2015';
							break;
						case 6:
							month = 'February';
							year = '2015';
							break;
						case 7:
							month = 'March';
							year = '2015';
							break;
						case 8:
							month = 'April';
							year = '2015';
							break;
					}
			 		while (day < 29){
			 			var activity = $('.calendarBlock_' + block+'>.week>#day_'+day).data( "activity" );
			 			$('.calendarBlock_' + block+'>.week>#day_'+day).qtip({
					         content: activity + ' Activity<br>' +month + ' ' + day + ', ' + year,
					         style: {
								  classes: "qtip-bootstrap" 
							 },
					         position: {
					             target: 'mouse', // Track the mouse as the positioning target
					             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
					         }
					     });
			 			day++;
			 		}
			 		day = 1;
			 		block++;
			 	}
			 });
		</script>
		

		<?php
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/tooltip/jquery.qtip.min.js"></script>';
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
$profile= new Profile($profileid);

