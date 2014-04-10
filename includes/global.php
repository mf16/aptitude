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
//include_once "class.mysqliAPI.php";


////////////////////////////////////////////////////////////////
//			Database Connections followed by Server Variables
////////////////////////////////////////////////////////////////

if($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost'){
	$db = new mysqli('localhost', 'root', '');
	$_SERVER['DOCUMENT_ROOT']='/aptitude/';
} 
elseif($_SERVER['HTTP_HOST']=='dev.goaptitude.com'){
	$db = new mysqli('localhost', 'goaptitude', 'Chicheme2013');
	$_SERVER['DOCUMENT_ROOT']='';
	$_SESSION['userEmail'] = 'professor@feeny.com';
	$_SESSION['userFirstname'] = 'Albert';
	$_SESSION['userLastname'] = 'Einstein';
	$_SESSION['userid'] = 1;
}
else{ //other server info here
	die("How did you get here? Really, we want to know. Email support@goaptitude.com");
}

if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}
