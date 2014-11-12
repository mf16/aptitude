<?php
include_once '../includes/global.php';
include_once '../head.php';
?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
<body>
	<div id="slidingMenu">
		<h1>Aptitude</h1>
		<span id="studentName">Albert Einstein</span>
		<hr style="margin:0px; border-top: 1px solid #F26522;">
		<!--<a href="#services">Timeline</a>-->
		<a href="#services">Account Settings</a>
		<span>Classes</span>
		<hr style="margin:0px; border-top: 1px solid #F26522;">
		<a href="/class/1">mathTest</a><a href="/class/3">mathgroup2</a>			<a href="#">+ Create new class</a>
	</div>
	<header>
		<div id="header">
			<!--Button to expand slideout-->
			<section id="buttonSideMenu"> <!--// onclick="displayMenu()"-->
			</section>
			<article>
				<span class="phoneHide" id="aptitude">Aptitude</span>
			</article>
		</div>
	</header>
	<section id="headerSpacerSmall"></section>
	<section class="col-md-2 arrowContainer mg-t-md">
		<div class="chapter-number">
			<img src="/img/global/solid-arrow.png">
		</div>
	</section>

	<section class="col-md-10 materialBody">

		<h1>Class Dashboard</h1>
		<span class="sectionNumber">math 1010-a</span>
		<div class="clearfix"></div>

		<div class="col-md-3 pd-to-r">
			<div class="col-md-12 dataContainer">
				<h3>Strong Concepts</h3>
					<table class="table" style="border-color:#484848;">
						<tbody>
							<tr class="link darkHover" onclick="profilePageChange()">
								<td class="ipadLandscapeHidden">50%</td>
								<td>Subtraction</td>
							</tr>
							<tr class="link darkHover" onclick="profilePageChange()">
								<td class="ipadLandscapeHidden">50%</td>
								<td>Subtraction</td>
							</tr>
							<tr class="link darkHover" onclick="profilePageChange()">
								<td class="ipadLandscapeHidden">50%</td>
								<td>Subtraction</td>
							</tr>
						</tbody>
					</table>
				<h3>Weak Concepts</h3>
					<table class="table" style="border-color:#484848;">
						<tbody>
							<tr class="link darkHover" onclick="profilePageChange()">
								<td class="ipadLandscapeHidden">50%</td>
								<td>Subtraction</td>
							</tr>
							<tr class="link darkHover" onclick="profilePageChange()">
								<td class="ipadLandscapeHidden">50%</td>
								<td>Subtraction</td>
							</tr>
							<tr class="link darkHover" onclick="profilePageChange()">
								<td class="ipadLandscapeHidden">50%</td>
								<td>Subtraction</td>
							</tr>
						</tbody>
					</table>
			</div>
			<div class="col-md-12 mg-t-md dataContainer">
				<h3 class="no-mg-b">Need help?</h3>
				<table class="table" style="border-color:#484848;">
					<tbody>
						<tr class="link darkHover" onclick="profilePageChange()">
							<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="/img/global/profile-1.jpg"></td>
							<td>Eric Thompson</td>
						</tr>
						<tr class="link darkHover" onclick="profilePageChange()">
							<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="/img/global/profile-2.jpg"></td>
							<td>Evan Vinciguerra</td>
						</tr>
						<tr class="link darkHover" onclick="profilePageChange()">
							<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="/img/global/profile-3.jpg"></td>
							<td>Andi Richardson</td>
						</tr>
					</tbody>
				</table>
				<br>
				<h3 class="no-mg-b">Offer help</h3>
				<table class="table" style="border-color:#484848;">
					<tbody>
						<tr class="link darkHover" onclick="profilePageChange()">
							<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="/img/global/profile-1.jpg"></td>
							<td>Eric Thompson</td>
						</tr>
						<tr class="link darkHover" onclick="profilePageChange()">
							<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="/img/global/profile-2.jpg"></td>
							<td>Evan Vinciguerra</td>
						</tr>
						<tr class="link darkHover" onclick="profilePageChange()">
							<td class="ipadLandscapeHidden"><img class="roundedPhotoSmall" src="/img/global/profile-3.jpg"></td>
							<td>Andi Richardson</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
		<div class="col-md-8">
			<div class="col-md-12 no-pd dataContainer ipadSmaller">
				<h3>Class Completion Progress</h3>
				<div id="completionProgress" style="height: 322px;"></div>
			</div>
			<div class="col-md-12 no-pd">
				<div class="col-md-12">
					<h3>Next Concept to master</h3>
					<p>SEXY CONCEPT LINKS GO HERE</p>
				</div>
			</div>
			<div class="col-md-12">
				<div class="hidden-sm hidden-xs activityTable row">
					<div class="titleRow">
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
							while ($month < 8) {
								if($month == 7){
									echo '<div class="calendarBlock removeFirst calendarBlock_'.$month.'">';
								}
								elseif($month == 6){
									echo '<div class="calendarBlock removeSecond calendarBlock_'.$month.'">';
								}
								elseif($month == 5){
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
					</div>
				</div>	
			</div>
		</div>
		</div>

		<div class="clearfix"></div>



	</section>
</body>
