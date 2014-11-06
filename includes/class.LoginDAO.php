<?php
include_once "global.php";

class LoginDAO{
	function __construct(){
	}
	
	function getUserDetailsByid($userid){
		$sql="SELECT * FROM universal.users WHERE id=?;";
		$results=query($sql,$userid);
		return $results[0];
	}
}
