<style type="text/css">
.fullDarkContainer{
	width: calc(100% + 30px);
background-color: #EBEBEB;
margin-left: -15px;
}
p, span{line-height: 25px;}
.padding-vertical{padding-top:30px; padding-bottom: 30px;}
.clearPadding{
	padding: 0px;
}
#workArea{
	height: 70px;
	width: 100%;
	background-color: white;
	position: absolute;
	top: -70px;
	left: 0px;
	z-index: 10;
	box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}




/*New designs css - start*/
h1{
	font-size: 60px;
	font-family: minion pro;
	color:#F79234;
	text-transform:uppercase;
	letter-spacing:2px;
}
/*.chapter-number>span{
	font-size: 1100%;
	font-family: minion pro;
	color: white;
	text-transform: uppercase;
	line-height: 300px;
	padding-right: 5px;
}*/
.chapter-number>img{
	width: 100%;
}
.text-body{
	padding-left: 0px !important;
	margin-top:5px;
}
.no-padding{
	padding:0px;
}
.material-body{
	padding-left: 0px;
	padding-top: 8%;
	padding-right: 25px;
}
.section-number{
	font-size: 20px;
	font-family: nexabold;
	color: #27292B;
	text-transform: uppercase;
	letter-spacing:4px;
	padding-bottom:30px;
}
.section-title{
	margin-bottom: 0px;
}
.video{
	padding-left:0px;
	padding-right: 0px;
	margin-right: 40px;
	margin-bottom: 25px;
}
.section-title-container{
	padding-bottom: 30px;
}
.leadingLetter{
	font-size: 60px;
	font-family: minion pro;
	color:#F79234;
	text-transform: uppercase;
	float: left;
	line-height: 50px;
}
.video-overlay{
	float: left;
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: #27292B;
	top: 0px;
	left: 0px;
	z-index: 100000;
}
.video-overlay>img{
	margin-top: -37px;
	top: 50%;
	position: relative;
	cursor: pointer;
}
.practiceTitle{
	font-family: nexabold;
	color: #F79234;
	font-size: 21px;
	padding-top: 30px;
	letter-spacing: 3px;
	padding-bottom: 10px;
}
.practiceWrapper{
	padding-right: 25px;
}
.practiceContainer{
	padding-left: 0px;
	margin-top:0px;
}
.practiceNumber{
	text-align: right;
	padding-right: 40px;
}
/*New designs css - end*/
</style>

