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
				<section class="col-xs-12 text-body">
                    <br/>
                    <?php
                        if(isset($_SESSION['math1050-prequiz'])){
                            echo '<p>r u reddy 2 continew teh pre-test?</p><br>
                            <script>
                            $.ajax({url:"/aptitude/includes/class.Prequiz.php?action=nextProblem&subjectName='. $this->subjectName.'&chapterid='. $this->chapterid.'&sectionid='. $this->sectionid.'",success:function(result){
								$("#prequiz").html(result);
								$("#prequiz").css("padding-top","80px");
								//$(".pretestWrapper").animate({opacity:"0.0"});
							}});</script>';
                        } else {
                            echo '<section class="col-sm-2 col-xs-2 no-padding">
						<div class="chapter-number">
							<img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/chapter-arrow.png"/>
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
							<button class="readyButton col-md-3 col-xs-12">I\'m Ready</button>
						</section>
					</section>';
                        }
                    ?>
				</section>
			</section>
		</section>
	</section>
</div>

<script type="text/javascript">
	var $readyButton = $('.readyButton');
	$readyButton.click(function() {
		$readyButton.css('background-color', '#BEBEBE');
		$( ".text-body" ).addClass( "text-center pretestQuestionsContainer" );
		$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=nextProblem&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->chapterid;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
			$("#prequiz").html(result);
			$("#prequiz").css("padding-top","80px");
			//$(".pretestWrapper").animate({opacity:"0.0"});
		}});
	});
	
</script>
