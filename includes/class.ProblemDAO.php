<?php
// ProblemDAO class
// Database Access Object for Problem Class
include_once "global.php";
class ProblemDAO{
	
	function getProblemBySubjectChapterSection($subjectName,$chapterid,$sectionid,$problemType,$concept){
		global $db;
		$usedProblemString='';
		if(isset($_SESSION['math1050']['practiceProblems'])){
			foreach($_SESSION['math1050']['practiceProblems'] as $problemid=>$problemInfo){
				$usedProblemString.=' AND problem_id != '.$problemid;
			}
		}
		$sql="SELECT problem_id,concept_id,problem,answerBoxHTML,concept_hack,answer,problem_type FROM math.problems WHERE chapter_id=? AND section_id=? ".$usedProblemString." AND problem_type=? ORDER BY RAND() LIMIT 1";
		$results=query($sql,$chapterid,$sectionid,$problemType);
		return $results[0];
	}

	function getAnswer($problemid){
		global $db;
		$sql="SELECT answer FROM math.problems WHERE problem_id=?";
		$result=query($sql,$problemid);
		return $result[0]['answer']; 
	}
}

