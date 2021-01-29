<?php
// Server side scripting
//  SQL Commands, methods
// $ - sign similar var in js

// HTML Page on serve
// Form
// Form data to be displayed in PHP
$serverName ="localhost";
$databaseName ="batchfive";
$tableName = "mywebsiteform";
$username ="root";
$password = "";

$name = $_POST['name'];
$emailId = $_POST['emailID'];
$contactNumber = $_POST['contactNumber'];
$message = $_POST['message'];

$connection = new mysqli($serverName,$username,$password,$databaseName);

if($connection->connect_errno){
    echo "Connection Issue 500";
}else{
//    $insert = "INSERT INTO $tableName VALUES ('','$name','$contactNumber','$emailId','$message')";
//    if($connection->query($insert)){
       $get = "SELECT * FROM $tableName";
        $getQuery = $connection->query($get);
        if($getQuery->num_rows > 0){

            while($row = $getQuery->fetch_assoc()){
                ?>
                <b><?php echo $row['name']; ?></b> <br/>
                <b><?php echo $row['contactNumber']; ?></b> <br/>
                <b><?php echo $row['message']; ?></b> <br/> <hr/>



                <?php
            }
        }
//    }else{
       echo $connection->error;
//    }
}



// connecting be with db
// posting data to db

?>