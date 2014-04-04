<?php
include_once "global.php";

class mysqliAPI extends mysqli{

	function get_rows($sql,$whereArray){
		global $db;
		$stmt = $db->stmt_init();
		$stmt = $db->prepare($sql);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		}
		if(isset($whereArray)){
			if(!is_array($whereArray)){
				$whereArray=array($whereArray);
				//return 'Fail: 2nd param in get_rows is not array or empty';
			}
			$typeString='';
			foreach($whereArray as $key=>$var){
				if(is_int($var)){
					$typeString.='i';
				} else if (is_string($var)){
					$typeString.='s';
				} else {
					return 'Please cast your where variables as strings or integers';
				}
			}
			array_unshift($whereArray,$typeString);
			print_r($whereArray);

			function refValues($arr)
			{ 
				$refs = array();
				foreach ($arr as $key => $value)
				{
				    $refs[$key] = &$arr[$key]; 
				}
				return $refs; 
			}

			call_user_func_array(array($stmt, "bind_param"), refValues($whereArray));
			$stmt->execute();
			$rs=$stmt->get_result();
			$results= $rs->fetch_all(MYSQLI_ASSOC);
			return $results;
		}
	}
}
