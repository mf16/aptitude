<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_global_styling.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>css/includes/math-1050/5/1/pretest_page_specific_styling.css">
<script type='text/x-mathjax-config'>
	MathJax.Hub.Config({
        extensions: ['TeX/cancel.js'],
        TeX: {extensions: ['color.js']},
        tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']], preview: 'none'},
        'HTML-CSS': {showMathMenu: false},
        skipStartupTypeset: true
    });
</script>
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
                            echo '<script>
                            $.ajax({url:"'.$_SERVER["DOCUMENT_ROOT"].'includes/class.Prequiz.php?action=nextProblem&subjectName='. $this->subjectName.'&chapterid='. $this->chapterid.'&sectionid='. $this->sectionid.'",success:function(result){
								$("#prequiz").html(result);
								$("#prequiz").css("padding-top","80px");
								//$(".pretestWrapper").animate({opacity:"0.0"});
							}});</script>';
                        } else {
                            echo '<section class="col-sm-2 hidden-xs no-padding">
						<div class="chapter-number">
							<img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/chapter-arrow.png"/>
						</div>
					</section>
					<section class="col-md-10 material-body col-sm-offset-1 col-xs-offset-1 col-md-offset-0">
						<section class="row-fluid section-title-container">
							<h1 class="section-title">Composition of Functions</h1>
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
<div class="clear-fix"></div>
<footer class="row site-footer">
  	<section class="col-md-4 col-xs-12" style="cursor:pointer" onclick='window.location.href = "http://goaptitude.com/demo";'><img src="<?php echo $_SERVER['DOCUMENT_ROOT'];?>img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>

	<section class="col-md-4 col-xs-12 text-center">
		<div class="meterwrapper">
			<!-- Start of meter -->
			<div class="meter">
				<span id="meterSpan" style="width:0%" ></span>
			</div><!-- End of meter -->
		</div>
	</section>

 	<section class="col-md-4 col-xs-12 text-right" onclick="skipPrequiz();" style="padding-right:45px;cursor:pointer;">SKIP PREQUIZ <img src="<?php echo $_SERVER['DOCUMENT_ROOT'];?>img/global/right-arrow.png"  style="margin-left: 7px;"></section>
	<script>
		function skipPrequiz(){
			$.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'];?>includes/class.Prequiz.php?action=skipQuiz&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->subjectName;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
				location.reload();
			}});
		}
	</script>

</footer>

<script type="text/javascript" src="<?php echo $_SERVER['DOCUMENT_ROOT'];?>js/fittext/fittext.js"></script>
<script type="text/javascript">
	var $readyButton = $('.readyButton');
	$readyButton.click(function() {
		$readyButton.css('background-color', '#BEBEBE');
		$( ".text-body" ).addClass( "text-center pretestQuestionsContainer" );
		$.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'];?>includes/class.Prequiz.php?action=nextProblem&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->chapterid;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
			$("#prequiz").html(result);
		  	$.getScript( "<?php echo $_SERVER['DOCUMENT_ROOT']; ?>js/equationEditor/functions.js" )
			  .done(function( script, textStatus ) {
			    console.log( textStatus );
			  })
			  .fail(function( jqxhr, settings, exception ) {
			    console.log( "Triggered ajaxError handler." );
			});

			$("#prequiz").css("padding-top","80px");
			//$(".pretestWrapper").animate({opacity:"0.0"});
		}});
	});

	jQuery(".section-title").fitText(1.0, { maxFontSize: '60px' });
	jQuery(".prequizTitle").fitText(1.0, { maxFontSize: '34px' });

	
</script>
