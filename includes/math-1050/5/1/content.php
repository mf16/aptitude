<!-- wrapper -->
<div class="page-wrap">
			<section id="headerSpacerSmall"></section>
			<section class="container loader"></section>
			<section class="body">
				<section class="row-fluid">
					<section class="col-lg-9 col-xs-12">
						<section class="row-fluid margin-top" id="initialSpacer">
							<section class="col-sm-12 col-lg-6 video">
								<iframe src="//www.youtube.com/embed/VhokQhjl5t0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</section>
							<section class="col-sm-12 col-lg-6">
								<article class="headerOutline">
									<span>Sets of Numbers</span>
								</article><br>
								<article>
									<p>Before we embark upon any further adventures with functions, we need to take some time to gather our thoughts and gain some perspective. Chapter 1 rst introduced us to functions in Section 1.3. At that time, functions were specic kinds of relations - sets of points in the plane which passed the Vertical Line Test, Theorem 1.1. In Section 1.4, we developed the idea that functions are processes - rules which match inputs to outputs - and this gave rise to the concepts of domain and range. We spoke about how functions could be combined in Section 1.5 using the four basic arithmetic operations, took a more detailed look at their graphs in Section 1.6 and studied how their graphs behaved under certain classes of transformations in Section 1.7. In Chapter 2, we took a closer look at three families of functions: linear functions (Section 2.1), absolute value functions1 (Section 2.2), and quadratic functions (Section 2.3). Linear and quadratic functions were special cases of polynomial functions, which we studied in generality in Chapter 3. Chapter 3 culminated with the Real Factorization Theorem, Theorem 3.16, which says that all polynomial functions with real coecients can be thought of as products of linear and quadratic functions. Our next step was to enlarge our eld2 of study to rational functions in Chapter 4. Being quotients of polynomials, we can ultimately view this family of functions as being built up of linear and quadratic functions as well. So in some sense, Chapters 2, 3, and 4 can be thought of as an exhaustive study of linear and quadratic3 functions and their arithmetic combinations as described in Section 1.5. We now wish to study other algebraic functions, such as f(x) = p x and g(x) = x2=3, and the purpose of the rst two sections of this chapter is to see how these kinds of functions arise from polynomial and rational functions. To that end, we rst study a new way to combine functions as dened below.</p>
								</article>
							</section>
						</section>
						<section class="row-fluid"><!--DEFINITION: START-->
							<article class="col-xs-12 margin-top">
								<article class="definition">
									<blockquote>
										<p>A <strong>set</strong> is a well-deﬁned collection of objects which are called the ‘elements’ of the set. Here, ‘well-deﬁned’ means that it is possible to determine if something belongs to the collection or not, without prejudice.</p>
									</blockquote>
								</article>
							</article>
						</section><!--DEFINITION: END-->
						<section class="row-fluid">
							<section class="col-xs-12 col-lg-6 margin-top">
								<article>
									<p>For example, the collection of letters that make up the word “smolko” is well-deﬁned and is a set, but the collection of the worst math teachers in the world is <strong>not</strong> well-deﬁned, and so is <strong>not</strong> a set. In general, there are three ways to describe sets. They are:</p>
									<section class="col-xs-12 dataContainer">
										<h3>Ways to describe sets</h3>
										<ol>
											<li>The Verbal Method: Use a sentence to deﬁne a set.</li>
											<li>The Roster Method: Begin with a left brace ‘{’, list each element of the set <i>only once</i> and then end with a right brace ‘}’.</li>
											<li>The Set-Builder Method: A combination of the verbal and roster methods using a “dummy variable” such as \(x\).</li>
										</ol>
									</section>
								</article>
								<article style="top: 25px; position:relative;">
									<p>For example, let \(S\) be the set described <i>verbally</i> as the set of letters that make up the word “smolko”. A <strong>roster</strong> description of \(S\) would be {<i>s,m,o,l,k</i>}. Note that we listed ‘o’ only once, even though it appears twice in “smolko.” Also, the <i>order</i> of the elements doesn’t matter, so {<i>k,l,m,o,s</i>} is also a roster description of S. A <strong>set-builder</strong> description of \(S\) is:</p>
									<br><p class="text-center standoutText">{x|x is a letter in the word “smolko”.}</p>
								</article>
							</section>
							<section class="col-xs-12 col-lg-6 margin-top">	
								<p>The way to read this is: ‘The set of elements \(x\) <u>such that</u> \(x\) is a letter in the word “smolko.”’ In each of the above cases, we may use the familiar equals sign ‘=’ and write \(S\) = {<i>s,m,o,l,k</i>} or \(S\) = {x|x is a letter in the word “smolko”.}. Clearly \(m\) is in \(S\) and \(q\) is not in \(S\). We express these sentiments mathematically by writing  \(m  \in S\) and \(q \notin S\). Throughout your mathematical upbringing, you have encountered several famous sets of numbers. They are listed below:</p>
								<ol class="link">
								    <li data-toggle="collapse" data-target="#setOfNumbers1">
								    	<span class="standoutText standoutTextLink">Empty Set</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers1">
								            <li>\(\emptyset=\{ \}=\{x\,|\,\mbox{$x \neq x$}\}\). This is the set with no elements. Like the number ‘0,’ it plays a vital role in mathematics.</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers2">
								    	<span class="standoutText standoutTextLink">Natural Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers2">
								            <li>\(\mathbb N= \{ 1, 2, 3,  \ldots\}\) The periods of ellipsis here indicate that the natural numbers contain 1, 2, 3, ‘and so forth’.</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers3">
								    	<span class="standoutText standoutTextLink">Whole Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers3">
								            <li>\(\mathbb W = \{ 0, 1, 2, \ldots \}\)</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers4">
								    	<span class="standoutText standoutTextLink">Integers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers4">
								            <li>\(\mathbb Z=\{ \ldots, -1, -2, -1, 0, 1, 2, 3, \ldots \}\)</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers5">
								    	<span class="standoutText standoutTextLink">Rational Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers5">
								            <li>\(\mathbb Q=\left\{\frac{a}{b} \, | \, a \in \mathbb Z \, \mbox{and} \, b \in \mathbb Z \right\}\). Rational numbers are the ratios of integers (provided the denominator is not zero!) It turns out that another way to describe the rational numbers is: \mathbb Q=\{x\,|\,\mbox{$x$ possesses a repeating or terminating decimal representation.}\}</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers6">
								    	<span class="standoutText standoutTextLink">Real Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers6">
								            <li>\(\mathbb R = \{ x\,|\,\mbox{$x$ possesses a decimal representation.}\}\)</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers7"> 
								    	<span class="standoutText standoutTextLink">Irrational Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers7">
								            <li>\(\mathbb P = \{x\,|\,\mbox{$x$ is a non-rational real number.}\}\) Said another way, an irrational number is a decimal which neither repeats nor terminates.</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers8"> 
								    	<span class="standoutText standoutTextLink">Complex Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers8">
								            <li>\(\mathbb C=\{a+bi\,|\,\mbox{$a$,$b \in \mathbb R$ and $i=\sqrt{-1}$}\}\) Despite their importance, the complex numbers play only a minor role in the text.</li>
								        </ul>
								    </li>
								</ol>
							</section>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12 contentDivider" style="margin-top:50px;">
							</article>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12">
								<p>It is important to note that every natural number is a whole number, which, in turn, is an integer. Each integer is a rational number (take \(b =1\) in the above deﬁnition for \(\mathbb Q\)) and the rational numbers are all real numbers, since they possess decimal representations.3 If we take \(b=0\) in the above deﬁnition of \(\mathbb C\), we see that every real number is a complex number. In this sense, the sets \(\mathbb N\), \(\mathbb W\), \(\mathbb Z\), \(\mathbb Q\), \(\mathbb R\), and \(\mathbb C\) are ‘nested’ like Matryoshka dolls.</p>
								<p>For the most part, this textbook focuses on sets whose elements come from the real numbers \(\mathbb R\). Recall that we may visualize \(\mathbb R\) as a line. Segments of this line are called intervals of numbers. Below is a summary of the so-called interval notation associated with given sets of numbers. For intervals with ﬁnite endpoints, we list the left endpoint, then the right endpoint. We use square brackets, ‘\([\)’ or ‘\(]\)’, if the endpoint is included in the interval and use a ﬁlled-in or ‘closed’ dot to indicate membership in the interval. Otherwise, we use parentheses, ‘\((\)’ or ‘\()\)’ and an ‘open’ circle to indicate that the endpoint is not part of the set. If the interval does not have ﬁnite endpoints, we use the symbols \(-\infty\) to indicate that the interval extends indeﬁnitely to the left and \(\infty\) to indicate that the interval extends indeﬁnitely to the right. Since inﬁnity is a concept, and not a number, we always use parentheses when using these symbols in interval notation, and use an appropriate arrow to indicate that the interval extends indeﬁnitely in one (or both) directions.</p>
							</article>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12 contentDivider">
							</article>
						</section>
						<section class="row-fluid"><!--TABLE OF REAL NUMBERS-->
							<!--<section class="col-lg-3 dataContainer hidden-md hidden-sm hidden-xs">
							</section>-->
							<section class="col-sm-12 col-lg-9 col-lg-offset-1">
								<table class="table orangeTable">
									<thead>
										<tr>
											<th>Set of Real Numbers</th>
											<th>Interval Notation</th>
											<th>Region on the Real Number Line</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>\(\{x\,|\, a < x < b\}\)</td>
											<td>\((a,b)\)</td>
											<td><div class="numberLine" id="numberLine1"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,|\,a\leq x< b\}\)</td>
											<td>\([a,b)\)</td>
											<td><div class="numberLine" id="numberLine2"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,|\, a < x\leq b\}\)</td>
											<td>\((a,b]\)</td>
											<td><div class="numberLine" id="numberLine3"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,|\,a\leq x \leq b\}\)</td>
											<td>\([a,b]\)</td>
											<td><div class="numberLine" id="numberLine4"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,| \, x< b\}\)</td>
											<td>\((-\infty,b)\)</td>
											<td><div class="numberLine" id="numberLine5"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,| \, x \leq b\}\)</td>
											<td>\((-\infty,b]\)</td>
											<td><div class="numberLine" id="numberLine6"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,| \, x>a\}\)</td>
											<td>\((a,\infty)\)</td>
											<td><div class="numberLine" id="numberLine7"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,| \, x \geq a \}\)</td>
											<td>\([a,\infty)\)</td>
											<td><div class="numberLine" id="numberLine8"></div></td>
										</tr>
										<tr>
											<td>\(\mathbb R\)</td>
											<td>\((-\infty,\infty)\)</td>
											<td><div class="numberLine" id="numberLine9"></div></td>
										</tr>
									</tbody>
								</table>
								<div class="contentDividerLine"></div><br>
								<p>For an example, consider the sets of real numbers described below.</p><br>
								<table class="table orangeTable">
									<thead>
										<tr>
											<th>Set of Real Numbers</th>
											<th>Interval Notation</th>
											<th>Region on the Real Number Line</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>\(\{x\,|\,1\leq x< 3\}\)</td>
											<td>\([1,3)\)</td>
											<td><div class="numberLine" id="numberLine13"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,|\,-1\leq x \leq 4\}\)</td>
											<td>\([-1,4]\)</td>
											<td><div class="numberLine" id="numberLine10"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,| \, x \leq 5 \}\)</td>
											<td>\((\infty, 5]\)</td>
											<td><div class="numberLine" id="numberLine11"></div></td>
										</tr>
										<tr>
											<td>\(\{x\,| \, x > -2 \}\)</td>
											<td>\((-2, \infty)\)</td>
											<td><div class="numberLine" id="numberLine12"></div></td>
										</tr>
									</tbody>
								</table>
							</section>
						</section><!--TABLE OF REAL NUMBERS: END-->
						<section class="row-fluid">
							<section class="col-lg-12">
								<div class="contentDividerLine"></div><br>
							</section>
							<section class="col-lg-12">
								<p>We will often have occasion to combine sets. There are two basic ways to combine sets: intersec-tion and union. We define both of these concepts below.</p>
								<section class="col-lg-12 definition">
									<blockquote>
										<p>Suppose \(A\) and \(B\) are two sets.</p>
		 									<ul>
												<li><strong>Interstion</strong> of \(A\) and \(B\): \(A \cap B = \{ x \, | \, x \in A \, \text{and} \,\, x \in B \}\)</li>
				   								<li><strong>Union</strong> of \(A\) and \(B\): \(A \cup B = \{ x \, | \, x \in A \, \text{or} \,\, x \in B \, \, \text{(or both)} \}\)</li>
											</ul>
									</blockquote>
								</section>
							</section>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12 contentDivider">
							</article>
						</section>
						<section class="row-fluid">

							<section class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<p>Said differently, the intersection of two sets is the overlap of the two sets - the elements which the sets have in common. The union of two sets consists of the totality of the elements in each of the sets, collected together. For example, if \(A = \{ 1,2,3 \}\) and \(B = \{2,4,6 \}\), then \(A \cap B = \{2\}\) and \(A \cup B = \{1,2,3,4,6\}\). If \(A = [-5,3)\) and \(B = (1, \infty)\), then we can find \(A \cap B\) and \(A\cup B\) graphically. To find \(A\cap B\), we shade the overlap of the two and obtain \(A \cap B = (1,3)\). To find \(A \cup B\), we shade each of \(A\) and \(B\) and describe the resulting shaded region to find \(A \cup B = [-5,\infty)\).</p>
								<br>
								<p>While both intersection and union are important, we have more occasion to use union in this text than intersection, simply because most of the sets of real numbers we will be working with are either intervals or are unions of intervals, as the following example illustrates.</p>
							</section>
							<section class="col-lg-6 col-md-12 col-sm-12 col-xs-12 video">
								<iframe src="//www.youtube.com/embed/jAfNg3ylZAI" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</section>
						</section>
						<section class="row-fluid">
							<section class="col-lg-12 margin-top">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-12 dataContainer practiceProblems">
										<p>1. \(\{ x \, | \, x \leq -2 \, \, \text{or} \, \,  x \geq 2 \}\)</p>
										<span class="link">Try it out!</span><br>
										<p class="link">Explain more</p><br>
										<p>2. \(\{ x \, | \, x \neq 3 \}\)</p>
										<span class="link">Try it out!</span><br>
										<span class="link">Explain more</span><br>
									</div>	
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-12 dataContainer practiceProblems">	
										<p>3. \(\{ x \, | \, x \neq \pm 3 \}\)</p>
										<span class="link">Try it out!</span><br>
										<p class="link">Explain more</p><br>
										<p>4. \(\{ x \, | \, -1 < x \leq 3 \,\, \text{or} \,\, x = 5\}\)</p>
										<span class="link">Try it out!</span><br>
										<span class="link">Explain more</span><br>
									</div>
								</div>
							</section>
						</section>
						<section class="row-fluid">
							<section class="col-lg-6">
								<section class="col-lg-12">	
									<div id="testSlider"></div>
								</section>								
							</section>
							<section class="col-lg-6">
							</section>
							<div class="margin-top"></div>
						</section>
					

					</section>



					<!--RIGHT SIDEBAR: BEGIN-->
					<section class="col-lg-3 col-sm-12 col-sm-12 rightSideBar">
						<section class="row-fluid">
							<article class="col-xs-12">
								<span class="header">Introduction</span>
							</article><br>
							<article class="divider col-xs-12"></article>
							<section class="row-fluid content">
								<article class="col-xs-12">
									<article class="row hidden-md hidden-sm hidden-xs">
										<span>This is your go-to source for important imformation. If you pay attention to what this sidebar highlights you will retain information better and learn even faster. Here are some things to look for:</span>
									</article>
									<article class="row pointers">
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="importantInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('Important Information', 'This represents important information that is relevant to your current topic.')" data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/info.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents important information that is relevant to your current topic.
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="expectedPitfalls">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('Common Pitfalls', 'This represents common pitfalls and errors that if you read, you can avoid in assessments.')"  data-toggle="modal" data-target="#importantInformationModal" src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/warning.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents common pitfalls and errors that if you read, you can avoid in assessments.
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="moreInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('Additional Resources', 'This represents where you can stop and go to another location for more learning resources.')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/cluster.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents where you can stop and go to another location for more learning resources.
											</article>
										</section>
										<section class="hidden-xs col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="recycledConcept">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img onclick="changeModal('Recycled Content', 'This represents that you already know the topic and it's just modified or asked in a different way.')" data-toggle="modal" data-target="#importantInformationModal"  src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>img/global/icons/refresh.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents that you already know the topic and it's just modified or asked in a different way.
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