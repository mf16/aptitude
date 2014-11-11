<?php
include_once '../includes/global.php';
include_once '../head.php';
?>
	  <script>
  $(function() {
    $( ".sortable" ).sortable();
    $( ".sortable" ).disableSelection();
    $( ".subSortable" ).sortable();
    $( ".subSortable" ).disableSelection();
  });
  </script>
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
	<style type="text/css">
	/*GLOBAL STYLING*/
	h1{
		font-size: 60px;
		font-family: minion pro;
		color: #F79234;
		text-transform: uppercase;
	letter-spacing: 2px;
	}
	.grayBg{
		background-color: #EBEBEB;
	}
	/*GLOBAL STYLING*/


	.modifyContentContainer{
		background-color: white;
		border: solid 1px #ADADAD;
		border-radius: 10px;
		min-height: 25px;
	}
	.horizontalSort{
		float: left;
	}

.sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	.sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
	.sortable li span { position: absolute; margin-left: -1.3em; }

	.subSortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	.subSortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
	.subSortable li span { position: absolute; margin-left: -1.3em; }
	</style>
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
		<div class="modifyContentContainer">
			<ul class="sortable">
			  <li class="ui-state-default verticalSort">
			  	<select class="form-control">
  					<option value="definition">Definition</option>
  					<option value="example">Example</option>
  					<option value="summary">Summary</option>
  					<option value="explantation">Explantation</option>
  				</select>
			  	<ul class="subSortable">
			  		<li class="horizontalSort">
			  				<select class="form-control">
			  					<option value="video">Video</option>
			  					<option value="text">Text</option>
			  					<option value="interactive">Interactive</option>
			  				</select>
			  				Test text
			  		</li>
			  		<li class="horizontalSort">
			  			<select class="form-control">
		  					<option value="video">Video</option>
		  					<option value="text">Text</option>
		  					<option value="interactive">Interactive</option>
		  				</select>
			  			Section 2
			  		</li>
			  	</ul>
			  </li>
			  <li class="ui-state-default verticalSort">
			  	<select class="form-control">
  					<option value="definition">Definition</option>
  					<option value="example">Example</option>
  					<option value="summary">Summary</option>
  					<option value="explantation">Explantation</option>
  				</select>
			  	<ul class="subSortable">
			  		<li class="horizontalSort">
			  				<select class="form-control">
			  					<option value="video">Video</option>
			  					<option value="text">Text</option>
			  					<option value="interactive">Interactive</option>
			  				</select>
			  				Test text
			  		</li>
			  		<li class="horizontalSort">
			  			<select class="form-control">
		  					<option value="video">Video</option>
		  					<option value="text">Text</option>
		  					<option value="interactive">Interactive</option>
		  				</select>
			  			Section 2
			  		</li>
			  	</ul>
			  </li>
			</ul>

		</div>

	</section>

</body>