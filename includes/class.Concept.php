<?php
include_once "class.ConceptDAO.php";
include_once "class.SidebarMenu.php";
class Concept extends ConceptDAO {
	function __construct(){
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
				$classes=$this->getClassesByAdminid('math',1);
				foreach($classes as $class){
					echo '<a href="'.$_SERVER['DOCUMENT_ROOT'].'class/'.$class['group_id'].'">'.$class['group_name'].'</a>';
				}
				?>
				<a href="#" onclick="newClass()" >+ Create new class</a>
			</div>

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
								while ($c < 6){
									echo '
									<tr class="link darkHover" onclick="profilePageChange()">
										<td><img class="roundedPhotoSmall" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/profile-photo.png"></td>
										<td>John Hancock</td>';
											$input = array("<td class='percentBehind' style='color:green;'>+", "<td class='percentBehind'>-");
											echo $input[array_rand($input)];
											echo mt_rand(1,24).'%</td>
										
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
						<div class="col-md-12 dataContainer margin-top" id="completionDate">
							<h3>Concepts to Review</h3>
							<div id="pieChart" style="height: 350px;"></div>
						</div>	
					</div>
					<div class="col-md-8">
						<div class="col-md-12 dataContainer margin-top" style="padding-bottom: 20px;">
							<section class="row-fluid">
								<div class="col-md-10"><h3>Most Challenging Problems</h3></div>
								<div class="col-md-2" style="margin-top: 25px;"><span>- show more -</span></div>
							</section>
							<section class="row-fluid">
								<div class="col-md-12">
									<hr class="noMarginTop">
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

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Under Contruction</h4>
		      </div>
		      <div class="modal-body">
		        This page is currently under construction and we are working with professors to get input on what would be most useful for analytics. If you have any suggestions please get in contact with us by clicking on the feedback button in the footer of this page.<br><br>
		        Thank you!
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<script type="text/javascript">
			var profilePage = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>profile";

			$(window).load(function(){
			        $('#myModal').modal('show');
		    });
		</script>
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

