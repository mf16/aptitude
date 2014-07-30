<?php
// Class Prequiz
//
// Used by all prequizes regardless of subject

// include 'includes/class.MathPrequiz.php';
//unset($_SESSION['problemNum']);
include_once 'global.php';
include 'class.PrequizDAO.php';
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
            <link rel="stylesheet" type="text/css" href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/math-1050/5/1/pretest_page_specific_styling.css">
            <div id="workArea"></div>
        ';

		if($problemNum>$this->totalAmount){
			$keyArray=array_keys($_SESSION['math1050-prequiz']);
			//print_r($keyArray);
			echo '
				<section class="col-sm-2 col-xs-2 chapterArrow no-padding">
					<div class="chapter-number">
						<img src="/aptitude/img/global/chapter-arrow.png"/>
					</div>
				</section>
				<section class="col-md-4 material-body col-sm-offset-1 col-xs-offset-1 col-md-offset-0">
					<section class="row-fluid section-title-container">
						<h1 class="section-title">Pre-test report</h1>
						<span class="section-number">composition of functions</span><br>
					</section>
					<section class="row-fluid" style="margin-top:100px;">
						<span>graphs and stuff go here</span>
					</section>
				</section>
				<section class="col-md-6 pretestProblemBreakdownContainer">';
					echo '<table>
					<tr>
						<th>Problem ID</th>
						<th>Time Spent</th>
						<th>Problem Type</th>
						<th>Problem Concept</th>
						<th>Correct Answer</th>
						<th>Student Answer Given</th>
						<th>Correct?</th>
					</tr>';
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
					echo '<tr>';
						echo '<td>'.$key.'</td>';
						echo '<td>'.$minutes.':'.$seconds.'</td>';
						echo '<td>'.$typeArray[$displayInfo['type']].'</td>';
						echo '<td>'.$displayInfo['concept'].'</td>';
						echo '<td>\('.$displayInfo['correctAns'].'\)</td>';
						echo '<td>\('.$displayInfo['studentAns'].'\)</td>';
						echo '<td>'.$displayInfo['correct'].'</td>';
					echo '</tr>';
					// add to 
				}
				echo '</table>';
				echo '</section>	


				<section class="clearfix"></section>
				';
			

			//display results
            //$_SESSION['isPrequizCompleted']=1;
            echo '<button onclick="setQuizComplete();">Continue to book content</button>';
            echo '<script>
				MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
				function setQuizComplete(){
					$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Prequiz.php?action=finishQuiz&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'",success:function(result){
						location.reload();
					}});
				}
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
  	<section class="col-md-4 col-xs-12"><img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/left-arrow.png" style="margin-right: 7px;"> BACK</section>

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
						$("#checkAnswerReturn").html("Correct<br/>");
					} else {
						$("#checkAnswerReturn").html("Incorrect");
					}
					console.log(result);
                    $("#submitPrequizAnswer").hide();
					$("#checkAnswerReturn").append("<div id=\'nextProblem\' onclick=\'nextProblem();\' style=\'display:none;\'>'.$nextButtonText.'</div>");
					$("#meterSpan").width("'.(($problemNum/$this->totalAmount)*100).'%");
					$("#nextProblem").show();
					$("#prequiz").css("padding-top","80px");
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
		}});
	}
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	function interpretLex(fromElementid,toElementid){
		$("#"+toElementid).html("&#92("+$("#"+fromElementid).val()+"&#92)");
		var math=document.getElementById(toElementid);
		MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	}
	</script>';
		
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
			echo 'correct';
			//add to db
		} else {
            $isCorrect=false;
			echo 'incorrect';
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
