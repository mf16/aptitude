<?php
include_once "global.php";

class SidebarMenuDAO{
	function __construct(){
	}

	function getGroupByProfessorid($subject,$userid){
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}
	
}
