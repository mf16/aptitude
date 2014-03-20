<?php
/////////////////////////////////////////////////////////////
//
//				global.php
//			General global file for site
//			
//			Mitch Facer - March 2014
//
/////////////////////////////////////////////////////////////

session_start();
include_once "functions.php";
/////////////////////////////////////////////////////////////
//				Database Connections
/////////////////////////////////////////////////////////////

if($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost'){
	$db = new mysqli('localhost', 'root', '');
} 
else{ //other server info here
	die("How did you get here? Really, we want to know. Email support@goaptitude.com");
}

if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}
