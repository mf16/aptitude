<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aptitude learning | Math Demo</title>
	<meta name="description" content="We create interactive and dynamic learning tools that replace textbooks. Changing education as we know it. Try a demo of our system for free!">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Aptitude learning">
	<meta name="author" content="Tyler Slater">

	<!-- Standard Favicon--> 
	<link rel="shortcut icon" href="icon.ico">

	<!--Google fonts-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>


	<!-- Bootstrap CSS Files -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<!-- Custom Fonts Setup via Font-face CSS3 -->
	<link href="fonts/fonts.css" rel="stylesheet">
	<!--Universal styling-->
	<link href="stylesheets/universal.css" rel="stylesheet">
</head>

<body onload="runAnimations()">
<div id="mathOperators">
	<div onclick="insertAtCursor('²')" id="superscript" style="padding: 6px 22px 24px 12px;"><span style="font-size: 17px;">x²</span></div>
	<div onclick="insertAtCursor('/')" id="divide"><span>/</span></div>
	<div onclick="insertAtCursor('*')"  id="multiply" style="padding: 0px 22px 30px 12px;"><span style="font-size: 40px;">*</span></div>
	<div onclick="insertAtCursor('+')"  id="add" style="padding: 0px 22px 30px 12px;"><span style="font-size: 25px;">+</span></div>
	<div onclick="insertAtCursor('-')"  id="subtract" style="padding: 0px 22px 30px 12px;"><span style="font-size: 25px;">-</span></div>
</div>

<div id="slidingMenu">
	<h1>Aptitude</h1>
	<span id="studentName">John Doe</span>
	<hr style="margin:0px; border-top: 1px solid #F26522;">
	<a href="#about">Dashboard</a>
	<a href="#services">Homework</a>
	<a href="#contact">Tests</a>
	<span>Chapters</span>
	<hr style="margin:0px; border-top: 1px solid #F26522;">
	<a href="#">7 -&nbsp; Polynomials</a>
	<a href="#">12 - Functions</a>
	<a href="#">Extra Review</a>
</div>

