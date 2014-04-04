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
include_once "class.mysqliAPI.php";

/////////////////////////////////////////////////////////////
//				Server Variables
/////////////////////////////////////////////////////////////
$_SERVER['DOCUMENT_ROOT']='/var/www/aptitude/';

if($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost'){
	$_SERVER['DOCUMENT_ROOT']='/aptitude/';
}
/////////////////////////////////////////////////////////////
//				Database Connections
/////////////////////////////////////////////////////////////

if($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost'){
	$db = new mysqliAPI('localhost', 'root', '');
} 
elseif($_SERVER['HTTP_HOST']=='dev.goaptitude.com'){
	$db = new mysqliAPI('localhost', 'goaptitude', 'Chicheme2013');
}
else{ //other server info here
	die("How did you get here? Really, we want to know. Email support@goaptitude.com");
}

if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}
