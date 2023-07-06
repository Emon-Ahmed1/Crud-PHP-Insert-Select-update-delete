<?php
include 'connect.php';
if(isset($_GET['deleteid'])){

$id =$_GET['deleteid'];

$delete = "delete from `curd` where id=$id";
$result = mysqli_query($conn,$delete);
if($result){    
   header('location:display.php');
//echo'Deleted succesful';
        
}else{
    die(mysqli_error($conn));
}
} 


?>