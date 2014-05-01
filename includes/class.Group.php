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
		<!-- wrapper -->
		<div class="page-wrap">
			<section id="headerSpacer"></section>
			<section class="container loader"></section>
			<section class="container body">
				<section class="row-fluid">
					<div class="col-md-8">
						<div class="col-md-12 dataContainer">
							<h3>Class Completion Progress</h3>
							<div id="completionProgress" style="height: 322px;"></div>
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
								<tbody>
								<?php
								$c = 0;
								while ($c < 5){
									echo '
									<tr class="link darkHover" onclick="profilePageChange()">
										<td ><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile_photo.png"></td>
										<td>John Hancock</td>
										<td class="percentBehind">-5%</td>
									</tr>';
									$c++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
				<section class="row-fluid margin-top">
					<div class="col-md-5">
						<div class="col-md-12 dataContainer margin-top" id="completionDate">
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
									echo '<td class="link"><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile_photo.png"></td>';
									echo '<td class="link">'.$student['user_lastname'].', '.$student['user_firstname'].'</td>';
									echo '<td class="positiveProgress">+2%</td>';
									echo '<td><span class="phoneHide">'.$student['email'].'</span><span class="phoneShow"><a href="mailto:'.$student['email'].'">Email</a></span></td>';
									echo '</tr>';
								}*/
								$c = 0;
								while ($c < 15){
									$c++;
									echo '
										<tr class="darkHover">
											<td onclick="profilePageChange()" class="link"><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile_photo.png"></td>
											<td onclick="profilePageChange()" class="link">John Hancock</td>
											<td class="positiveProgress">+2%</td>
											<td><span class="phoneHide">johnhancock@independant.us</span><span class="phoneShow"><a href="mailto:johnhancock@independant.us">Email</a></span></td>
										</tr>';
								}
								?>
								</tbody>
							</table>
						</div>
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
