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
	print_r($functionsDAO->login());
}
