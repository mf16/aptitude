<?php
// ProblemDAO class
// Database Access Object for Problem Class
include_once "global.php";
class ProblemDAO{
	
	function getProblemBySubjectChapterSection($subjectName,$chapterid,$sectionid,$problemType,$concept){
		global $db;
		$usedProblemString='';
		if(isset($_SESSION[$subjectName][$problemType])){
			foreach($_SESSION[$subjectName][$problemType] as $problemid=>$problemInfo){
				if(end($problemInfo)['correct']==1){
					$usedProblemString.=' AND problem_id != '.$problemid;
				}
			}
		}
		$orderByText=' ORDER BY RAND() ';
		if($problemType=='pp'){
			//$orderByText='';
			//figure out how to stop from pulling the same problem over and over then uncomment comment lines above
		}
		$sql="SELECT problem_id,problem,answerBoxHTML,concept_hack,answer,problem_type FROM math.problems WHERE chapter_id=? AND section_id=? ".$usedProblemString." AND problem_type=? ".$orderByText." LIMIT 1";
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

