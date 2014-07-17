<?php
include_once "global.php";
class PrequizDAO {
	function __construct(){
	}

	function getNextQuestion($subjectName,$chapterid,$sectionid){
		global $db;
		$usedProblemidString='';
		foreach($_SESSION['prequizProblems'] as $problemid){
			$usedProblemidString.=' AND problem_id != '.$problemid;
		}
		$sql="SELECT problem_id,concept_id,problem,problem_uri FROM math.problems WHERE chapter_id=? AND section_id=? ".$usedProblemidString." ORDER BY RAND() LIMIT 1";
		$results=query($sql,$chapterid,$sectionid);

		// How are we going to pull vars? range in db?
		$results[0]['var']=1;
		return $results[0];
	}
	
	function getProblemByid($problemid){
		global $db;
		$sql="SELECT problem_id,chapter_id,section_id,concept_id,problem,answer,domain,problem_type,problem_uri FROM math.problems WHERE problem_id=?";
		$results=query($sql,$problemid);
		return $results[0];
	}
}
