<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
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

//Code strictly for server side
$className = '';
if($_SERVER['HTTP_HOST']=='dev.goaptitude.com'){
	foreach($elements as $key => $element){
		$className = strtolower($elements[0]);
		if(strtolower($className)=='class'||strtolower($className)=='group'){
			$className='Group';
			if(isset($elements[$key+1])){
				$groupid=$elements[$key+1];
			}
			break;
		} 
		else if(strtolower($className)=='math'){
			if(isset($elements[$key+1])){
				$subjectName=$elements[$key+1];
				if(isset($elements[$key+2])){
					$chapterid=$elements[$key+2];
					if(isset($elements[$key+3])){
						$sectionid=$elements[$key+3];
					}
					else{
						$sectionid = 1;
					}
				}
				else{
					$chapterName=1;
				}
			}
			else{
				$subjectName='math-1050';
			}
			break;
		}
	}
}
//Code for localhost development
else{
	if(count($elements) == 0 || (count($elements)==2 && !$elements[1])){                       
		echo 'homepage';
		$className='Homepage';
	} 
	else {
		array_shift($elements); // using localhost/aptitude
		foreach($elements as $key => $element){
			$className .= strtolower($element);
			if(strtolower($className)=='class'||strtolower($className)=='group'){
				$className='Group';
				if(isset($elements[$key+1])){
					$groupid=$elements[$key+1];
				}
				break;
			} 
			else if(strtolower($className)=='section'){
				if(isset($elements[$key+1]) && !$elements[$key+1]==''){
					$subjectName=$elements[$key+1];
					if(isset($elements[$key+2]) && !$elements[$key+2]==''){
						$chapterid=$elements[$key+2];
						if(isset($elements[$key+3]) && !$elements[$key+3]==''){
							$sectionid=$elements[$key+3];
						} else{
							$sectionid = 1;
						}
					} else{
						$chapterid = 1;
						$sectionid = 1;
					}
				} else{
					$subjectName='math-1050';
				}
				break;
			}
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
//Load php file corresponding to page request
include_once 'includes/class.'.ucwords($className).'.php';
?>
</html>