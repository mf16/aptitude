<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_global_styling.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_page_specific_styling.css">
<div id="workArea"></div>
<!-- wrapper -->
<div class="pretestWrapper page-wrap ">
	<section id="headerSpacerSmall"></section>
		<section class="container loader">
		</section>
		<section class="body">
			<section class="row-fluid">
				<section class="col-xs-12 text-body text-center pretestQuestionsContainer">
					<p>Let: \(x^2 - x + 1\) and \(g(x) = 3x - 5\)</p>
					<p>find f(g(x))</p>
					<br>
					<div class="input-group col-xs-12 col-md-4 col-md-offset-4">
						<div class="input-group-addon">\(f(g(x)) = \)</div>
						<input class="form-control" type="text">
					</div>
					<br>
					<button class="readyButton col-md-4 col-xs-12">I'm Ready</button>
				</section>
			</section>
		</section>
	</section>
</div>
<footer class="row site-footer">
  	<section class="col-md-4 col-xs-12"><img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>

	<section class="col-md-4 col-xs-12 text-center">
		<div class="meterwrapper">
			<!-- Start of meter -->
			<div class="meter">
				<span style="width:10%" title="10%"></span>
			</div><!-- End of meter -->
		</div>
	</section>

 	<section class="col-md-4 col-xs-12 text-right" style="padding-right:45px;">SKIP PREQUIZ <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/right-arrow.png"  style="margin-left: 7px;"></section>

</footer>

<script type="text/javascript">
	var $readyButton = $('.readyButton');
	$readyButton.click(function() {
		$readyButton.css('background-color', '#BEBEBE');
		$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=nextProblem&problemNum=1&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->chapterid;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
			$("#prequiz").html(result);
			$("#prequiz").css("padding-top","80px");
			$(".pretestWrapper").animate({opacity:"0.0"});
		}});
	});

	$(document).ready({
		$('input').css('height', $('.input-group-addon').css('height'));
	});
	
</script>
