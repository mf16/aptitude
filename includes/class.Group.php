<?php
include_once "class.GroupDAO.php";
include_once "class.SidebarMenu.php";
class Group extends GroupDAO {
	protected $groupid;
	function __construct($groupid){
		date_default_timezone_set('UTC'); //set timezone -> will save per class eventually
		$this->groupid=$groupid;
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
		$sidebarMenu = new SidebarMenu();
		drawHeader($this->head());
		$sidebarMenu->draw();
		?>

		<?php
		//Quick fix for demo purposes (auo-login)
		$_SESSION['userid']=1;
		$_SESSION['userFirstname']='Josh';
		$_SESSION['userLastname']='Doe';
		$_SESSION['userEmail']='test@test.com';
		$_SESSION['userType']='professor';
		$this->groupid = 1;
		?>
		<style type="text/css">
			.topSpacer{
				margin-top: 72px;
			}
			.arrowContainer{
				width: 14.666667%;
			}
			/* iPads (portrait) ----------- */
			@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) {
				.arrowContainer{
					display: none;
				}
				.ipadPortraitHidden{
					display: none;
				}
				.no-padding{padding-left: 30px;}
				.ipadSmaller{
					margin: 15px;
				}
				#completionDate{
					width: 100%;
					margin-left: -15px;
				}
				#roster{
					margin-top: 0px;
					margin-bottom: 25px;
				}
				.material-body{padding: 0px;padding-top: 72px;}
				header,#slidingMenu{
					margin-top: 0px;
				}
				.section-title-container{
					padding-left: 15px;
				}
			}
			/* iPads (portrait and landscape) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
	
}
/* iPads (landscape) ----------- */
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) {
/* Styles */
	.ipadLandscapeHidden{
		display: none;
	}
}
			/* Smartphones (portrait and landscape) ----------- */
			@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
				.material-body{padding: 0px;}
				header,#slidingMenu{
					margin-top: -75px;
				}
				h1{font-size: 40px}
				.section-title-container{
					padding-left: 15px;
				}
				.ipadSmaller{
					margin: 15px;
				}
				#completionDate{
					padding-right: 15px;
					padding-left: 15px;
					margin-left: 15px;
				}
				#roster{
					margin-top: 0px;
					margin-bottom: 25px;
				}
			}
		</style>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<!-- wrapper -->
		<div class="page-wrap">
			<section class="container loader"></section>
			<section class="col-md-12 ipadPortraitHidden topSpacer"></section>	
			<section class="col-md-2 arrowContainer no-padding hidden-xs">
				<div class="chapter-number">
					<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/solid-arrow.png"/>
				</div>
			</section>

			<section class="col-md-10 material-body">
				<section class="row-fluid section-title-container">
					<h1 class="section-title">Class Dashboard</h1>
					<span class="section-number">math 1010-a</span><br>
				</section>
				<section class="row">
					<section class="col-md-12">
						<div class="col-md-8 dataContainer ipadSmaller">
							<h3>Class Completion Progress</h3>
							<div id="completionProgress" style="height: 322px;"></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 dataContainer">
								<h3>Struggling Students</h3>
								<table class="table" style="border-color:#484848;">
									<thead>
										<tr>
											<th class="ipadLandscapeHidden"></th>
											<th>Student Name</th>
											<th>Progress</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$c = 0;
									while ($c < 5){
										$c++;
										echo '
										<tr class="link darkHover" onclick="profilePageChange()">
											<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile-'.$c.'.jpg"></td>
											<td>';
											$input = array("Eric Thompson", "Evan Vinciguerra", "Andi Richardson", "William Facer", "Jessica Lewis");
												echo $input[$c-1];
											echo '</td>';
												$input = array(/*"<td class='percentBehind' style='color:green;'>+", */"<td class='percentBehind'>-");
												echo $input[array_rand($input)];
												echo mt_rand(1,24).'%</td>
											</td>
										</tr>';
									}
									?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-5 no-padding">
						<div class="col-md-12 dataContainer ipadSmaller margin-top" id="completionDate">
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
								<tbody>
									<?php
									$sections=$this->getCourseProgressByGroupid($this->groupid);
									foreach($sections as $section){
										$checked='';
										if(isset($section['completion_date'])){
											$checked='checked';
										}
										echo '<tr>';
											echo '<td>';
												echo '<div class="checkbox">';
													echo '<input id="checkbox_section'.$section['section_id'].'" type="checkbox" '.$checked.' onChange="changeCompleteStatus('.$section['section_id'].','.$this->groupid.')" >';
												echo '</div>';
											echo '</td>';
											echo '<td>';
												echo $section['section_name'];
											echo '</td>';
											echo '<td id="compDate_section'.$section['section_id'].'">';
												if(isset($section['completion_date'])){
													echo date('M-d-Y',$section['completion_date']);
												} else {
													echo '-';
												}
											echo '</td>';
										echo '</tr>';
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-7">
						<div class="col-md-12 dataContainer margin-top" id="roster">
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
								<tbody>
								<?php 
								/* ADD THIS IN WHEN THERE IS DATA TO PULL
								$students=$this->getStudentsByClassid($this->groupid);
								foreach($students as $key=>$student){
									echo '<tr class="darkHover">';
									echo '<td class="link"><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile-photo.png"></td>';
									echo '<td class="link">'.$student['user_lastname'].', '.$student['user_firstname'].'</td>';
									echo '<td class="positiveProgress">+2%</td>';
									echo '<td><span class="phoneHide">'.$student['email'].'</span><span class="phoneShow"><a href="mailto:'.$student['email'].'">Email</a></span></td>';
									echo '</tr>';
								}*/
								$c = 0;
								$names = array("Emmett Montgomery", "Roy Ward", "Ida Harrison", "Andrea Palmer", "Cory Manning", "Edmund Griffin", "Marjorie Huff" , "Beverly Joseph", "Ricardo Todd", "Ron Morris", "Inez Copeland", "Hannah Richards", "Jeff Nelson", "Ron Shaw", "Beth Meyer", "Vernon Collier");
								$input = array("<td class='positiveProgress'>+", "<td style='color:red;' class='positiveProgress'>-");
								while ($c < 15){
									$c++;
									echo '
										<tr class="darkHover">
											<td onclick="profilePageChange()" class="link"><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile-'.mt_rand(1,5).'.jpg"></td>
											<td onclick="profilePageChange()" class="link">'.$names[$c].'</td>';
											echo $input[array_rand($input)];
											$names[$c] = str_replace(' ', '', $names[$c]);
											$names[$c] = strtolower($names[$c]);
											echo mt_rand(1,24).'%</td>
											<td><span class="phoneHide">'.$names[$c].'@gmail.com</span><span class="phoneShow"><a href="mailto:johnhancock@independant.us">Email</a></span></td>
										</tr>';
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
					</section>
				</section>
			</section>
		</div>

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
			var conceptPage = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>concept";
			var profilePage = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>profile";
		</script>
		<?php
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';

		drawFooter($this->foot());
	}

	function changeCompleteStatus(){
		if(isset($_REQUEST['checked']) && isset($_REQUEST['sectionid']) && isset($_REQUEST['groupid'])){
			$this->setCompleteBySectionidGroupid($_REQUEST['sectionid'],$_REQUEST['checked'],$_REQUEST['groupid']);
		} else {
			//problem
		}
	}

	function foot(){
	}

	function drawTimeline(){
		echo 'timeline here';
	}
}
if(!isset($groupid)){
	$groupid='';
}
$group= new Group($groupid);
