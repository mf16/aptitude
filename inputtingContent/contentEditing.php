<?php
include_once '../includes/global.php';
include_once '../head.php';
?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="style.css">
  <script src="js/script.js"></script>
<body class="grayBg">
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
	<section class="col-md-1 no-pd mg-t-md">
		<div class="chapter-number">
			<img src="/img/global/solid-arrow.png">
		</div>
	</section>
	<section class="col-md-10 mg-t-lg">
		<div class="title">
			<h1>Modify Content</h1>
			<select class="form-control">
				<option>----Select a section to edit----</option>
				<optgroup label="Chapter 1">
					<option value="">Section 1</option>
					<option value="">Section 2</option>
				</optgroup>
				<optgroup label="Chapter 2">
					<option value="">Section 1</option>
					<option value="">Section 2</option>
				</optgroup>
			</select>
		</div>
		<div class="modifyContentContainer mg-t-md">
<!-- COPIED TO HERE-->
			<section class="sortable">
				<article class="ui-state-default verticalSort">
					<i class="fa fa-arrows-v pull-left"></i>
					<i class="fa fa-plus"></i>
					<i class="fa fa-times"></i>
					<select class='sideSelection'>
						<option>--Type--</option>
						<option value="definition">Definition</option>
	  					<option value="example">Example</option>
	  					<option value="summary">Summary</option>
	  					<option value="explantation">Explantation</option>
					</select>
					<span class="pull-left">Sort 1</span>
					<input type="text">
					<input type="text">
					<section class="subSortable ui-sortable">
				  		<article class="horizontalSort">
					  		<div class="wrap">
					  			<i class="fa fa-arrows-h"></i>
				  				<select>
				  					<option value="video">Video</option>
				  					<option value="text">Text</option>
				  					<option value="interactive">Interactive</option>
				  				</select>
					  			<i class="fa fa-pencil-square-o"></i>
					  			<i class="fa fa-times"></i>
				  				Meatloaf turducken alcatra short loin. Meatloaf spare ribs andouille, tongue filet mignon ground round beef ribs. Kevin leberkas short ribs andouille ham, turkey kielbasa hamburger beef ribs rump spare ribs meatball shoulder. Leberkas venison tri-tip beef ribs shank cow. Andouille tail meatball, t-bone spare ribs sirloin strip steak ham pig doner cow boudin alcatra. Andouille jerky t-bone, prosciutto fatback ham bacon spare ribs ribeye shoulder kevin kielbasa.
					  		</div>
				  		</article>
				  		<article class="horizontalSort">
					  		<div class="wrap">
					  			<i class="fa fa-arrows-h"></i>
				  				<select>
				  					<option value="video">Video</option>
				  					<option value="text">Text</option>
				  					<option value="interactive">Interactive</option>
				  				</select>
					  			<i class="fa fa-pencil-square-o"></i>
					  			<i class="fa fa-times"></i>
				  				Meatloaf turducken alcatra short loin. Meatloaf spare ribs andouille, tongue filet mignon ground round beef ribs. Kevin leberkas short ribs andouille ham, turkey kielbasa hamburger beef ribs rump spare ribs meatball shoulder. Leberkas venison tri-tip beef ribs shank cow. Andouille tail meatball, t-bone spare ribs sirloin strip steak ham pig doner cow boudin alcatra. Andouille jerky t-bone, prosciutto fatback ham bacon spare ribs ribeye shoulder kevin kielbasa.
					  		</div>
				  		</article>
				  		<article class="horizontalSort">
					  		<div class="wrap">
					  			<i class="fa fa-arrows-h"></i>
				  				<select>
				  					<option value="video">Video</option>
				  					<option value="text">Text</option>
				  					<option value="interactive">Interactive</option>
				  				</select>
					  			<i class="fa fa-pencil-square-o"></i>
					  			<i class="fa fa-times"></i>
				  				Meatloaf turducken alcatra short loin. Meatloaf spare ribs andouille, tongue filet mignon ground round beef ribs. Kevin leberkas short ribs andouille ham, turkey kielbasa hamburger beef ribs rump spare ribs meatball shoulder. Leberkas venison tri-tip beef ribs shank cow. Andouille tail meatball, t-bone spare ribs sirloin strip steak ham pig doner cow boudin alcatra. Andouille jerky t-bone, prosciutto fatback ham bacon spare ribs ribeye shoulder kevin kielbasa.
					  		</div>
				  		</article>
				  	</section>
				</article>
			</section>
			<i class="fa fa-plus"></i>
		</div>

</body>
