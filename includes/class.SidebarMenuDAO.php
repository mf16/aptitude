<?php
include_once "global.php";

class SidebarMenuDAO{
	function __construct(){
	}

	function getGroupByProfessorid($subject,$userid){
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}

	function getGroupsByStudentid($subject,$userid){
		$sql="SELECT g.group_id,g.group_name FROM math.groups g, math.group_members m WHERE g.group_id=m.group_id AND m.user_id=?";
		$results=query($sql,$userid);
		return $results;
	}
	
}
