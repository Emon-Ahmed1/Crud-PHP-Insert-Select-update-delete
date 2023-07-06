<?php 
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>display</title>
</head>
<body>
    <div class="container">
        <button class=" btn btn-primary my-5"><a href="index.php" class="text-light" style="text-decoration:none;">Add Student</a></button>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select *  from `curd`";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row= mysqli_fetch_assoc($result)){
            $id          = $row['id'];
            $Name        = $row['NAMES'];
            $Email       = $row['email'];
            $Mobile      = $row['mobile'];
            $Password    = $row['password'];

        echo '
        <tr>
            <td > '.$id.' </td>
            <td>'.$Name.'</td>
            <td>'.$Email.'</td>
            <td>'.$Mobile .'</td>
            <td> '. $Password.' </td>
            <td>
                <button class=" btn btn-success "><a href="update.php? updateid='.$id.'" style="text-decoration:none;" class="text-light"> Update</a> </button>

                <button class=" btn btn-danger"><a href="delete.php? deleteid='.$id.'" style="text-decoration:none;" class="text-light"> Delete </a> </button>

            </td>
        </tr>';

        }
    }




    ?>


    <!--<tr>
      <th scope="row">1</th>
        <td>PHP</td>
        <td>php@gmail.com</td>
        <td>01788-568911</td>
        <td> 12344 </td>
        <td>
            <button class=" btn btn-success mr-1 "> Edit </button>
            <button class=" btn btn-warning"> Delete </button>

        </td>
-->
  </tbody>
</table>


    </div>
    
</body>
</html>