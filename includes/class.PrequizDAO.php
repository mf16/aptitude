<?php
include_once "global.php";
class PrequizDAO {
	function __construct(){
	}

	function getNextQuestion($subjectName,$chapterid,$sectionid,$type){
		global $db;
		$usedProblemidString='';
		$typeString='';
		if(isset($type) && (strlen($type)>0)){
			$typeString=' AND problem_type="'.$type.'" ';
		}
        if(isset($_SESSION['math1050-prequiz'])){
            foreach($_SESSION['math1050-prequiz'] as $problemid => $problemInfo){
                $usedProblemidString.=' AND problem_id != '.$problemid;
            }
        }
		$sql="SELECT problem_id,problem,answer,problem_type FROM math.problems WHERE chapter_id=? AND section_id=? ".$usedProblemidString.$typeString." ORDER BY RAND() LIMIT 1";
		$results=query($sql,$chapterid,$sectionid);

		// How are we going to pull vars? range in db?
		$results[0]['var']=1;
		return $results[0];
	}
	
	function getProblemByid($problemid){
		global $db;
		$sql="SELECT problem_id,chapter_id,section_id,problem,answer,domain,problem_type FROM math.problems WHERE problem_id=?";
		$results=query($sql,$problemid);
		return $results[0];
	}

	function getConceptsByProblemid($problemid){
		$sql="SELECT c.concept_name,c.concept_id FROM math.concept_names c,math.problems_concepts p WHERE c.concept_id=p.concept_id AND p.problem_id=?;";
		$results=query($sql,$problemid);
		return $results;
	}
}
