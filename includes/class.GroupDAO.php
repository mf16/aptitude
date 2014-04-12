<?php
include_once "global.php";

class GroupDAO{
	function __construct(){
	}

	function getStudentsByClassid($classid){
		$query='SELECT user_firstname,user_lastname,email FROM universal.users u,math.group_members g WHERE g.group_id=? ORDER BY user_lastname ASC';
		$results=query($query,$classid);
		return $results;
	}

	function getGroupByAdminid($subject,$userid){
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}

	function getCourseProgressByGroupid($groupid){
		$results=query('SELECT s.section_id,s.chapter_id,s.section_name,g.completion_date FROM math.section_names s,math.group_included_sections g WHERE s.section_id=g.section_id AND g.group_id=?',$groupid);
		return $results;
	}

	function setCompleteBySectionidGroupid($sectionid,$checked,$groupid){
		//use query for update? or only select?
		if($checked=='true'){
			query('UPDATE math.group_included_sections SET completion_date=? WHERE group_id=? AND section_id=?',time(),$groupid,$sectionid);
		} else {
			query('UPDATE math.group_included_sections SET completion_date=NULL WHERE group_id=? AND section_id=?',$groupid,$sectionid);
			//$results=query('UPDATE math.group_included_sections SET completion_date=NULL WHERE group_id=? AND section_id=?',$groupid,$sectionid);
		}
	}
}
