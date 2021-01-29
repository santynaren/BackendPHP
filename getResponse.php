<?php
header('Access-Control-Allow-Origin','*');
$requestParam = $_GET['limit'] ?? 0;
$httpCode = "";
$informationMessage =""; // Update the status or any kind of query
$requestData = "";// used to get data from the Frontend
$responseData = new \stdClass();
$databaseConnectionStatus = "";
$databaseMessage = "";
$data = array();
$serverName ="localhost";
$databaseName ="batchfive";
$tableName = "mywebsiteform";
$username ="root";
$password = "";
if(isset($_GET)){

    $connection = new mysqli($serverName,$username,$password,$databaseName);

    if($connection->connect_errno){
        $databaseMessage = $connection->connect_error;
        $databaseConnectionStatus = "false";
        $httpCode = "500";
        $informationMessage="500 Internal Server Error";
    }else{
        $databaseMessage = $connection->connect_error;
        $databaseConnectionStatus = "true";
        $getQuery = "SELECT * FROM $tableName LIMIT $requestParam";
        $runGetQuery = $connection->query($getQuery);
        if($runGetQuery->num_rows > 0){ // data exists
            $informationMessage="Data Fetched Succefully";
            $httpCode = "200";
            while($row=$runGetQuery->fetch_assoc()){
                array_push($data,$row);
            }
        }else{
            $informationMessage="No Records";
            $httpCode="204";
        }

    }
}else{
    $informationMessage = "No Data";
    $requestData = "Wrong Path";
 $httpCode="203";
    $databaseConnectionStatus ="false";
    $databaseMessage ="Check the path";
}
$responseData->status_code = $httpCode;
$responseData->status = $databaseConnectionStatus;
$responseData->msg = $databaseMessage;
$responseData->info = $informationMessage;
$responseData->data = $data;


echo json_encode($responseData,JSON_PRETTY_PRINT);


?>