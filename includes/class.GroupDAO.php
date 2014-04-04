<?php
include_once "global.php";

class GroupDAO{
	function __construct(){
	}

	function getStudentsByClassid($classid){
		global $db;
		$query='SELECT user_firstname,user_lastname,email FROM universal.users u,math.group_members g WHERE g.group_id=? ORDER BY user_lastname ASC';
		$results=query($query,$classid);
		return $results;
	}
	function getGroupByAdminid($subject,$userid){
		global $db;
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}
}
