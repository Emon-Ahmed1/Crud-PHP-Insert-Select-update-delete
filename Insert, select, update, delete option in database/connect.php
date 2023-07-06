<?php
/*$dbhost = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "app";*/

//----create connetion-----

/*$conn =new mysqli('localhost','root','','app');

if(!$conn){
    echo "filed Connect";
}
else{
    die(mysqli_error($conn));
    
    }*/
    $conn = new mysqli('localhost','root','','app');

    // Check connection
    if ($conn -> connect_errno) {
      echo "Failed to connect to MySQL: " .$conn -> connect_error;
      exit();
    }

?>

