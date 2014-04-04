<?php
include_once "global.php";

class functionsDAO {
	function __construct(){
	}
	
	function getPasswordByUsername($username){
		global $db;
		$hashedPassword=query('select password FROM universal.user_passwords p, universal.users u WHERE u.ID=p.id AND u.email=?;',$username);
		$hashedPassword=$hashedPassword[0]['password'];
		return $hashedPassword;
	}

	function getUserInfoByUsername($username){
		global $db;
		$results=query('select * from universal.users WHERE email=?;',$username);
		//print_r($sql.$username);die();
		if(isset($results)){
			return $results;
		} else {
			return 'no one found by that username';
		}
	}
}
