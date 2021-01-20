<?php
// Server side scripting
//  SQL Commands, methods
// $ - sign similar var in js

// HTML Page on serve
// Form
// Form data to be displayed in PHP
$name = $_GET['name'];
$emailId = $_GET['emailID'];
$contactNumber = $_GET['contactNumber'];
$message = $_GET['message'];

echo $name,$emailId,$contactNumber,$message;

// connecting be with db
// posting data to db

?>