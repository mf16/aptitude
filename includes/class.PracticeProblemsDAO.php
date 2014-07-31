<?php
// PracticeProblemsDAO class for accessing the db in PracticeProblems class

include_once "global.php";
class PracticeProblemsDAO {
	
	function getppBySubjectChapterSectionAmount($subjectName,$chapterid,$sectionid,$ppAmount){
		global $db;
		$usedProblemString='';
		if(isset($_SESSION['math1050']['practiceProblems'])){
			foreach($_SESSION['math1050']['practiceProblems'] as $problemid=>$problemInfo){
				$usedProblemString.=' AND problem_id != '.$problemid;
			}
		}
		$sql="SELECT problem_id,concept_id,problem,concept_hack,answer,problem_type FROM math.problems WHERE chapter_id=? AND section_id=? ".$usedProblemString." AND problem_type='pp' ORDER BY RAND() LIMIT ?";
		$results=query($sql,$chapterid,$sectionid,$ppAmount);
		echo $sql;
		return $results;
	}
}