<div id="workArea"></div>
<!-- wrapper -->
<div class="page-wrap">
			<section id="headerSpacerSmall"></section>
			<section class="container loader"></section>
			<section class="body">
               <button onclick="clearSessionVars();">CLICK HERE TO CLEAR SESSION VARS AND START OVER</button>
               <script>
                function clearSessionVars(){
                    $.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'];?>includes/class.Prequiz.php?action=clearSessionVars&subjectName=1&chapterid=1&sectionid=1",success:function(result){
                        console.log(result);
                        location.reload();
                    }
                    });
                }
               </script>

				<section class="row-fluid">
					<section class="col-lg-9 col-xs-12 text-body">
						<section class="col-md-2 no-padding">
							<div class="chapter-number">
								<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/chapter-arrow.png"/>
							</div>
						</section>
						<section class="col-md-10 material-body">
							<section class="row-fluid section-title-container">
								<h1 class="section-title">composition of functions</h1>
								<span class="section-number">section &nbsp; 1</span><br>
							</section>
							<section class="row-fluid">

							<section class="col-sm-12 col-lg-6 video" >
								<iframe src="http://www.youtube.com/embed/wUNWjd4bMmw?enablejsapi=1" id="introVideo" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<div class="video-overlay text-center" id="playVideo">
									<img src = "<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/play-button.png" />
								</div>
							</section>
							<article class="leadingLetter">C</article>
							<p>ongratulations! Looks like you already know <b>Composition of Functions</b> somewhat well, but let's go over a few things just to make sure you have a solid understanding.</p>
							<br/>
							<p class="text-center"><a onclick="showLongText();" href="">Click Here to Show entire text</a></p>
							<script>
								function showLongText(){
									$.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'];?>includes/class.Section.php?action=showLongText&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->subjectName;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
										location.reload();
									}});
								}
							</script>

							<br><p>Linear and quadratic functions were special cases of polynomial functions, which we studied in generality in Chapter 3. Chapter 3 culminated with the Real Factorization Theorem, Theorem 3.16, which says that all polynomial functions with real coefficients can be thought of as products of linear and quadratic functions. Our next step was to enlarge our field of study to rational functions in Chapter 4. Being quotients of polynomials, we can ultimately view this family of functions as being built up of linear and quadratic functions as well. So in some sense, Chapters 2, 3, and 4 can be thought of as an exhaustive study of linear and quadratic functions and their arithmetic combinations as described in Section 1.5. We now wish to study other algebraic functions, such as \(f(x) = \sqrt{x}\) and \(g(x) = x^{2/3}\), and the purpose of the first two sections of this chapter is to see how these kinds of functions arise from polynomial and rational functions. To that end, we first study a new way to combine functions as defined below.</p>
							</section>
						</section>


						<!--DEFINITION: START-->
						<section class="row-fluid" style="margin-right: 25px;">
							<article class="col-xs-12 margin-top margin-bottom definition">
								<article class="col-md-2">
								</article>
								<article class="col-md-10">
									<blockquote>
										<p>Suppose \(f\) and \(g\) are two functions. The <strong>composite</strong> of \(g\) with \(f\), denoted \(g \circ f\), is deﬁned by the formula \((g \circ f)(x) = g(f(x))\), provided \(x\) is an element of the domain of \(f\) and \(f(x)\) is an element of the domain of \(g\).</p>
									</blockquote>
								</article>
							</article>
						</section>
						<!--DEFINITION: END-->

						<section class="col-md-2 no-padding">
						</section>
						<section class="col-md-10 text-body">
							<section>
								<p>The quantity \(g \circ f\) is also read `\(g\) composed with \(f\)' or, more simply `\(g\) of \(f\).' At its most basic level, Definition 5.1 tells us to obtain the formula for \((g \circ f) (x)\), we replace every occurrence of \(x\) in the formula for \(g(x)\) with the formula we have for \(f(x)\). If we take a step back and look at this from a procedural, `inputs and outputs' perspective, Definition 5.1 tells us the output from \(g \circ f\) is found by taking the output from \(f\), \(f(x)\), and then making that the input to \(g\). The result, \(g(f(x))\), is the output from \(g \circ f\). From this perspective, we see \(g \circ f\) as a two step process taking an input \(x\) and first applying the procedure \(f\) then applying the procedure \(g\). Abstractly, we have:</p>
							</section>
							<section class="margin-top">
							<p>
								<img class="graphImage" src="<?php echo $_SERVER['DOCUMENT_ROOT']?>img/math-1050/5/1/graph.png">
							</p>
							</section>
							<article class="margin-top">
								<p>In the expression \(g(f(x))\), the function \(f\) is often called the 'inside' function while \(g\) is often called the 'outside' function. There are two ways to go about evaluating composite functions - 'inside out' and 'outside in' - depending on which function we replace with its formula first. Both ways are demonstrated in the following example.</p>
							</article>
						</section>




						
						<section class="clearfix"></section>
						<!--PRACTICE: START-->
						<section class="row-fluid">
							<article class="col-md-10 col-md-offset-2 practiceTitle no-padding">PRACTICE PROBLEMS</article>
						</section>

						<section class="row-fluid" style="margin-right: 25px;">
							<article class="col-xs-12 margin-top margin-bottom definition practiceContainer">
								<article class="col-md-2 practiceNumber">
									<h1>1.</h1>
								</article>
								<article class="col-md-10 no-padding">	
									test-text
								</article>
							</article>
						</section>
						<!--PRACTICE: END-->
					</section>



					<!--RIGHT SIDEBAR: BEGIN-->
					<section class="col-lg-3 col-sm-12 col-sm-12 rightSideBar">
						<section class="row-fluid">
							<article class="col-xs-12">
								<!--Header goes here-->
								<span class="header"></span>
							</article><br>
							<section class="row-fluid content">
								<article class="col-xs-12">
									<article class="row hidden-md hidden-sm hidden-xs">
										<!--Description sentance here-->
										<span></span>
									</article>
									<article class="row pointers">
										<!--<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="importantInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/info.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Important info section
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="expectedPitfalls">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')"  data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/warning.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Pitfalls section
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="moreInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/cluster.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Additional resources section
											</article>
										</section>
										<section class="hidden-xs col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="recycledConcept">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/refresh.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Recycled section
											</article>
										</section>-->
									</article>
								</article>
							</section>
						</section>
					</section>
					<!--RIGHT SIDEBAR: END-->
				</section>
			</section>
			<section class="footerSpacer">
			</section>
		</div>
		<!-- wrapper : end -->
		<footer class="site-footer col-md-12">
			<section class="col-md-3">
				<img src = "<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icon.ico" />
				<span>Powered by Aptitude LLC.</span>
			</section>
			<section class="col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6" id="feedback">
				<a href="feedback.php"><span>Have feedback?</span></a>
			</section>
		</footer>

		<!-- Important Imformation Modal -->
		<div class="modal fade" id="importantInformationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Important Information</h4>
		      </div>
		      <div class="modal-body">
		       	...
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>


		<script type="text/javascript">
			var profilePage = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>profile";

			$( "input" ).click(function() {
				$('#workArea').animate({
						top: '0px'
					}, 1000, function(){
						//end animation
					});
			});

			$('.video-overlay').click(function() {
				$(".video-overlay").delay(10000).css('display', 'none');
			});



			// https://developers.google.com/youtube/iframe_api_reference

			// global variable for the player
			var player;

			// this function gets called when API is ready to use
			function onYouTubePlayerAPIReady() {
			  // create the global player from the specific iframe (#video)
			  player = new YT.Player('introVideo', {
			    events: {
			      // call this function when player is ready to use
			      'onReady': onPlayerReady
			    }
			  });
			}

			function onPlayerReady(event) {
			  
			  // bind events
			  var playButton = document.getElementById("playVideo");
			  playButton.addEventListener("click", function() {
			    $(".video").animate({width:"100%"});
			    player.playVideo();
			  });
			  
			}

			// Inject YouTube API script
			var tag = document.createElement('script');
			tag.src = "//www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);




		</script>

		<?php
		//echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/fitVid/fitVid.js"></script>';
