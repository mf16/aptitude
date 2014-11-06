<?php
include_once "global.php";

class ProfileDAO{
	function __construct(){
	}

	function getClassesByAdminid($subject,$userid){
		global $db;
		$group_admin_id=$_SESSION['userid'];
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}

	function getUserByid($id){
		global $db;
		$sql="SELECT * FROM universal.users WHERE id=?;";
		$results=query($sql,$id);
		$results=$results[0];
		return $results;
	}
}
