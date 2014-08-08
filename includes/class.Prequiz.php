<?php
// Class Prequiz
//
// Used by all prequizes regardless of subject

// include 'includes/class.MathPrequiz.php';
//unset($_SESSION['problemNum']);
include_once 'global.php';
include_once 'class.PrequizDAO.php';
class Prequiz extends PrequizDAO {
	private $subjectName;
	private $chapterid;
	private $sectionid;
	private $pkAmount;
	private $pqAmount;
	private $totalAmount;
	
	function __construct($subjectName,$chapterid,$sectionid){
		// Logic for Getting correct Type of Question
		// following should be dynamic eventually:
		$this->pkAmount = 2;
		$this->pqAmount = 2;
		$this->totalAmount=($this->pkAmount+$this->pqAmount);

		// hack to display finish page
		//$this->totalAmount=0;
		
		if(isset($subjectName)){
			$this->subjectName = $subjectName;
		}
		if(isset($chapterid)){
			$this->chapterid = $chapterid;
		}
		if(isset($sectionid)){
			$this->sectionid = $sectionid;
		}
		
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}

	function draw(){
		echo '<div id="prequiz">';
			include 'includes/'.$this->subjectName.'/'.$this->chapterid.'/'.$this->sectionid.'/content.php';
		echo '</div>';
	}

    function clearSessionVars(){
        unset($_SESSION['math-1050']);
        unset($_SESSION['showLongText']);
        unset($_SESSION['problemNum']);
        unset($_SESSION['prequizProblemComplete']);
        unset($_SESSION['math1050-prequiz']);
        unset($_SESSION['isPrequizCompleted']);
        echo 'session vars cleared';
    }

	function finishQuiz(){
		$_SESSION['isPrequizCompleted']=1;
	}

	function skipQuiz(){
		$_SESSION['isPrequizCompleted']=1;
	}

