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

	function nextProblem(){
		//unset($_SESSION['prequizProblems']);
		krumo($_SESSION);

		if(!isset($_SESSION['problemNum'])){
			$_SESSION['problemNum']=1;
			$problemNum=1;
		} else {
			$problemNum=($_SESSION['problemNum']+1);
            $_SESSION['problemNum']=$problemNum;
		}
		echo 'problemNum:'.$problemNum.'<br/><br/>';
		if($problemNum>10){
			//end - 10 questions have been answered.
			//display results
		}
		$problemInfo=$this->getNextQuestion($this->subjectName,$this->chapterid,$this->sectionid);
		echo $problemInfo['problem'];
		if($problemInfo['problem_uri']){
			echo '<br/>';
			echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].$problemInfo['problem_uri'].'"/>';
			echo '<br/>';
		}
		echo '<input id="studentAns" type="text" onkeyup="interpretLex(\'studentAns\',\'displayStudentAns\')">';
		echo '<div id="displayStudentAns"></div>';
		echo '<div id="checkAnswerReturn"> </div>';
		if(isset($problemInfo['domain'])){
			echo '<br/>';
			echo 'Domain: ';
			echo '<input id="studentDomain" type="text" onkeyup="interpretLex(\'studentDomain\',\'displayStudentDomain\')">';
			echo '<div id="displayStudentDomain"></div>';
			echo '<div id="checkDomainReturn"> </div>';
		}
		echo '<br/>';
		echo '<br/>';
		echo '<div id="submitPrequizAnswer" onclick="">submit</div>';


        unset($_SESSION['problemNum']);
        unset($_SESSION['prequizProblems']);


		echo '<script type="text/javascript">
		var $submitPrequizAnswer= $(\'#submitPrequizAnswer\');
		$submitPrequizAnswer.click(function() {
			if($("#studentAns").val()==""){
				alert("please enter a valid answer before clicking submit");
			} else {
				var studentAns=$("#studentAns").val();
				$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=checkAnswer&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'&problemid='.$problemInfo['problem_id'].'&var=1&studentAns="+encodeURIComponent(studentAns),success:function(result){
                    console.log(result);
					if(result=="correct"){
						$("#checkAnswerReturn").html("Correct<br/>");
						$("#submitPrequizAnswer").hide();
					} else {
						$("#checkAnswerReturn").html("Incorrect");
					}
					$("#checkAnswerReturn").append("<div id=\'nextProblem\' onclick=\'nextProblem();\' style=\'display:none;\'>next problem</div>");
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

		if(str_replace(' ','',$studentAns)==$correctAns){
			echo 'correct';
			//add to db
		} else {
			echo 'incorrect';
			//add to db
		}
	}
}
if(isset($_REQUEST['action'])){
	$prequiz = new Prequiz($_REQUEST['subjectName'],$_REQUEST['chapterid'],$_REQUEST['sectionid']);
}
