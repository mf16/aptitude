<?php
include_once "global.php";

class GroupDAO{
	function __construct(){
	}

	function getGroupByAdminid($subject,$userid){
		global $db;
		//add where start_date<date()<end_date
		$sql='SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;';
		$group_admin_id=$_SESSION['userid'];

		// Prepare statement 
		$stmt=$db->prepare($sql);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		}
		// Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob 
		$stmt->bind_param('i',$group_admin_id);

		// Execute statement 
		$stmt->execute();

		$results=array();
		$stmt->bind_result($group_id, $group_name);
		while ($stmt->fetch()) {
			$results[]=array('groupid'=>$group_id,'groupName'=>$group_name);
		}
		return $results;
	}
}
