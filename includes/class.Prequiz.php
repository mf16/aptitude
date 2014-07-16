<?php
// Class Prequiz
//
// Used by all prequizes regardless of subject

// include 'includes/class.MathPrequiz.php';
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
echo '
<head>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    tex2jax: {
      inlineMath: [["$","$"],["\\(","\\)"]]
    }
  });
</script>
<script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML-full">
</script>
</head>
';
		$problemNum=$_REQUEST['problemNum'];
		echo 'problemNum:'.$problemNum.'<br/><br/>';
		if($problemNum>10){
			//end - 10 questions have been answered.
			//display results
		}
		$problemInfo=$this->getNextQuestion($this->subjectName,$this->chapterid,$this->sectionid);
		echo $problemInfo['problem'];
		echo '<input id="studentAns" type="text">';
		echo '

<script>
  //
  //  Use a closure to hide the local variables from the
  //  global namespace
  //
  (function () {
    var QUEUE = MathJax.Hub.queue;  // shorthand for the queue
    var math = null;                // the element jax for the math output.

    //
    //  Get the element jax when MathJax has produced it.
    //
    QUEUE.Push(function () {
      math = MathJax.Hub.getAllJax("MathOutput")[0];
    });

    //
    //  The onchange event handler that typesets the
    //  math entered by the user
    //
    window.UpdateMath = function (TeX) {
      QUEUE.Push(["Text",math,"\\displaystyle{"+TeX+"}"]);
    }
  })();
</script>

<input id="MathInput" size="50" onchange="UpdateMath(this.value)" />
<p>

<div id="MathOutput">
You typed: ${}$
</div>';
		echo '<div id="submitPrequizAnswer" onclick="">submit</div>';
		echo '<div id="checkAnswerReturn"> </div>';
	echo '<script src="/aptitude/js/jquery-1.11.0/jquery.min.js"></script>';
	echo '<script>
	var $submitPrequizAnswer= $(\'#submitPrequizAnswer\');
	$submitPrequizAnswer.click(function() {
		if($("#studentAns").val()==""){
			alert("please enter a valid answer before clicking submit");
		} else {
			var studentAns=$("#studentAns").val();
			$.ajax({url:"/aptitude/includes/class.Prequiz.php?action=checkAnswer&problemid='.$problemInfo['problem_id'].'&var=1&studentAns="+encodeURIComponent(studentAns),success:function(result){
				if(result=="correct"){
					$("#checkAnswerReturn").html("Correct");
				} else {
					$("#checkAnswerReturn").html("Incorrect");
				}
				$("#checkAnswerReturn").html(result);
				$("#prequiz").css("padding-top","80px");
			}});
		}
	});
	</script>';
		
	}

	function checkAnswer(){
		$problemid=$_REQUEST['problemid'];
		$var=$_REQUEST['var'];
		$studentAns=$_REQUEST['studentAns'];
		//print_r('problemid:'.$problemid.'<br/>var:'.$var.'<br/>student ans:'.$studentAns);
		$problemInfo=$this->getProblemByid($problemid);
		//krumo($problemInfo);
		//fix latex, etc here
		//calculate answer from $problemInfo['problem']
		$correctAns=$problemInfo['answer'];
		echo $correctAns.'<br/>';
		echo $studentAns;
		if(str_replace(' ','',$studentAns)==$correctAns){
			echo 'correct';
		} else {
			echo 'incorrect';
		}
	}
}
if(isset($_REQUEST['action'])){
	$prequiz = new Prequiz($_REQUEST['subjectName'],$_REQUEST['chapterid'],$_REQUEST['sectionid']);
}