	function nextProblem(){
		//krumo($_SESSION);
		// jquery timer
		echo '<script>
			var counter=0;
			var timer=null;
			function tictac(){
				counter++;
			}
			timer=setInterval("tictac()",1000);
		</script>';

        echo '<button onclick="clearSessionVars();">CLICK HERE TO CLEAR SESSION VARS AND START OVER</button>';
        echo '
           <script>
            function clearSessionVars(){
                $.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'/includes/class.Prequiz.php?action=clearSessionVars&subjectName='.$this->subjectName.'&chapterid='.$this->chapterid.'&sectionid='.$this->sectionid.'",success:function(result){
                    console.log(result);
                    location.reload();
                }
                });
            }
           </script>
        ';

		if(!isset($_SESSION['problemNum'])){
			$_SESSION['problemNum']=1;
			$problemNum=1;
		} else {
            $problemNum=($_SESSION['problemNum']);
            if(isset($_SESSION['prequizProblemComplete']) && ($_SESSION['prequizProblemComplete']==1)){
                $problemNum=$problemNum+1;
                $_SESSION['problemNum']=$problemNum;
                $_SESSION['prequizProblemComplete']=0;
            } else {
                //keep the same problemnumber
            }
		}
        echo '
            <link rel="stylesheet" type="text/css" href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/math-1050/5/1/pretest_global_styling.css">
            <link rel="stylesheet" type="text/css" href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/math-1050/5/1/pretest_page_specific_styling.css">';
            //Equation editor styling
          echo '
            <link href="'.$_SERVER['DOCUMENT_ROOT'].'css/editor/editor.css" rel="Stylesheet" type="text/css">
            <link href="'.$_SERVER['DOCUMENT_ROOT'].'css/editor/style.css" rel="Stylesheet" type="text/css">
            <script type="text/javascript">
                    // set global variables
                    var user = \'\';
                    var subject = \'Algebra\';
                    var showads = \'True\' == "False" ? false : true;
                    var wcfhostname = \'\';
                    var webhostname = \'\';
                    var ismobile = false;
        	</script>
            <div id="workArea"></div>
        ';

		if($problemNum>$this->totalAmount){
			$keyArray=array_keys($_SESSION['math1050-prequiz']);
			//print_r($keyArray);
			echo '
				<section class="col-sm-2 col-xs-2 chapterArrow no-padding">
					<div class="chapter-number">
						<img src="'.$_SERVER["DOCUMENT_ROOT"].'img/global/chapter-arrow.png"/>
					</div>
				</section>
				<section class="col-md-4 material-body col-sm-offset-1 col-xs-offset-1 col-md-offset-0">
					<section class="row-fluid section-title-container">
						<h1 class="section-title">Pre-test report</h1>
						<span class="section-number">composition of functions</span><br><br><br>
						<span class="section-number text-center">Time per problem:</span>
					</section>
					<section class="row-fluid" style="margin-top:-90px; margin-left:-50px;">
						<div class="col-md-12 timePieChart" style="height:450px;" id="chartdiv"></div>
					</section>
				</section>
				<section class="col-md-6 pretestProblemBreakdownContainer">';
					echo '<table style="text-align:left;">
					<tr>
						<th>Problem Concept</th>
						<th>Correct Answer</th>
						<th>Answer Given</th>
						<th></th>
					</tr>';
				$counter = 0;
				foreach($keyArray as $key){
					$displayInfo=$_SESSION['math1050-prequiz'][$key][0];
					if(isset($displayInfo['correct']) && $displayInfo['correct']==1){
						$displayInfo['correct']='yes';
					} else {
						$displayInfo['correct']='no';
					}
					$typeArray=array('pk'=>'previous knowledge','pq'=>'pre-quiz');


					$minutes=0;
					$seconds=0;
					if(isset($displayInfo['timer'])){
						$minutes=(int)($displayInfo['timer']/60);
						$seconds=(int)($displayInfo['timer']%60);
					}
					//Set variables to be used later in graphs
					$time[$counter] = $displayInfo['timer'];
					$displayTime[$counter] = $minutes.':'.$seconds;
					$concept[$counter] = ucfirst($displayInfo['concept']);
					$counter++;

					echo '<tr>';
						echo '<!--<td>'.$key.'</td>-->';
						echo '<!--<td>'.$minutes.':'.$seconds.'</td>-->';
						echo '<!--<td>'.$typeArray[$displayInfo['type']].'</td>-->';
						echo '<td class="problemConcept">'.$displayInfo['concept'].'</td>';
						echo '<td>\('.$displayInfo['correctAns'].'\)</td>';
						echo '<td>\('.$displayInfo['studentAns'].'\)</td>';
						echo '<!--<td>'.$displayInfo['correct'].'</td>-->';
						if($displayInfo['correct'] == "yes"){
							echo '<td><img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/icons/check.png" width="50px"></td>';
						}
						else{
							echo '<td><img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/icons/x.png" width="50px"></td>';
						}
					echo '</tr>';
					// add to 
				}
				echo '</table>';
				echo '<br><button onclick="setQuizComplete();" class="readyButton col-md-3 col-xs-12">Continue to chapter</button>';
				echo '</section>	


				<section class="clearfix"></section>
				';
			

			//display results
            //$_SESSION['isPrequizCompleted']=1;
            echo '<script>
				MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
				function setQuizComplete(){
					$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Prequiz.php?action=finishQuiz&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'",success:function(result){
						location.reload();
					}});
				}

				var chartData = [
					{
						title:"'.$concept[0].'Problem 1 - ",
						value:'.$time[0].', 
						time:"'.$displayTime[0].'"
					},
					{
						title:"'.$concept[1].'Problem 2 - ",
						value:'.$time[1].', 
						time:"'.$displayTime[1].'"
					},
					{
						title:"'.$concept[2].'Problem 3 - ",
						value:'.$time[2].', 
						time:"'.$displayTime[2].'"
					},
					{
						title:"'.$concept[3].'Problem 4 - ",
						value:'.$time[3].', 
						time:"'.$displayTime[3].'"
					}];	

				var chart = new AmCharts.AmPieChart();

				// get balloon intance
				var balloon = chart.balloon;
				// set properties
				balloon.adjustBorderColor = true;
				balloon.color = "#000000";
				balloon.cornerRadius = 0;
				balloon.fillColor = "#FFFFFF";

				chart.balloonText = "[[value]] Seconds";
				chart.colors= ["#F68E1E", "#58585B", "#DDA05F", "#828285", "#6B6A68"];
				chart.hideLabelsPercent = 10000;
				chart.startDuration = 2;
				chart.valueField = "value";
				chart.sequencedAnimation = false;
				chart.pullOutEffect="<";
				chart.dataProvider = chartData;
				chart.write("chartdiv");






				AmCharts.ready(function() {
				    // percent chart            
				    var chart = new AmCharts.AmSerialChart(AmCharts.themes.none);
				    chart.dataProvider = [{
				        x: 1,
				        y1: 66,
				        y2: 34
				    }];
				    chart.categoryField = "x";
				    chart.rotate = true;
				    chart.autoMargins = false;
				    chart.marginLeft = 0;
				    chart.marginRight = 0;
				    chart.marginTop = 0;
				    chart.marginBottom = 0;

				    var graph = new AmCharts.AmGraph();
				    graph.valueField = "y1";
				    graph.type = "column";
				    graph.fillAlphas = 0.6;
				    graph.fillColors = "#000000";
				    graph.gradientOrientation = "horizontal";
				    graph.lineColor = "#FFFFFF";
				    graph.showBalloon = false;
				    chart.addGraph(graph);

				    var graph2 = new AmCharts.AmGraph();
				    graph2.valueField = "y2";
				    graph2.type = "column";
				    graph2.fillAlphas = 0.2;
				    graph2.fillColors = "#000000";
				    graph2.lineColor = "#FFFFFF";
				    graph2.showBalloon = false;
				    chart.addGraph(graph2);

				    var valueAxis = new AmCharts.ValueAxis();
				    valueAxis.gridAlpha = 0;
				    valueAxis.axisAlpha = 0;
				    valueAxis.stackType = "100%"; // this is set to achieve that column would occupy 100% of the chart area
				    chart.addValueAxis(valueAxis);

				    var categoryAxis = chart.categoryAxis;
				    categoryAxis.gridAlpha = 0;
				    categoryAxis.axisAlpha = 0;


				    chart.write("percent1");


				    // percent chart            
				    var chart = new AmCharts.AmSerialChart(AmCharts.themes.none);
				    chart.dataProvider = [{
				        x: 1,
				        y1: 29,
				        y2: 71
				    }];
				    chart.categoryField = "x";
				    chart.rotate = true;
				    chart.autoMargins = false;
				    chart.marginLeft = 0;
				    chart.marginRight = 0;
				    chart.marginTop = 0;
				    chart.marginBottom = 0;

				    var graph = new AmCharts.AmGraph();
				    graph.valueField = "y1";
				    graph.type = "column";
				    graph.fillAlphas = 0.6;
				    graph.fillColors = "#000000";
				    graph.gradientOrientation = "horizontal";
				    graph.lineColor = "#FFFFFF";
				    graph.showBalloon = false;
				    chart.addGraph(graph);

				    var graph2 = new AmCharts.AmGraph();
				    graph2.valueField = "y2";
				    graph2.type = "column";
				    graph2.fillAlphas = 0.2;
				    graph2.fillColors = "#000000";
				    graph2.lineColor = "#FFFFFF";
				    graph2.showBalloon = false;
				    chart.addGraph(graph2);

				    var valueAxis = new AmCharts.ValueAxis();
				    valueAxis.gridAlpha = 0;
				    valueAxis.axisAlpha = 0;
				    valueAxis.stackType = "100%"; // this is set to achieve that column would occupy 100% of the chart area
				    chart.addValueAxis(valueAxis);

				    var categoryAxis = chart.categoryAxis;
				    categoryAxis.gridAlpha = 0;
				    categoryAxis.axisAlpha = 0;
				    chart.write("percent2");


				});
			</script>';
            return;
		}


		// setting type
		$type='';

		if(!isset($_SESSION['problemNum']) || (isset($_SESSION['problemNum']) && $_SESSION['problemNum'] <= $this->pkAmount)){
			$type='pk';
		} else if ($_SESSION['problemNum']<=($this->pkAmount+$this->pqAmount)){
			$type='pq';
		}

		$problemInfo=$this->getNextQuestion($this->subjectName,$this->chapterid,$this->sectionid,$type);
        echo '
            <!-- wrapper -->
            <div class="pretestWrapper page-wrap ">
                <section id="headerSpacerSmall"></section>
                    <section class="container loader">
                    </section>
                    <section class="body">
                        <section class="row-fluid">
                            <section class="col-xs-12 text-body text-center pretestQuestionsContainer">
        ';

        //Load Problem Text from database
        if(strpos($problemInfo['problem'],'DOCUMENT_ROOT')>0){
            echo substr_replace($problemInfo['problem'],$_SERVER['DOCUMENT_ROOT'],strpos($problemInfo['problem'],'DOCUMENT_ROOT'),strlen('DOCUMENT_ROOT'));
        } else {
            echo $problemInfo['problem'];
        }

        //if(isset($_SESSION['pre
		if(isset($problemInfo['domain'])){
			echo '<br/>';
			echo 'Domain: ';
			echo '<input id="studentDomain" type="text" onkeyup="interpretLex(\'studentDomain\',\'displayStudentDomain\')">';
			echo '<div id="displayStudentDomain"></div>';
			echo '<div id="checkDomainReturn"> </div>';
		}
        // StudentAns div is now included in the db with the problem
        /*
		echo '<input class="form-control" id="studentAns" type="text" onkeyup="interpretLex(\'studentAns\',\'displayStudentAns\')">';
		echo '<div id="displayStudentAns"></div>';
        */
        echo '
                    <br/>
                    <br/>
                    For Demo Purposes, the correct answer is: '.$problemInfo['answer'].'<br/>
					<button id="submitPrequizAnswer" class="readyButton">Submit Answer</button>
                    <div id="checkAnswerReturn"> </div>
                    '//<br/>'s for pushing footer down
                    .'
                    <br/>
                    <br/>
                    <br/>
				</section>
			</section>
		</section>
	</section>
