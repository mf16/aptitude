<?php
/////////////////////////////////////////////////////////////
//
//				template.php
//			General template file for site
//			
//			Mitch Facer - March 2014
//
/////////////////////////////////////////////////////////////

include_once "includes/global.php";

$path = ltrim(substr($_SERVER['REQUEST_URI'],0), '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes

if(count($elements) == 0 || (count($elements)==2 && !$elements[1])){                       
	echo 'homepage';
	//$drawObj = new homepage();
} else switch ($elements[1]){
	case 'signup':
		include 'includes/class.newUser.php';
		// include js? js folder or just class.newUser.js?
		$drawObj = new newUser();
		break;
	default:
		echo '404 error';die();
		//Show404Error();
}

if(isset($_SESSION['logged'])){

} else {
	$user->name='Guest';
}

?><!DOCTYPE html>
<html class="no-js">
<head>
<?php
	include_once 'head.php';
?>
</head>
<body>
<?php
 $drawObj->draw(); //??
?>
</body>
</html>
