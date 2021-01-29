<?php
header('Access-Control-Allow-Origin','*');
$informationMessage =""; // Update the status or any kind of query
$requestData = "";// used to get data from the Frontend
$responseData = new \stdClass();
$databaseConnectionStatus = "";
$databaseMessage = "";

$serverName ="localhost";
$databaseName ="batchfive";
$tableName = "mywebsiteform";
$username ="root";
$password = "";
if(isset($_POST)){
    $name = $_POST['name'];
    $emailId = $_POST['emailID'];
    $contactNumber = $_POST['contactNumber'];
    $message = $_POST['message'];

    $connection = new mysqli($serverName,$username,$password,$databaseName);

    if($connection->connect_errno){
        $databaseMessage = $connection->connect_error;
        $databaseConnectionStatus = "false";
        $informationMessage="500 Internal Server Error";
    }else{
        $databaseMessage = $connection->connect_error;
        $databaseConnectionStatus = "true";

       $insert = "INSERT INTO $tableName VALUES ('','$name','$contactNumber','$emailId','$message')";
       if($connection->query($insert)){
        $informationMessage="Data Added Succefully";
       }else{
        $informationMessage="Error";
       }
    }
}else{
    $informationMessage = "No Data";
    $requestData = "Wrong Path";
    $databaseConnectionStatus ="false";
    $databaseMessage ="Check the path";
}

$responseData->status = $databaseConnectionStatus;
$responseData->msg = $databaseMessage;
$responseData->info = $informationMessage;
$responseData->data = "Null";

echo json_encode($responseData,JSON_PRETTY_PRINT);


?>