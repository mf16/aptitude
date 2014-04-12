<?php
include_once "class.SectionDAO.php";
class Section {
	protected $SectionDAO;
	function __construct(){
		$this->SectionDAO = new SectionDAO();
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}
	function head(){
		$headerText='';
		$headerText.='<script src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		$headerText.='<link href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/'.strtolower(__CLASS__).'.css" type="text/css" rel="stylesheet">';
		return $headerText;
	}

	function draw(){
		drawHeader($this->head());
		?>
		<!-- wrapper -->
		<div class="page-wrap">
			<div id="slidingMenu">
				<h1>Aptitude</h1>
				<span id="studentName"><?php echo $_SESSION['userFirstname'].' '.$_SESSION['userLastname']; ?></span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="#services">Timeline</a>
				<a href="#services">Account Settings</a>
				<span>Classes</span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="#" onclick="newClass()" >+ Create new class</a>
			</div>

			<header>
				<div id="header">
					<!--Button to expand slideout-->
					<section onclick="toggleMenu()" id="buttonSideMenu">
					</section>
					<article>
						<span class="phoneHide" id="aptitude">Aptitude</span>
					</article>
				</div>
			</header>
			<section id="headerSpacerSmall"></section>
			<section class="container loader"></section>
			<section class="body">
				<section class="row-fluid">
					<section class="col-lg-9 col-xs-12">
						<section class="row-fluid margin-top" id="initialSpacer">
							<section class="col-sm-12 col-lg-6 video">
								<iframe src="//player.vimeo.com/video/77449705" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</section>
							<section class="col-sm-12 col-lg-6">
								<article class="headerOutline">
									<span>Sets of Numbers</span>
								</article><br>
								<article>
									<p>While we would like nothing more than to delve quickly and deeply into the sheer excitement that is Precalculus, experience has taught us that a brief refresher on some basic notions is welcome, if not completely necessary, at this stage. To that end, we present a brief summary of ‘set theory’ and some of the associated vocabulary and notations we use in the text. Like all good Math books, we begin with a deﬁnition</p>
								</article>
							</section>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12 margin-top">
								<article class="definition">
									<blockquote>
										<p>A set is a well-deﬁned collection of objects which are called the ‘elements’ of the set. Here, ‘well-deﬁned’ means that it is possible to determine if something belongs to the collection or not, without prejudice.</p>
									</blockquote>
								</article>
							</article>
						</section>
						<section class="row-fluid">
							<section class="col-xs-12 col-lg-6 margin-top">
								<article>
									<p>For example, the collection of letters that make up the word “smolko” is well-deﬁned and is a set, but the collection of the worst math teachers in the world is not well-deﬁned, and so is not a set. In general, there are three ways to describe sets. They are:</p>
									<section class="col-xs-12 dataContainer">
										<h3>Ways to describe sets</h3>
										<ol>
											<li>The Verbal Method: Use a sentence to deﬁne a set.</li>
											<li>The Roster Method: Begin with a left brace ‘{’, list each element of the set only once and then end with a right brace ‘}’.</li>
											<li>The Set-Builder Method: A combination of the verbal and roster methods using a “dummy variable” such as x.</li>
										</ol>
									</section>
								</article>
								<article style="top: 25px; position:relative;">
									<p>For example, let S be the set described verbally as the set of letters that make up the word “smolko”. A roster description of S would be {s,m,o,l,k}. Note that we listed ‘o’ only once, even though it appears twice in “smolko.” Also, the order of the elements doesn’t matter, so {k,l,m,o,s} is also a roster description of S. A set-builder description of S is:</p>
									<br><p class="text-center standoutText">{x|x is a letter in the word “smolko”.}</p>
								</article>
							</section>
							<section class="col-xs-12 col-lg-6 margin-top">	
								<p>The way to read this is: ‘The set of elements x such that x is a letter in the word “smolko.”’ In each of the above cases, we may use the familiar equals sign ‘=’ and write S = {s,m,o,l,k} or S = {x|x is a letter in the word “smolko”.}. Clearly m is in S and q is not in S. We express these sentiments mathematically by writing m ∈ S and q / ∈ S. Throughout your mathematical upbringing, you have encountered several famous sets of numbers. They are listed below:</p>
								<ol class="link">
								    <li data-toggle="collapse" data-target="#setOfNumbers1">
								    	<span class="standoutText">Empty Set</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers1">
								            <li>&#216; = {} = {x|x 6= x}. This is the set with no elements. Like the number ‘0,’ it plays a vital role in mathematics.<sup data-footnote="empty">a</sup></li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers2">
								    	<span class="standoutText">Natural Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers2">
								            <li>N = {1,2,3,...} The periods of ellipsis here indicate that the natural numbers contain 1, 2, 3, ‘and so forth’.</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers3">
								    	<span class="standoutText">Whole Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers3">
								            <li>W = {0,1,2,...} </li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers4">
								    	<span class="standoutText">Integers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers4">
								            <li>Z = {...,−3,−2,−1,0,1,2,3,...}</li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers5">
								    	<span class="standoutText">Rational Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers5">
								            <li> Q = {<sup>a</sup>&frasl;<sub>b</sub> |a ∈Z and b ∈Z	. Rational numbers are the ratios of integers (provided the denominator is not zero!) It turns out that another way to describe the rational numbers<sup data-footnote="empty">b</sup> is:<ul class="clearListFormat"><li>Q = {x|x possesses a repeating or terminating decimal representation.}</li></ul></li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers6">
								    	<span class="standoutText">Real Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers6">
								            <li>R = {x|x possesses a decimal representation.} </li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers7"> 
								    	<span class="standoutText">Irrational Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers7">
								            <li>P = {x|x is a non-rational real number.} Said another way, an irrational number is a decimal which neither repeats nor terminates.<sup data-footnote="empty">c</sup> </li>
								        </ul>
								    </li>
								    <li data-toggle="collapse" data-target="#setOfNumbers8"> 
								    	<span class="standoutText">Complex Numbers</span>
								        <ul class="collapse clearListFormat" id="setOfNumbers8">
								            <li>C = {a + bi|a,b ∈R and i = √−1} Despite their importance, the complex numbers play only a minor role in the text.<sup data-footnote="empty">d</sup></li>
								        </ul>
								    </li>
								</ol>
							</section>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12 contentDivider" style="margin-top:30px;">
							</article>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12">
								
							</article>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12">
								<p>It is important to note that every natural number is a whole number, which, in turn, is an integer. Each integer is a rational number (take b = 1 in the above deﬁnition for Q) and the rational numbers are all real numbers, since they possess decimal representations.3 If we take b = 0 in the above deﬁnition of C, we see that every real number is a complex number. In this sense, the sets N, W, Z, Q, R, and C are ‘nested’ like Matryoshka dolls.</p>
								<p>For the most part, this textbook focuses on sets whose elements come from the real numbers R. Recall that we may visualize R as a line. Segments of this line are called intervals of numbers. Below is a summary of the so-called interval notation associated with given sets of numbers. For intervals with ﬁnite endpoints, we list the left endpoint, then the right endpoint. We use square brackets, ‘[’ or ‘]’, if the endpoint is included in the interval and use a ﬁlled-in or ‘closed’ dot to indicate membership in the interval. Otherwise, we use parentheses, ‘(’ or ‘)’ and an ‘open’ circle to indicate that the endpoint is not part of the set. If the interval does not have ﬁnite endpoints, we use the symbols −∞ to indicate that the interval extends indeﬁnitely to the left and ∞ to indicate that the interval extends indeﬁnitely to the right. Since inﬁnity is a concept, and not a number, we always use parentheses when using these symbols in interval notation, and use an appropriate arrow to indicate that the interval extends indeﬁnitely in one (or both) directions.</p>
							</article>
						</section>
						<section class="row-fluid">
							<article class="col-xs-12">
								<hr class="contentDividerLine">
							</article>
						</section>
						<section class="row-fluid">
							<section class="col-sm-12 col-lg-9 col-lg-offset-1">
								<table class="table">
									<thead>
										<tr>
											<th>Set of Real Numbers</th>
											<th>Interval Notation</th>
											<th>Region on the Real Number Line</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{x|a < x < b}</td>
											<td>(a,b)</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|a ≤ x < b}</td>
											<td>[a,b)</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|a < x ≤ b}</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|a ≤ x ≤ b}</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|x < b}</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|x ≤ b}</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|x > a}</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>{x|x ≥ a}</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
										<tr>
											<td>R</td>
											<td>(a,b]</td>
											<td>a o----------o b</td>
										</tr>
									</tbody>
								</table>
							</section>
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
												<img src="img/global/icons/info.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents important information that is relevant to your current topic.
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="expectedPitfalls">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img src="img/global/icons/warning.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents common pitfalls and errors that if you read, you can avoid in assessments.
											</article>
										</section>
										<section class="col-xs-4 col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="moreInformation">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img src="img/global/icons/cluster.png">
											</article>
											<article class="hidden-md hidden-sm hidden-xs col-sm-9">
												This represents where you can stop and go to another location for more learning resources.
											</article>
										</section>
										<section class="hidden-xs col-sm-3 col-md-3 col-lg-12 sideBarHighlights" id="recycledConcept">
											<article class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
												<img src="img/global/icons/refresh.png">
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
				<img src = "img/global/icon.ico" />
				<span>Powered by Aptitude LLC.</span>
			</section>
			<section class="col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6" id="feedback">
				<a href="feedback.php"><span>Have feedback?</span></a>
			</section>
		</footer>
		<script type="text/javascript">
			var profilePage = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>profile";
		</script>
		<?php
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/fitVid/fitVid.js"></script>';
		//echo '<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js"></script>';
		
		drawFooter($this->foot());
	}
	function foot(){
	}
}
$section= new Section();

