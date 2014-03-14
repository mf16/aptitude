<?php
class Signup {
	// function Signup->draw()
	// params: none
	// returns: nothing
	//
	// desc: draws default signup page
	function draw(){
		echo '<h1>draw function for newUser</h1>';
		echo 'email_address: ';
		echo '<input type="textbox" />';
		echo '<br/>';
		echo 'password: ';
		echo '<input type="textbox" />';
		echo '<br/>';
		echo 'repeat password: ';
		echo '<input type="textbox" />';
	}
}
