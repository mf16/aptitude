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

$className = '';
if(count($elements) == 0 || (count($elements)==2 && !$elements[1])){                       
	echo 'homepage';
	$className='Homepage';
} else {
	array_shift($elements); // using localhost/aptitude
	foreach($elements as $key => $element){
		$className .= ucwords($element);
		if($key<sizeof($elements)-1){
			$className .= '_';
		}
	}
}


if(isset($_SESSION['logged'])){

} else{
	// saving this for later
	//$user->name='Guest';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'includes/class.'.$className.'.php';
?>
</html>
