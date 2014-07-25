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
	
	function __construct($subjectName,$chapterid,$sectionid){
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
        unset($_SESSION['problemNum']);
        unset($_SESSION['prequizProblems']);
        unset($_SESSION['prequizProblemComplete']);
        unset($_SESSION['math1050-prequiz']);
        unset($_SESSION['isPrequizCompleted']);
        echo 'session vars cleared';
    }

	function nextProblem(){
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
		if($problemNum>3){
            echo 'END THE TEST NOW AND DISPLAY RESULTS';
			//end - 10 questions have been answered.
			//display results
            krumo($_SESSION);
            $_SESSION['isPrequizCompleted']=1;
            echo '<button onclick="refreshPage();">Continue to book content</button>';
            echo '<script>
                    function refreshPage(){
                        location.reload();
                    }
                </script>
            ';
            return;
		}
		echo 'problemNum:'.$problemNum.'<br/><br/>';
		$problemInfo=$this->getNextQuestion($this->subjectName,$this->chapterid,$this->sectionid);
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
                    For Demo Purposes, the correct answer is: \('.$problemInfo['answer'].'\)<br/>
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
				<span style="width:'.((($problemNum-1)/3)*100).'%" title="10%"></span>
			</div><!-- End of meter -->
		</div>
	</section>

 	<section class="col-md-4 col-xs-12 text-right" style="padding-right:45px;">SKIP PREQUIZ <img src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/right-arrow.png"  style="margin-left: 7px;"></section>

</footer>
';            


        $nextButtonText='next problem';
        if($problemNum==3){
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
				$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=checkAnswer&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'&problemid='.$problemInfo['problem_id'].'&var=1&studentAns="+encodeURIComponent(studentAns),success:function(result){
					if(result=="correct"){
						$("#checkAnswerReturn").html("Correct<br/>");
					} else {
						$("#checkAnswerReturn").html("Incorrect");
					}
                    $("#submitPrequizAnswer").hide();
					$("#checkAnswerReturn").append("<div id=\'nextProblem\' onclick=\'nextProblem();\' style=\'display:none;\'>'.$nextButtonText.'</div>");
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
                    $.ajax({url:"/aptitude/includes/class.Prequiz.php?action=checkDomain&problemid='.$problemInfo['problem_id'].'&var=1&studentDomain="+encodeURIComponent(studentDomain),success:function(result){
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
		$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=nextProblem&subjectName='.$this->subjectName.'&chapterid='.$this->chapterid.'&sectionid='.$this->sectionid.'",success:function(result){
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

		//do not use this question again - eventually we will load from the user_attempts table
		if(isset($_SESSION['prequizProblems']) && !array_key_exists($problemid,$_SESSION['prequizProblems'])){
			$_SESSION['prequizProblems'][$problemid]=array('problem_id'=>$problemid,'studentAns'=>$studentAns,'correctAns'=>$correctAns,'concept_id'=>$problemInfo['concept_id'],'domain'=>$problemInfo['domain']);
		}

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
        $_SESSION['math1050-prequiz'][$problemid]['studentAns'][]=$studentAns;
        $_SESSION['math1050-prequiz'][$problemid]['correct'][]=$isCorrect;
        if(isset($problemInfo['problem_type'])){
            $_SESSION['math1050-prequiz'][$problemid]['problemType'][]=$problemInfo['problem_type'];
        }
        $_SESSION['prequizProblemComplete']=1;
	}
}
if(isset($_REQUEST['action'])){
	$prequiz = new Prequiz($_REQUEST['subjectName'],$_REQUEST['chapterid'],$_REQUEST['sectionid']);
}
