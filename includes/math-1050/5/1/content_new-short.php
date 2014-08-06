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
							<p class="vote-text">ongratulations! Looks like you already know quite a bit about <b>Composition of Functions</b>. Review the following bullet points, then scroll down to the next concept or post-reading problems.</p>
							<br/>
							<p class="text-center"><a onclick="showLongText();" href="">Click Here to Show entire text</a></p>
							<script>
								function showLongText(){
									$.ajax({url:"<?php echo $_SERVER['DOCUMENT_ROOT'];?>includes/class.Section.php?action=showLongText&subjectName=<?php echo $this->subjectName;?>&chapterid=<?php echo $this->subjectName;?>&sectionid=<?php echo $this->sectionid;?>",success:function(result){
										location.reload();
									}});
								}
							</script>
							<article class="col-xs-12 margin-top margin-bottom definition">
								<article class="col-md-2">
								</article>
								<article class="col-md-10">
									<blockquote>
										<p class="vote-text">The <strong>composite</strong> of \(g\) with \(f\), denoted \(g \circ f\), is deﬁned by the formula \((g \circ f)(x) = g(f(x))\), provided \(x\) is an element of the domain of \(f\) and \(f(x)\) is an element of the domain of \(g\).</p>
									</blockquote>
								</article>
							</article>
							</section>
						</section>

						<section class="col-md-2 no-padding">
						</section>
						<section class="col-md-10 text-body">
							<section class="">
								<p>
									<img class="graphImage" src="<?php echo $_SERVER['DOCUMENT_ROOT']?>img/math-1050/5/1/graph.png">
								</p>
							</section>
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
					<section class="col-lg-3 col-sm-12 col-sm-12 rightSideBar nano">
						<section class="row-fluid nano-content">
							<article class="col-xs-12 titleContainer">
								<!--Header goes here-->
								<h1 class="text-center fitHeader">Introduction</h1>
							</article><br>
							<section class="row-fluid content">
								<article class="col-xs-12">
									<article class="row-fluid hidden-md hidden-sm hidden-xs subtitleContainer">
										<!--Description sentance here-->
										<span>This is your go-to source for important imformation. If you pay attention to what this sidebar highlights you will retain information better and learn even faster. Here are some things to look for:</span>
									</article>
									<article class="row pointers">
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="importantInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/info.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Important info section-->
												<span class="importantInfo">This represents important information that is relevant to your current topic.</span>
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="expectedPitfalls">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')"  data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/warning.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Pitfalls section-->
												<span class="pitfalls">This represents common pitfalls and errors that if you read, you can avoid in assessments.</span>
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="moreInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/cluster.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Additional resources section-->
												<span class="externalResources">This represents where you can stop and go to another location for more learning resources.</span>
											</article>
										</section>
										<section class="hidden-xs col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="recycledConcept">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/refresh.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Recycled section-->
												<span class="">This represents that you already know the topic and that the question is just modified or asked in a different way.</span>
											</article>
										</section>
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
			  
			  	window.setInterval(function(){
				  time = player.getCurrentTime();
				  if (time > 0 && time < 88 && currentPosition == 0 && videoSequence == 0){
				  	replaceImportantInfo('Functions are like variables. But they represent an expression instead of just one number');
				  	videoSequence=1;
				  	currentPosition = 1;
				  }
				  else if (time > 88 && currentPosition == 1 && videoSequence == 1){
				  	replacePitfall('Be careful which function comes first. This can change the whole problem around.');
				  	videoSequence=2;
				  	currentPosition = 2;
				  }
				}, 1000);
			}

			// Inject YouTube API script
			var tag = document.createElement('script');
			tag.src = "//www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


			jQuery(".fitHeader").fitText(1);


			window.currentPostion = 0;
			function replacePitfall(text){
				$('#expectedPitfalls').animate({opacity: '0.0'}, 500, function() {
					$('.pitfalls').html(text);
					MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
					MathJax.Hub.Queue(complete); 
  				});
			}

			function replaceImportantInfo(text){
				$('#importantInformation').animate({opacity: '0.0'}, 500, function() {
					$('.importantInfo').html(text);
					MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
					$('#importantInformation').animate({opacity: '1.0'});
  				});
			}

			function replaceExternalResources(text){
				$('#expectedPitfalls').animate({opacity: '0.0'}, 500, function() {
					$('.pitfalls').html(text);
					MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
					$('#expectedPitfalls').animate({opacity: '1.0'});
  				});
			}

			$('.postDefinition').waypoint(function() {
			  	if(window.currentPostion !== 2){
					replaceImportantInfo('You can place a function within itself such as \\(f(f(x))\\). This is called \`iterating\' the function.');
					replaceExternalResources('<a href="https://www.youtube.com/watch?v=jlID_mIJXi4" target="_blank">More examples of evaluating composite functions.</a>');
					replacePitfall('<a href="https://www.youtube.com/watch?v=kAqaPxusaDg#t=1m13s" target="_blank">Here is a video of another common pitfall when compising functions.</a>');
					window.currentPostion = 2;
				}  
		  	}, { offset: '50%' });

		</script>

		<?php
		//echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/fitVid/fitVid.js"></script>';