</div>
<footer class="row site-footer">
  	<section class="col-md-4 col-xs-12" style="cursor:pointer" onclick=\'window.location.href = "http://goaptitude.com/demo";\'><img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>

	<section class="col-md-4 col-xs-12 text-center">
		<div class="meterwrapper">
			<!-- Start of meter -->
			<div class="meter">
				<span id="meterSpan" style="width:'.((($problemNum-1)/$this->totalAmount)*100).'%" ></span>
			</div><!-- End of meter -->
		</div>
	</section>

 	<section class="col-md-4 col-xs-12 text-right" onclick="skipPrequiz();" style="padding-right:45px;cursor:pointer;">SKIP PREQUIZ <img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/right-arrow.png"  style="margin-left: 7px;"></section>
	<script>
		function skipPrequiz(){
			$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Prequiz.php?action=skipQuiz&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'",success:function(result){
				location.reload();
			}});
		}
	</script>

</footer>
';            


        $nextButtonText='next problem';
        if($problemNum==$this->totalAmount){
            $nextButtonText='Finish';
        }
		echo '<script type="text/javascript">
		var $submitPrequizAnswer= $(\'#submitPrequizAnswer\');
		$submitPrequizAnswer.click(function() {
			if($("#studentAns").val()==""){
				alert("please enter a valid answer before clicking submit");
			} else {
				var studentAns=$("#studentAns").val();
				//If the radio button exists check the value of that instead of a standard text response
				if($("#radio1").length > 0){
					studentAns = $("input[name=radios]:checked").val();
				}
				$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Prequiz.php?action=checkAnswer&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'&problemid='.$problemInfo['problem_id'].'&var=1&timer="+counter+"&studentAns="+encodeURIComponent(studentAns),success:function(result){
					if(result=="correct"){
						//$("#checkAnswerReturn").html("Correct<br/>");
					} else {
						//$("#checkAnswerReturn").html("Incorrect");
					}
					console.log(result);
                    $("#submitPrequizAnswer").hide();
					/*
					$("#checkAnswerReturn").append("<div id=\'nextProblem\' onclick=\'nextProblem();\' style=\'display:none;\'>'.$nextButtonText.'</div>");
					$("#meterSpan").width("'.(($problemNum/$this->totalAmount)*100).'%");
					$("#nextProblem").show();
					$("#prequiz").css("padding-top","80px");
					*/
					nextProblem();
				}});
			}';

            if(isset($problemInfo['domain'])){
                echo '
                if($("#studentDomain").val()==""){
                    alert("please enter a valid domain before clicking submit");
                } else {
                    var studentDomain=$("#studentDomain").val();
                    $.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Prequiz.php?action=checkDomain&problemid='.$problemInfo['problem_id'].'&var=1&studentDomain="+encodeURIComponent(studentDomain),success:function(result){
                        if(result=="correct"){
                            $("#checkDomainReturn").html("Correct");
                        } else {
                            $("#checkDomainReturn").html("Incorrect");
                        }
                    }});
                }
                ';
            }
            echo '
        });
	function nextProblem(){
		$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Prequiz.php?action=nextProblem&subjectName='.$this->subjectName.'&chapterid='.$this->chapterid.'&sectionid='.$this->sectionid.'",success:function(result){
			$("#prequiz").html(result);
			$.getScript("'.$_SERVER['DOCUMENT_ROOT'].'js/equationEditor/functions.js", function() {
		  });
		}});
	}
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	function interpretLex(fromElementid,toElementid){
		$("#"+toElementid).html("&#92("+$("#"+fromElementid).val()+"&#92)");
		var math=document.getElementById(toElementid);
		MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	}


	</script>

	<script type=\'text/x-mathjax-config\'>
    MathJax.Hub.Config({
            config: [\'TeX-AMS-MML_HTMLorMML-full.js\'],
            extensions: [\'TeX/cancel.js\'],
            TeX: {extensions: [\'color.js\']},
            tex2jax: {inlineMath: [[\'$\',\'$\'], [\'\\\\(\',\'\\\\)\']], preview: \'none\'},
            \'HTML-CSS\': {showMathMenu: false},
            skipStartupTypeset: true
        });
    </script>
    ';
		
	}

	function checkDomain(){
		$problemid=$_REQUEST['problemid'];
		$var=$_REQUEST['var'];
		$studentDomain=$_REQUEST['studentDomain'];
		//print_r('problemid:'.$problemid.'<br/>var:'.$var.'<br/>student ans:'.$studentAns);
		$problemInfo=$this->getProblemByid($problemid);
		//krumo($problemInfo);
		//fix latex, etc here
		//calculate answer from $problemInfo['problem']
		$correctDomain=$problemInfo['domain'];

		if(str_replace(' ','',$studentDomain)==$correctDomain){
			echo 'correct';
			//add to db
		} else {
			echo 'incorrect';
			//add to db
		}
	}
	function checkAnswer(){
		$problemid=$_REQUEST['problemid'];
		$var=$_REQUEST['var'];
		$studentAns=$_REQUEST['studentAns'];
		//print_r('problemid:'.$problemid.'<br/>var:'.$var.'<br/>student ans:'.$studentAns);
		$problemInfo=$this->getProblemByid($problemid);
		//fix latex, etc here
		//calculate answer from $problemInfo['problem']
		$correctAns=$problemInfo['answer'];

        $isCorrect=false;
		if(str_replace(' ','',$studentAns)==$correctAns){
            $isCorrect=true;
            //hide for now because the wont see it during the page transtion
			//echo 'correct';
			//add to db
		} else {
            $isCorrect=false;
			//hide for now because the wont see it during the page transtion
			//echo 'incorrect';
			//add to db
		}
		/*
		echo 'correct:';
		print_r($correctAns);
		echo '<br/>';
		echo 'sutdent:';
		print_r($studentAns);
		*/
		$problemTry=0;
		if(isset($_SESSION['math1050-prequiz'][$problemid])){
			$problemTry=count($_SESSION['math1050-prequiz'][$problemid]);
		}
        $_SESSION['math1050-prequiz'][$problemid][$problemTry]['studentAns']=$studentAns;
        $_SESSION['math1050-prequiz'][$problemid][$problemTry]['correctAns']=$correctAns;
        $_SESSION['math1050-prequiz'][$problemid][$problemTry]['correct']=$isCorrect;
        $_SESSION['math1050-prequiz'][$problemid][$problemTry]['type']=$problemInfo['problem_type'];
        $_SESSION['math1050-prequiz'][$problemid][$problemTry]['concept']=$problemInfo['concept_hack'];
		if(isset($_REQUEST['timer'])){
			$_SESSION['math1050-prequiz'][$problemid][$problemTry]['timer']=$_REQUEST['timer'];
		}
        $_SESSION['math1050-prequiz'][$problemid][$problemTry]['concept']=$problemInfo['concept_hack'];
        if(isset($problemInfo['problem_type'])){
            $_SESSION['math1050-prequiz'][$problemid][$problemTry]['problemType']=$problemInfo['problem_type'];
        }
        $_SESSION['prequizProblemComplete']=1;
	}
}
if(isset($_REQUEST['action'])){
	$prequiz = new Prequiz($_REQUEST['subjectName'],$_REQUEST['chapterid'],$_REQUEST['sectionid']);
}