<!-- allButSideBar : start, this is to detect a click outside of the side nav bar -->
<div id="allButSideBar">
<div class="pageWrap">
	<header>
	<div id="header">
		<!--Button to expand slideout-->
		<section id="buttonSideMenu">
		</section>
		<article>
			<span id="aptitude">
				Aptitude
			</span>
		</article>	
	</div>
	</header>

	<section class="spacer">
	</section>


	<section id="contentWrapper">
		<section id="contentSubWrapper" class="col-md-9 col-xs-12">
			<section class="row">
				<article class="introVideo col-md-6">
					<iframe src="https://player.vimeo.com/video/70264712" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</article>
				<section class="introContainer col-md-6">
					<article class="borderedTitle">Functions</article>
					<article>
						<p>It's like a machine. You put in one number, and it transforms it into another number using a preset rule. 
						Every time you put in a number you put in before, the function will always give you the same output. 
						The important thing is that it's always one output for every input. 2 inputs can give the same output, but 1 input can't have 2 different outputs. 
						</p>
					</article>
				</section>
			</section>

			<section class="row">
				<article class="col-md-12">
					<p>
						<h3>Real world application</h3>
					</p>
					<section id="useOfConcept">
						<span>There's a question asked by all: "when will I ever use this?". By knowing the answer to that question you will be more interested in functions themselves. Here are just a few real world examples in how we use functions in everyday life and we will work with these throughout the chapter: 
						</span>
						<article style="margin-top:10px;">
							<article class="col-md-4">
								<ul>
									<li>Your mileage per gallon in your car</li>
									<li>How much you make from compound interest in you savings account</li>
								</ul>
							</article>
							<article class="col-md-4">
								<ul>
									<li>Finding out how much revenue a company will expect</li>
									<li>Determining amount of space for shipping containers on a boat</li>
								</ul>
							</article>
							<article class="col-md-4">
								<ul>
									<li>Finding how much material you need to build your new house</li>
									<li>Getting the circumference of a circle from the diameter</li>
								</ul>
							</article>
						</article>
					</section>
				</article>
			</section>
			<section class="row">
				<section class="col-md-12">
					<article class="contentDivider"></article>
					<p>
						<h3  class="pretestHide">Assess your knowledge</h3>
					</p>
					<section class="assessKnowledgeContainer">
						<div id="pretestWrapper">
							<!--TAKE OUT FOR DEMO CURRENTLY BECAUSE ITS NOT FUNCTIONAL
							<section class="row">
								<article class="col-md-6">
									<label class="normalizeHeaders" for"defineDomain">Describe what a domain is in relation to functions:</label>
									<textarea class="form-control" id="defineDomain" name="defineDomain" rows="3"></textarea>
								</article>
								<article class="col-md-6">
									<label class="normalizeHeaders" style="font-weight:normal" for"defineRange">Describe what range means in relation to a function:</label>
									<textarea class="form-control" id="defineRange" name="defineRange" rows="3"></textarea>
								</article>
							</section>
							-->
							<section class="row"> 
								<hr>
								<article class="floatLeft col-md-6">
									<label class="normalizeHeaders">Evaluate three different input and output values for the following function:  f(x) = (2x<sup>2</sup> - x) * 5</label>
									<br>
									<div>
										<span style="font-size:25px;">{(</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_domain_1" />
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_range_1"/>
									</div>
									<div>
										<span style="font-size:25px;">), (</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_domain_2"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_range_2"/>
									</div>
									<div>
										<span style="font-size:25px;">), (</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_domain_3"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_range_3"/>
									</div>
									<div>
										<span style="font-size:25px;">)}</span>
									</div>
								</article>
								<article class="floatLeft col-md-6">
									<label class="normalizeHeaders">Evaluate three different input and output values for the following function:  f(x) = 5(3x + 22)</label>
									<br>
									<div>
										<span style="font-size:25px;">{(</span>`
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_domain_4"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_range_4"/>
									</div>
									<div>
										<span style="font-size:25px;">), (</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_domain_5"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_range_5"/>
									</div>
									<div>
										<span style="font-size:25px;">), (</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_domain_6"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_range_6"/>
									</div>
									<div>
										<span style="font-size:25px;">)}</span>
									</div>
								</article>
							</section>
							<section class="row marginTop30">
								<article class="floatLeft col-md-6">
									<label class="normalizeHeaders">Fill in the following blanks with values that would <u>NOT</u> equal a function:</label>
									<br>
									<div>
										<span style="font-size:25px;">{(</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_nonfunction_domain_1"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_nonfunction_range_1"/>
									</div>
									<div>
										<span style="font-size:25px;">), (</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_nonfunction_domain_2"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_nonfunction_range_2"/>
									</div>
									<div>
										<span style="font-size:25px;">), (</span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_nonfunction_domain_3"/>
									</div>
									<div>
										<span style="font-size:25px;">, </span>
									</div>
									<div class="pretestContainer">
										<input type="text" class="pretest" id="pretest_nonfunction_range_3"/>
									</div>
									<div>
										<span style="font-size:25px;">)}</span>
									</div>
								</article>
							</section>
							<section class="row">
								<section class="col-md-4 graphFunctionContainer">
									<span>Is the following a function?</span>
									<input type="radio" name="graphFunction_1" value="yes" />Yes
									<input type="radio" name="graphFunction_1" value="no" />No
									<img class="img-responsive" src="images/graphFunctions/1.png" />
								</section>
								<section class="col-md-4 graphFunctionContainer">
									<span>Is the following a function?</span>
									<input type="radio" name="graphFunction_2" value="yes" />Yes
									<input type="radio" name="graphFunction_2" value="no" />No
									<img class="img-responsive" src="images/graphFunctions/2.png" />
								</section>
								<section class="col-md-4 graphFunctionContainer">
									<span>Is the following a function?</span>
									<input type="radio" name="graphFunction_3" value="yes" />Yes
									<input type="radio" name="graphFunction_3" value="no" />No
									<img class="img-responsive" src="images/graphFunctions/3.png" />
								</section>
							</section>
							<section class="row">
								<section class="col-md-4 graphFunctionContainer">
									<span>Is the following a function?</span>
									<input type="radio" name="graphFunction_4" value="yes" />Yes
									<input type="radio" name="graphFunction_4" value="no" />No
									<img class="img-responsive" src="images/graphFunctions/4.png" />
								</section>
								<section class="col-md-4 graphFunctionContainer">
									<span>Is the following a function?</span>
									<input type="radio" name="graphFunction_5" value="yes" />Yes
									<input type="radio" name="graphFunction_5" value="no" />No
									<img class="img-responsive" src="images/graphFunctions/5.png" />
								</section>
								<section class="col-md-4 graphFunctionContainer">
									<span>Is the following a function?</span>
									<input type="radio" name="graphFunction_6" value="yes" />Yes
									<input type="radio" name="graphFunction_6" value="no" />No
									<img class="img-responsive" src="images/graphFunctions/6.png" />
								</section>
							</section>
							<section class="row">
								<section class="combineFunctionsContainer col-md-12">
									<article>
										<span>Find the answers by combining the functions and simplify: <br> f(x) = 2x - 3   <br> g(x) =  2x - 3<sup>3</sup> * -x</span>
									</article><br>
								</section>
								<section class="col-md-4">
									<span>(f - g)(x)</span><br>
									<input type="text" class="combineFunctionInput" id="combineFunction_1" />
								</section>
								<section class="col-md-4">
									<span>(f/g)(x)</span><br>
									<input type="text" class="combineFunctionInput" id="combineFunction_1" />
								</section>
								<section class="col-md-4">
									<span>(f * g)(x)</span><br>
									<input type="text" class="combineFunctionInput" id="combineFunction_1" />
								</section>
							</section>
							<section class="row">
								<section class="col-md-12">
									<br><span>With the following functions, solve their compositions:
										<br>f(x) = 5(2x - 13) - 3
										<br>g(x) = 5x<sup>2</sup> * 5 
										<br>h(x) = (x - 7)/2</span>
								</section>
								<br>
								<article class="col-md-4">
									<span>(g </span><span class="functionOf">o</span><span> g)(x)</span><br>
									<input type="text" class="compositeFunctionInput" id="compositeFunction_1" />
								</article>
								<article class="col-md-4">
									<span>(f </span><span class="functionOf">o</span><span> g)(x)</span><br>
									<input type="text" class="compositeFunctionInput" id="compositeFunction_1" />
								</article>
								<article class="col-md-4">
									<span>(h </span><span class="functionOf">o</span><span> f)(x)</span><br>
									<input type="text" class="compositeFunctionInput" id="compositeFunction_1" />
								</article>
							</section>
						</div>
						<section style="padding-top:0px;" id="pretestSubmitButton" class="row pretestHide">
							<article class="col-md-6 col-md-offset-2">
								<button onclick="togglePretest();" class="btn btn-1 btn-1a pretestSubmitButton">See what you know</button>
							</article>
							<article class="col-md-3">
								<button onclick="submitPretest();" class="btn btn-1 btn-1a pretestSubmitButton loadAll" style="font-size:18px; width:50%">Learn it all</button>
							</article>
						</section>
						<section class="row pretestHide">
							<section class="col-md-12">
								<article class="contentDivider"></article>
							</section>
						</section>


						<div class="sectionContentWrapper" id="blocks">
							<!--Auto populate div with material-->
						</div>
					</section>
				</section>
			</section>
		</section>






		<section id="rightInfoBar" class="col-md-3">
			<article class="col-md-12 text-center">
				<div class="sideHeaderContainer">
					<span class="desktopContent" id="sideBarHeader">Introduction</span>
					<br>
				</div>
				<article class="sidebarDivider desktopContent">
				</article>
				<section class="sidebarRow row" id="state_1_1">
					<article class="col-md-12">
						<p>This is your go-to source for important imformation. If you pay attention to what this sidebar highlights you will retain information better and learn even faster. Here are some things to look for:</p>
					</article>
					<article class="col-md-2">
						<img style="margin-top:5px; " src="images/demo/bookmark.png" />
					</article>
					<article class="col-md-10">
						<p>This represents important information that is relevant to your current topic.</p>
					</article>
				</section>
				<section class="sidebarRow row" id="state_1_2">
					<article class="col-md-2">
						<img style="margin-top:5px; margin-left:-5px;" src="images/demo/stop.png" />
					</article>
					<article class="col-md-10">
						<p>This represents where you can stop and go to another location for more learning resources.</p>
					</article>
				</section>
				<section class="sidebarRow row" id="state_1_3">
					<article class="col-md-2">
						<img style="margin-top:5px; margin-left:-5px;" src="images/demo/error.png" />
					</article>
					<article class="col-md-10">
						<p>This represents common pitfalls and errors that if you read, you can avoid in assessments.</p>
					</article>
				</section>
				<section class="sidebarRow row" id="state_1_4">
					<article class="col-md-2">
						<img style="margin-top:5px; margin-left:-5px;" src="images/demo/recycle.png" />
					</article>
					<article class="col-md-10">
						<p>This represents that you already know the topic and it's just modified or asked in a different way.</p>
					</article>
				</section>
			</article>
		</section>
	</section>
</div>

<footer class="site-footer col-md-10 col-xs-12">
	<section>
		<img src = "icon.ico" />
		<span>Powered by Aptitude LLC.
	</section>
	<section id="feedback">
		<a href="feedback.php"><span>Have feedback?</span></a>
	</section>
</footer>




</div>
<!-- allButSideBar : end -->
<input type="hidden" id="sidebarState">


<!-- Core JS Libraries -->
<script src="javascripts/jquery.js" type="text/javascript"></script>
<script src="eval.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" ></script> 
<script type="text/javascript">
	//Create an empty dot for the concept location
 	/*	var numConcepts = 5;
 		var count = 1; 
 		while (count <= numConcepts) {
			var c=document.getElementById("concept_" + count);
			var ctx=c.getContext("2d");
			ctx.beginPath();
			ctx.arc(6,6,4,0,2*Math.PI);
			if(count == 1) {
				ctx.fillStyle = 'black';
				ctx.fill();
			}
			ctx.stroke();
			count++;
		}
*/
var toggle = 0;
var state = 0;
var lastCursorPosition;
var lastCursorLocation;
var domainRangePosition = 1250;
var combineFunctionPosition = 1250;
var compositionFunctionPosition = 1250;

$(window).load(function() {
  // When the page has loaded
  $("body").fadeIn(650);
  $('#sidebarState').val('1');
});


function runAnimations(){
	var location = $('#rightInfoBar').css('height');
	if (location == '100px'){
		$( "#rightInfoBar" ).animate({'margin-top' : "-110px"}, 0);
		$( "#rightInfoBar" ).delay(1000).animate({'margin-top' : "0px"}, 750);
	}
	else{
		$( "#rightInfoBar" ).animate({'right' : "-26%"}, 0);
		$( "#rightInfoBar" ).delay(1000).animate({'right' : "0%"}, 750);
	}

}

////////////Script for the sliding menu on side///////////////////
//Click on the button to expand menu
$('#buttonSideMenu').click(function() {
	var position = $( '#slidingMenu' ).css('left');
	if (position == '-200px'){
	    $( '#slidingMenu' ).animate({'left' : "+=200px"}, 500);	
		$( '#allButSideBar' ).animate({'margin-left' : "+=200px"}, 500);
	}
});
//Everything else collapses menu
$('#allButSideBar').click(function() {
	var position = $( '#slidingMenu' ).css('left');
	if (position == '0px') {
	$( '#slidingMenu' ).animate({'left' : "-=200px"}, 500);	
	$( '#allButSideBar' ).animate({'margin-left' : "-=200px"}, 500);
	}	
});
////////////////END script for sliding menu ///////////////////////


/////////TOGGLE PRETEST SECTION START///////////
function togglePretest(){
	console.log('yes');
	if (toggle === 0){
		$( "#pretestWrapper" ).slideDown( "slow" );
		$('.pretestSubmitButton').css('margin-top', '23px');
		$('.pretestSubmitButton').html('Submit answers');
		$('.loadAll').css('display', 'none');
		$('.pretestSubmitButton').attr('onclick', 'submitPretest()');
		toggle++;
	}	
}
/////////TOGGLE PRETEST SECTION END///////////


function submitPretest(){
	var domainRange = domainRangeEvaluate();
	var combination = combinationEvaluate();
	var composition; // = compositionEvaluate();
	var domainRangePresence = false;
	var combinationPresence = false;
	var compositionPresence = false;
	$( "#pretestWrapper" ).slideUp( "slow" );
	$( ".pretestHide" ).slideUp( "slow" );
	state = 1;

	$.ajax({url:"demoblocks/functionblock.php",success:function(result){
		$("#blocks").append(result);
		$.ajax({url:"demoblocks/domainrangeblock.php",success:function(result){
			if (domainRange == 'load'){	
				$("#blocks").append(result);
				domainRangePresence = true;
			}
			$.ajax({url:"demoblocks/combiningblock.php",success:function(result){
				if (combination == 'load'){	
					$("#blocks").append(result);
					combinationPresence = true;
				}
				$.ajax({url:"demoblocks/compositionblock.php",success:function(result){
					if (composition !== 'load'){	
						$("#blocks").append(result);
						compositionPresence = true;
					}
				}});
			}});
		}});
	}});
}


//////////CHECK SCROLLBAR POSITION AND UPDATE SIDEBAR ACCORDINGLY -- START/////////////////
//CANNOT GET THIS TO WORK BLAHH//
$(document).ready(function(){

  $("#allButSideBar").scroll(function(){
  	if (state === 0){
	    var scrollLocation = $("#allButSideBar").scrollTop();
	    if(scrollLocation < 550){
	    	var sidebarState = $('#sidebarState').val();
	    	if (sidebarState !== '1'){
	    		$('#sidebarState').val('1');
	    		$('#state_1_1').animate({ "left": "0px" }, "slow" );
	    		$('#state_1_2').delay( 150 ).animate({ "left": "0px" }, 500 );
	    		$('#state_1_3').delay( 300 ).animate({ "left": "0px" }, 500 );
	    		$('#state_1_4').delay( 450 ).animate({ "left": "0px" }, 500 );
	    		$('.sideHeaderContainer').animate({ "top": "-=100px" }, "slow", function() {
	   				$('#sideBarHeader').text('Introduction');
	 			 }
	    		);
	    		$('.sideHeaderContainer').animate({ "top": "+=100px" }, "slow" );
	    	}
	    }
	    if(scrollLocation > 550){
	    	var sidebarState = $('#sidebarState').val();
	    	if (sidebarState !== '2'){
	    		$('#sidebarState').val('2');
	    		$('.sidebarRow').animate({ "left": "400px" }, "slow" );
	    		$('.sideHeaderContainer').animate({ "top": "-=100px" }, "slow", function() {
	   				$('#sideBarHeader').text('');
	 			 }
	    		);
	    		$('.sideHeaderContainer').animate({ "top": "+=100px" }, "slow" );
	    	}
	    }
	}
	else if (state === 1){
		if (domainRangePresence = true){
			combineFunctionPosition += 1050;
			compositionFunctionPosition += 1050;
		}
		if (combinationPresence = true){
			compositionFunctionPosition += 950;
		}

		if(scrollLocation > 550){

		}
	}
  });
});
//////////CHECK SCROLLBAR POSIITION AND UPDATE SIDEBAR ACCORDINGLY -- END/////////////////



$(document).click(function() {
	if ($("input[type=text]").is(":focus")){
		//input and text area has focus
		$('#mathOperators').animate({'margin-top' : "64px"}, 750);
	}
	else{
		//no focus for inout and textarea
		$('#mathOperators').animate({'margin-top' : "0px"}, 500);
	}  
})

$("input[type=text]").focus(function () {
	lastCursorLocation = this.id;
});

function insertAtCursor(text) {
	console.log(lastCursorLocation);
    //var txtarea = document.getElementById(areaId);
    var txtarea = $('#' + lastCursorLocation)[0];
    var scrollPos = txtarea.scrollTop;
    var strPos = 0;
    var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ? 
    "ff" : (document.selection ? "ie" : false ) );
    if (br == "ie") { 
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        strPos = range.text.length;
    }
    else if (br == "ff") {strPos = txtarea.selectionStart};
    
    var front = (txtarea.value).substring(0,strPos); 
    var back = (txtarea.value).substring(strPos,txtarea.value.length); 
    txtarea.value=front+text+back;
    strPos = strPos + text.length;
    if (br == "ie") { 
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart ('character', -txtarea.value.length);
        range.moveStart ('character', strPos);
        range.moveEnd ('character', 0);
        range.select();
    }
    else if (br == "ff") {
        txtarea.selectionStart = strPos;
        txtarea.selectionEnd = strPos;
        txtarea.focus();
    }
    txtarea.scrollTop = scrollPos;
}

</script>
</body>
</html>