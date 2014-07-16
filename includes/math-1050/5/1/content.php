<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_global_styling.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_page_specific_styling.css">
<div id="workArea"></div>
<!-- wrapper -->
<div class="page-wrap pretestWrapper">
	<section id="headerSpacerSmall"></section>
		<section class="container loader">
		</section>
		<section class="body">
			<section class="row-fluid">
				<section class="col-xs-12 text-body pretestQuestionsContainer">
					<p>Does the following graph represent a function?</p>
					<img class="graphQuestion" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/math-1050/problem_assets/1.png"/>
					<br>
					<input type="radio" id="radio1" name="radios" value="yes" checked>
				       <label for="radio1">Yes</label>
				    <input type="radio" id="radio2" name="radios" value="no">
				       <label for="radio2">No</label>
				</section>
				<section class="col-md-6 col-md-offset-3 text-center">
					<button class="readyButton">Next</button>
				</section>
			</section>
		</section>
	</section>
</div>
<footer class="site-footer row">
  	<section class="col-md-4"><img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>

	<section class="col-md-4 text-center">
		<div class="meterwrapper">
			<!-- Start of meter -->
			<div class="meter">
				<span style="width:10%" title="10%"></span>
			</div><!-- End of meter -->
		</div>
	</section>

 	<section class="col-md-4 text-right" style="padding-right:45px;">SKIP PREQUIZ <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/right-arrow.png"  style="margin-left: 7px;"></section>

</footer>

<script type="text/javascript">
	var $readyButton = $('.readyButton');
	$readyButton.click(function() {
		$readyButton.css('background-color', '#BEBEBE');
		$.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'] ?>includes/math-1050/5/1/ajaxElements/prequiz.php",success:function(result){
			$(".pretestWrapper").animate({opacity:"0.0"});
		}});
	});
	
</script>