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
if($_SERVER['HTTP_HOST']=='dev.goaptitude.com'){
	$className = strtolower($elements[0]);
}
else{
	if(count($elements) == 0 || (count($elements)==2 && !$elements[1])){                       
		echo 'homepage';
		$className='Homepage';
	} 
	else {
		array_shift($elements); // using localhost/aptitude
		foreach($elements as $key => $element){
			$className .= strtolower($element);
			if($key<sizeof($elements)-1){
				$className .= '_';
			}
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
include 'includes/class.'.ucwords($className).'.php';
echo '<script src="js/'.$className.'.js"></script>';
echo '<link href="css/includes/'.$className.'.css" type="text/css" rel="stylesheet">';
?>
</html>
