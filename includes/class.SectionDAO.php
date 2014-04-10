<?php
include_once "global.php";

class SectionDAO{
	function __construct(){
	}

	function getClassesByAdminid($subject,$userid){
		global $db;
		$group_admin_id=$_SESSION['userid'];
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}
}
