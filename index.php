<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

include_once "includes/global.php";


$path = ltrim(str_replace('//','/',$_SERVER['REQUEST_URI']), '/');
$elements = explode('/', $path);

//SERVER SIDE CODE TO DISPLAY DEMO
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
		else if(strtolower($className)=='section'){
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
//LOCAL DEVELOPMENT CODE
else{
	if(isset($_SESSION['userid'])){
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
				} else if(strtolower($className)=='section'){
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
				} else if(strtolower($className)=='profile'){
					if(isset($elements[$key+1]) && !$elements[$key+1]==''){
						$profileid=$elements[$key+1];
					} else {
						// go to my profile page
						echo 'myprofile page';
						//die;
						break;
					}
					break;
				} else if(strtolower($className)=='login'){
					if(isset($elements[$key+1]) && !$elements[$key+1]==''){
						$loginUserid=$elements[$key+1];
					} else {
						//die;
						break;
					}
					break;
				}
				if($key<sizeof($elements)-1){
					$className .= '_';
				}
			}
		}
	} else {
		$className='login';
		print_r($elements);
		// Find where 'login' is in the $elements array
		$loginPos=(array_search('login',array_map('strtolower',$elements)));
		if(isset($elements[$loginPos+1]) && $elements[$loginPos+1]!=''){
			$loginUserid=$elements[$loginPos+1];
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
