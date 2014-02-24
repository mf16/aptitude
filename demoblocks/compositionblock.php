<?php
echo '
<section class="row">
	<article class="standardBorderedTitle col-md-8 col-md-offset-2">
		Composition of functions
	</article>
</section>
<section class="row">
	<article class="col-md-12">
		<iframe src="https://player.vimeo.com/video/70264712" width="100%" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</article>
</section>
<section class="row">
	<article class="col-md-12">
		<span>Creating composite functions is a little different than combing them. Think about what each function represents and what it equals. In the function f(x) = x<sup>2</sup> - 5 imagine "f" being a variable that represents the whole expression "x<sup>2</sup> - 5. When creating composit functions we\re plugging "f" into other functions and simplifying to get the result. See the following examples to see it in action.</span>
	</article>
</section>
<section class="row">
	<article class="col-md-12">
		<h3 style="margin-bottom:0px;">Examples of compositions of functions</h3>
		<span>We\'ll use the following functions to demonstrate combining: f(x) = x<sup>2</sup> - 5x and g(x) = 2x * (2 - x) and g(x) = 12/x</span><br>
	</article>
</section>
<section class="row">
	<article class="col-md-4 functionExamples">
		<span>(f <span class="functionOf">o</span> g)(x)</span><br>
		<span>(x<sup>2</sup> - 5x) + (2x * (2 - x))</span>
	</article>
	<article class="col-md-4 functionExamples">
		<span>(g <span class="functionOf">o</span> h)(x)</span><br>
		<span>(x<sup>2</sup> - 5x) - (2x * (2 - x))</span>
	</article>
	<article class="col-md-4 functionExamples">
		<span>(h <span class="functionOf">o</span> f)(x)</span><br>
		<span>(x<sup>2</sup> - 5x) / (2x * (2 - x))</span>
	</article>
	<br>
</section>
<section class="row">
	<article class="col-md-12"><hr class="clearMarginBottom"><h3>Practice</h3> Enter the answer for the following composition of functions (show your work):<br> f(x) = x<sup>2</sup> + 2x + 1 <br> f(g) = 2x + 6 <br> f(h) = x - 8
		<!--to create a blank line--><br><p> </p>
	</article>
	<article class="col-md-3">
		<span>(f o g)(x)</span><br>
		<textarea class="showWork"></textarea><br>
		<span>Final answer: </span><input type="text" class="longerPractice" />
	</article>
	<article class="col-md-3">
		<span>(g o f)(x)</span><br>
		<textarea class="showWork"></textarea><br>
		<span>Final answer: </span><input type="text" class="longerPractice" />
	</article>
	<article class="col-md-3">
		<span>(g o h)(x)</span><br>
		<textarea class="showWork"></textarea><br>
		<span>Final answer: </span><input type="text" class="longerPractice" />
	</article>
	<article class="col-md-3">
		<span>(f o h)(x)</span><br>
		<textarea class="showWork"></textarea><br>
		<span>Final answer: </span><input type="text" class="longerPractice" />
	</article>
</section>';
?>