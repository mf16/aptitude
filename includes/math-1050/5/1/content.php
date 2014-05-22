<style type="text/css">
.fullDarkContainer{
	width: 103%;
background-color: rgb(233, 233, 233);
margin-left: -15px;
}
</style>

<!-- wrapper -->
<div class="page-wrap">
			<section id="headerSpacerSmall"></section>
			<section class="container loader"></section>
			<section class="body">
				<section class="row-fluid">
					<section class="col-lg-9 col-xs-12">
						<section class="row-fluid margin-top" id="initialSpacer">
							<section class="col-lg-12">
								<section class="col-sm-12 col-lg-6 video">
									<iframe src="//www.youtube.com/embed/VhokQhjl5t0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</section>
								<article class="col-lg-6 headerOutline">
									<span>Sets of Numbers</span>
								</article>
								<p>Before we embark upon any further adventures with functions, we need to take some time to gather our thoughts and gain some perspective. Chapter 1 first introduced us to functions in Section 1.3. At that time, functions were specific kinds of relations - sets of points in the plane which passed the Vertical Line Test, Theorem 1.1. In Section 1.4, we developed the idea that functions are processes - rules which match inputs to outputs - and this gave rise to the concepts of domain and range. We spoke about how functions could be combined in Section 1.5 using the four basic arithmetic operations, took a more detailed look at their graphs in Section 1.6 and studied how their graphs behaved under certain classes of transformations in Section 1.7. In Chapter 2, we took a closer look at three families of functions: linear functions (Section 2.1), absolute value functions1 (Section 2.2), and quadratic functions (Section 2.3). Linear and quadratic functions were special cases of polynomial functions, which we studied in generality in Chapter 3. Chapter 3 culminated with the Real Factorization Theorem, Theorem 3.16, which says that all polynomial functions with real coefficients can be thought of as products of linear and quadratic functions. Our next step was to enlarge our field of study to rational functions in Chapter 4. Being quotients of polynomials, we can ultimately view this family of functions as being built up of linear and quadratic functions as well. So in some sense, Chapters 2, 3, and 4 can be thought of as an exhaustive study of linear and quadratic functions and their arithmetic combinations as described in Section 1.5. We now wish to study other algebraic functions, such as \(f(x) = \sqrt{x}\) and \(g(x) = x^{2/3}\), and the purpose of the first two sections of this chapter is to see how these kinds of functions arise from polynomial and rational functions. To that end, we first study a new way to combine functions as defined below.</p>
							</section>
						</section>
						<section class="row-fluid"><!--DEFINITION: START-->
							<article class="col-xs-12 margin-top">
								<article class="definition">
									<blockquote>
										<p>Suppose \(f\) and \(g\) are two functions. The <strong>composite</strong> of \(g\) with \(f\), denoted \(g \circ f\), is deﬁned by the formula \((g \circ f)(x) = g(f(x))\), provided \(x\) is an element of the domain of \(f\) and \(f(x)\) is an element of the domain of \(g\).</p>
									</blockquote>
								</article>
							</article>
						</section><!--DEFINITION: END-->
						<section class="row-fluid">
							<section class="col-xs-12 margin-top">
								<p>The quantity \(g \circ f\) is also read `\(g\) composed with \(f\)' or, more simply `\(g\) of \(f\).' At its most basic level, Definition 5.1 tells us to obtain the formula for \((g \circ f) (x)\), we replace every occurrence of \(x\) in the formula for \(g(x)\) with the formula we have for \(f(x)\). If we take a step back and look at this from a procedural, `inputs and outputs' perspective, Definition 5.1 tells us the output from \(g \circ f\) is found by taking the output from \(f\), \(f(x)\), and then making that the input to \(g\). The result, \(g(f(x))\), is the output from \(g \circ f\). From this perspective, we see \(g \circ f\) as a two step process taking an input \(x\) and first applying the procedure \(f\) then applying the procedure \(g\). Abstractly, we have:</p>
							</section>
							<section class="col-xs-12 margin-top">
								<img class="graphImage" src="<?php echo $_SERVER['DOCUMENT_ROOT']?>img/math-1050/5/1/graph.png">
							</section>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12">
								<p>In the expression \(g(f(x))\), the function \(f\) is often called the 'inside' function while \(g\) is often called the 'outside' function. There are two ways to go about evaluating composite functions - 'inside out' and 'outside in' - depending on which function we replace with its formula first. Both ways are demonstrated in the following example.</p>
							</article>
						</section>
						<section class="row-fluid">
							<div class="col-xs-12 margin-top fullDarkContainer">
								<div class="col-md-12 margin-top practiceProblems">
									<div class="col-sm-12 col-lg-1">
										<span>Let</span><br> 
									</div>
									<div class="col-sm-12 col-lg-3">
										<span>\(f(x) = x^2-4x\)</span><br>
									</div>
									<div class="col-sm-12 col-lg-3">
										<span>\(g(x) = 2-\sqrt{x+3}\)</span><br>
									</div>
									<div class="col-sm-12 col-lg-3">
										<span>\(h(x) = \dfrac{2x}{x+1}\)</span><br>
									</div>
								</div>	
							</div>
						</section>
					</section>



					<!--RIGHT SIDEBAR: BEGIN-->
					<section class="col-lg-3 col-sm-12 col-sm-12 rightSideBar">
						<section class="row-fluid">
							<article class="col-xs-12">
								<!--Header goes here-->
								<span class="header"></span>
							</article><br>
							<article class="divider col-xs-12"></article>
							<section class="row-fluid content">
								<article class="col-xs-12">
									<article class="row hidden-md hidden-sm hidden-xs">
										<!--Description sentance here-->
										<span></span>
									</article>
									<article class="row pointers">
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="importantInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/info.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Important info section-->
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="expectedPitfalls">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')"  data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/warning.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Pitfalls section-->
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="moreInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/cluster.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Additional resources section-->
											</article>
										</section>
										<section class="hidden-xs col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="recycledConcept">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('', '')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/refresh.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												<!--Recycled section-->
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
		</script>

		<?php
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/fitVid/fitVid.js"></script>';