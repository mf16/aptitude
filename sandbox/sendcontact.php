<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];

//send me an email for who logs on
			    $to = 'tyler.slater@icloud.com';
				$subject = "Tylerslater.me";
				$headers = "From: noreply@tylerslater.me"  . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			      
				$message = '<!DOCTYPE html>
					<html>
					    <head>
				        <style>
						
						
						  body{
							font-family: \'Source Sans Pro\', sans-serif;
				            font-size: 15px;
						  } 
					  </style>
				    </head>
				    <body>

				        <table width="100%" height="60px">
				        	<tr>
				        		<td style="padding:10px;" colspan="12" bgcolor="#2c3e50"></td>
				        	</tr>
				        	<tr>
				        		<td style="padding:10px;" colspan="12">
				        		</td>
				        	</tr>
				        	<tr>
				        		<td colspan="2" width="5px"></td>
				        		<td colspan="8" height="5px"><div align="left" style=" width:500px; border-radius:15px; padding: 20px; -webkit-border-radius: 3px; border-radius: 3px; -webkit-box-shadow: 0 1px 2px #c4c4c4; box-shadow: 0 1px 2px #c4c4c4; background-color: #fff; border-top: 5px solid #f9b256; margin-bottom: 30px;">
				        			Name: '.$name.'<br>
				        			Email: '.$email.'<br>
				        			Message: '.$message.'<br>
				        		</div></td>
				        		<td width="100px" colspan="2"></td>
				        	</tr>
				        </table>

					</body>
					</html>';

				mail($to,$subject,$message,$headers);	
?>

