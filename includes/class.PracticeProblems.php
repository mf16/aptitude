<?php
// PracticeProblems class for end of section test

include_once "class.PracticeProblemsDAO.php";
include_once "global.php";
class PracticeProblems extends PracticeProblemsDAO {
	private $subjectName;
	private $chapterid;
	private $sectionid;
	private $ppAmount;

	function __construct($subjectName, $chapterid, $sectionid){
		$this->subjectName=$subjectName;
		$this->chapterid=$chapterid;
		$this->sectionid=$sectionid;
		//Number of practice problems
		$this->ppAmount=3;
		
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else {
			$this->draw();
		}
	}

	function draw(){
		$problems=$this->getppBySubjectChapterSectionAmount($this->subjectName,$this->chapterid,$this->sectionid,$this->ppAmount);
		krumo($problems);
		foreach($problems as $key=>$problemInfo){
			//print_r($problemInfo);
			echo '
				<section class="row-fluid" style="margin-right: 25px;">
					<article class="col-xs-12 margin-top margin-bottom definition practiceContainer">
						<article class="col-md-2 practiceNumber">
							<h1>'.($key+1).'.</h1>
						</article>
						<article class="col-md-10 no-padding">	
						'.$problemInfo['problem'].'
						</article>
					<button id="submitPrequizAnswer'.$problemInfo['problem_id'].'" onclick="checkAnswer('.$problemInfo['problem_id'].')" class="readyButton">Submit Answer</button>
					<div id="checkAnswerReturn'.$problemInfo['problem_id'].'"></div>
					</article>
				</section>
			';
		}
		echo '
			<script>
			function checkAnswer(problemid){
				if($("#studentAns"+problemid).val()==""){
					alert("please enter a valid answer before clicking submit");
				} else {
					var studentAns=$("#studentAns"+problemid).val();
					//If the radio button exists check the value of that instead of a standard text response
					if($("#radio1").length > 0){
						studentAns = $("input[name=radios]:checked").val();
					}
					$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.PracticeProblems.php?action=checkAnswer&subjectName='.$this->subjectName.'&chapterid='.$this->subjectName.'&sectionid='.$this->sectionid.'&problemid='.$problemInfo['problem_id'].'&studentAns="+encodeURIComponent(studentAns),success:function(result){
						if(result=="correct"){
							$("#checkAnswerReturn"+problemid).html("Correct<br/>");
						} else {
							$("#checkAnswerReturn"+problemid).html("Incorrect");
						}
						console.log(result);
						$("#submitPrequizAnswer"+problemid).hide();
						$("#nextProblem").show();
						$("#prequiz").css("padding-top","80px");
					}});
				}
			}
			
				function interpretLex(fromElementid,toElementid){
					$("#"+toElementid).html("&#92("+$("#"+fromElementid).val()+"&#92)");
					var math=document.getElementById(toElementid);
					MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
				}
			</script>
		';		
	}

	function checkAnswer(){
		echo 'checkanswer';
	}
}
if(isset($_REQUEST['action'])){
	$practiceProblems = new PracticeProblems($_REQUEST['subjectName'],$_REQUEST['chapterid'],$_REQUEST['sectionid']);
}
