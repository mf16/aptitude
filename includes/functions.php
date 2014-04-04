<?php
include_once "functionsDAO.php";
$functionsDAO = new functionsDAO();
function drawHeader($headerText){
	include "head.php";
	echo ($headerText);
}
function drawFooter($footerText){
	include 'foot.php';
}

function login($username,$password){
	global $functionsDAO;

	if(isset($_SESSION['userEmail'])){
		//return 'Already Logged In';
	}
	$hashedPassword=$functionsDAO->getPasswordByUsername($username);
	if(password_verify($password,$hashedPassword)){
		//login success
		$userInfo=$functionsDAO->getUserInfoByUsername($username);
		$userInfo=$userInfo[0];
		$_SESSION['userid']=$userInfo['id'];
		$_SESSION['userFirstname']=$userInfo['user_firstname'];
		$_SESSION['userLastname']=$userInfo['user_lastname'];
		$_SESSION['userEmail']=$userInfo['email'];
		return true;
	} else {
		//failed login
		return false;
	}
}

function query($query) {
	global $db;
	$args = func_get_args();
	if (count($args) == 1) {
		$result = $db->query($query);
		if ($result->num_rows) {
			$out = array();
			while (null != ($r = $result->fetch_array(MYSQLI_ASSOC)))
				$out [] = $r;
			return $out;
		}
		return null;
	} else {
		if (!$stmt = $db->prepare($query))
		trigger_error("Unable to prepare statement: {$query}, reason: " . $db->error . "");
		array_shift($args); //remove $Query from args
		//the following three lines are the only way to copy an array values in PHP
		$a = array();
		foreach ($args as $k => &$v)
		$a[$k] = &$v;
		$types = str_repeat("s", count($args)); //all params are strings, works well on MySQL and SQLite
		array_unshift($a, $types);
		call_user_func_array(array($stmt, 'bind_param'), $a);
		$stmt->execute();
		//fetching all results in a 2D array
		$metadata = $stmt->result_metadata();
		$out = array();
		$fields = array();
		if (!$metadata)
		return null;
		$length = 0;
		while (null != ($field = mysqli_fetch_field($metadata))) {
			$fields [] = &$out [$field->name];
			$length+=$field->length;
		}
		call_user_func_array(array($stmt, "bind_result"), $fields);
		$output = array();
		$count = 0;
		while ($stmt->fetch()) {
			foreach ($out as $k => $v){
				$output [$count] [$k] = $v;
			}
			$count++;
		}
		$stmt->free_result();
		return ($count == 0) ? null : $output;
	}
}
