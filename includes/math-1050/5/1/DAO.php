<?php
class SectionDAO{
	function __construct(){
	}

	function getProblemsBySection($chapter_id, $section_id){
		global $db;
		$results=query('SELECT problem_id, problem FROM math.problems WHERE chapter_id=? AND lesson_id=? ORDER BY problem_id ASC;',$chapter_id, $section_id);
		return $results;
	}
}
