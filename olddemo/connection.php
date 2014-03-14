<?php

$conn = new mysqli('localhost', 'goaptitude', 'Chicheme2013', 'goaptitude');

if($conn->connect_errno > 0){
    die('Unable to connect to database [' . $conn->connect_error . ']');
}

?>