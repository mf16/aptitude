<?php
include_once "global.php";
include_once 'class.mysqliAPI.php';
class test {
	function __construct(){
		$this->test();
	}
	function test(){
		global $db;
		$sql='SELECT group_id,subject_id from math.groups WHERE subject_id=?;';
		$results=$db->get_rows($sql,array(1));
		print_r($results);
	}
}
$test = new test();
