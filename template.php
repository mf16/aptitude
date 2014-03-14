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

$path = ltrim(str_replace('//','/',$_SERVER['REQUEST_URI']), '/');
$elements = explode('/', $path);

if(count($elements) == 0 || (count($elements)==2 && !$elements[1])){                       
	echo 'homepage';
}
$className = '';
array_shift($elements); // using localhost/aptitude
foreach($elements as $key => $element){
	$className .= ucwords($element);
	if($key<sizeof($elements)-1){
		$className .= '_';
	}
}

include 'includes/class.'.$className.'.php'; //includes class based on URL path
$drawObj = new $className;

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
