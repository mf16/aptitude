<?php
// Problem class
// Displays an individual problem

include_once 'global.php';
include_once 'class.ProblemDAO.php';
class Problem extends ProblemDAO {
	private $subjectName; //eventually id
	private $chapterid;
	private $sectionid;

	//probably should use get method instead of public variables
	public $concept;
	public $problemType;
	public $problemid;
	public $problem;
	public $answer;
	public $previousAnswers;
	public $answerBoxHTML;

	function __construct($subjectName,$chapterid,$sectionid,$problemType,$concept){
		$this->subjectName=$subjectName;
		$this->chapterid=$chapterid;
		$this->sectionid=$sectionid;
		$this->problemType=$problemType;
		$this->concept=$concept;


		$problemInfo=$this->getProblemBySubjectChapterSection($this->subjectName,$this->chapterid,$this->sectionid,$this->problemType,$this->concept);
		
		$this->problemid=$problemInfo['problem_id'];
		$this->answerBoxHTML=$problemInfo['answerBoxHTML'];
		//Previous Answers
		if(isset($_SESSION[$this->subjectName][$this->problemType][$problemInfo['problem_id']])){
			$this->previousAnswers=$_SESSION[$this->subjectName][$this->problemType][$problemInfo['problem_id']];
		}

		$this->problem=$problemInfo['problem'];
		$this->answerBoxHTML=$problemInfo['answerBoxHTML'];
		$this->answer=$problemInfo['answer'];

		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else {
			//$this->draw();
		}
	}
	
	function checkAnswer(){
		$problemid=$_REQUEST['problemid'];
		$var=$_REQUEST['var'];
		$studentAns=$_REQUEST['studentAns'];
		
		$correctAns=$this->getAnswer($problemid);
		$isCorrect=false;
		if(str_replace(' ','',$studentAns)==$correctAns){
			$isCorrect=true;
			echo 'correct';
		} else {
			//$correctAns remains false
			echo 'incorrect';
		}

		$problemTry=0;
		if(isset($_SESSION[$this->subjectName][$this->problemType][$problemid])){
			$problemTry=count($_SESSION[$this->subjectName][$this->problemType][$problemid]);
		}
		$_SESSION[$this->subjectName][$this->problemType][$problemid][$problemTry]['studentAns']=$studentAns;
		$_SESSION[$this->subjectName][$this->problemType][$problemid][$problemTry]['correctAns']=$correctAns;
		$_SESSION[$this->subjectName][$this->problemType][$problemid][$problemTry]['correct']=$isCorrect;
		$_SESSION[$this->subjectName][$this->problemType][$problemid][$problemTry]['concept']=$this->concept;
	}
}
if(isset($_REQUEST['action'])){
	$problem=new Problem($_REQUEST['subjectName'],$_REQUEST['chapterid'],$_REQUEST['sectionid'],$_REQUEST['problemType'],$_REQUEST['concept']);
}
