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
                    <br/>
                    <?php
                        if(isset($_SESSION['math1050-prequiz'])){
                            echo '<p>r u reddy 2 continew teh pre-test?</p>';
                        } else {
                            echo '<p>r u reddy 2 lurn?</p>';
                        }
                    ?>
					<button class="readyButton">I'm Ready</button>
				</section>
			</section>
		</section>
	</section>
</div>

<script type="text/javascript">
	var $readyButton = $('.readyButton');
	$readyButton.click(function() {
		$readyButton.css('background-color', '#BEBEBE');
		$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=nextProblem&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->chapterid;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
			$("#prequiz").html(result);
			$("#prequiz").css("padding-top","80px");
			//$(".pretestWrapper").animate({opacity:"0.0"});
		}});
	});
	
</script>
