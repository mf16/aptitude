<?php
include_once "class.ConceptDAO.php";
class Concept {
	protected $ConceptDAO;
	function __construct(){
		$this->ConceptDAO = new ConceptDAO();
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
				$classes=$this->ConceptDAO->getClassesByAdminid('math',1);
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
				<section class="row-fluid concept_body">
					<div class="col-md-8">
						<div class="col-md-12 dataContainer">
							<h3>Section Concept Breakdown</h3>
							<div id="conceptBreakdown" style="height: 374px;"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12 dataContainer">
							<h3 style="font-size: 23px;">Struggling/Excelling Students</h3>
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
								while ($c < 3){
									echo '
									<tr>
										<td><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile_photo.png"></td>
										<td>John Hancock</td>
										<td class="percentBehind">-5%</td>
									</tr>';
									$c++;
								}
								while ($c < 6){
									echo '
									<tr>
										<td><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile_photo.png"></td>
										<td>John Hancock</td>
										<td class="percentAhead">+15%</td>
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
					<div class="col-md-4">
						<div class="col-md-12 dataContainer" id="completionDate">
							<h3>Concepts to Review</h3>
							<div id="pieChart" style="height: 350px;"></div>
						</div>	
					</div>
					<div class="col-md-8">
						<div class="col-md-12 dataContainer" style="padding-bottom: 20px;">
							<section class="row-fluid">
								<div class="col-md-10"><h3>Most Challenging Problems</h3></div>
								<div class="col-md-2" style="margin-top: 25px;"><span>- show more -</span></div>
							</section>
							<section class="row-fluid">
								<div class="col-md-12">
									<hr style="margin-top:0px;">
								</div>
							</section>
							<section class="row-fluid" style="font-size: 17px;">
								<?php
								$x=0; 
								while ($x < 3){
									echo '<article class="col-md-4">
									<h4>Domain of functions</h4>
									<article>
										<span>y = 5x - 12<sup>2</sup><br>
										<span>when x = 5</span><br>
										<br>
										<span style = "color:green;">y = 5(5) - 12<sup>2</sup><br>
										<span style = "color:green;">y = 25 - </span><span  style = "color:red;">12<sup>2</sup><br>
										<span style = "color:green;">y = 25 - 144<sup></sup><br>
										<span style = "color:green;">y = -119
									</article>
								</article>';
								$x++;
								}
								?>
							</section>
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
$concept= new Concept();

