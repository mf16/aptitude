<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_page_specific_styling.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_global_styling.css">
<div id="workArea"></div>
<!-- wrapper -->
<div class="page-wrap pretestWrapper">
	<section id="headerSpacerSmall"></section>
		<section class="container loader">
		</section>
		<section class="body">
			<section class="row-fluid">
				<section class="col-xs-12 text-body">
					<section class="col-sm-2 col-xs-2 no-padding">
						<div class="chapter-number">
							<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/chapter-arrow.png"/>
						</div>
					</section>
					<section class="col-md-10 material-body col-sm-offset-1 col-xs-offset-1 col-md-offset-0">
						<section class="row-fluid section-title-container">
							<h1 class="section-title">sets of numbers</h1>
							<span class="section-number">PREQUIZ</span><br>
						</section>
						<section class="row-fluid prequizExplanation">
							<span class="prequizTitle">WELCOME TO THE PREQUIZ!</span>
							<p>This quiz is to help re-evaluate what you have already learned before you move onto the next chapter.</p>
							<br>
							<button class="readyButton col-md-3 col-xs-12">I'm Ready</button>
						</section>
					</section>
				</section>
			</section>
		</section>
	</section>
</div>
<footer class="site-footer">
  <section class="col-xs-4"><img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>
  <section class="col-xs-8 text-right" style="padding-right:45px;">SKIP PREQUIZ <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/right-arrow.png"  style="margin-left: 7px;"></section>

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