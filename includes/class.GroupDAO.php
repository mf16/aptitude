<?php
include_once "global.php";

class GroupDAO{
	function __construct(){
	}

	function getStudentsByClassid($classid){
		$query='SELECT u.id,user_firstname,user_lastname,email,pic_uri FROM universal.users u,math.group_members g WHERE u.id=g.user_id AND g.group_id=? AND u.user_type="student" ORDER BY user_lastname ASC';
		$results=query($query,$classid);
		return $results;
	}

	function getStudentByid($studentid){
		$sql='SELECT id,email,user_firstname,user_lastname,pic_uri FROM universal.users WHERE user_type="student" AND id=?;';
		$results=query($sql,$studentid);
		return $results[0];
	}

	function getClassesByAdminid($subject,$userid){
		global $db;
		$group_admin_id=$_SESSION['userid'];
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}

	function getCourseProgressByGroupid($groupid){
		$results=query('SELECT s.section_id,s.chapter_id,s.section_name,g.completion_date FROM math.section_names s,math.group_included_sections g WHERE s.section_id=g.section_id AND g.group_id=?',$groupid);
		return $results;
	}

	function getGroupInfoByid($groupid){
		// fix group in the following sql
		$sql="SELECT group_id,group_name,group_admin_id,subject_id,start_date,end_date FROM math.groups WHERE group_id=?;";
		$results=query($sql,$groupid);
		return $results[0];
	}

	function checkProfessorInGroup($userid,$groupid){
		// fix 'group'
		$sql="SELECT COUNT(*) FROM math.groups WHERE group_admin_id=? AND group_id=?;";
		$results=query($sql,$userid,$groupid);
		$results=$results[0];
		$results=$results['COUNT(*)'];
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
