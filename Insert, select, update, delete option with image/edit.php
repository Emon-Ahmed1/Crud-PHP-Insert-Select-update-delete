<?php
//include ('Index.php');
include ('function.php');
$objcrudadmin = new curdApp;
$display = $objcrudadmin ->display_data();

if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $return_data=$objcrudadmin ->display_data_by_edit($id);

    }
}
if(isset($_POST['update_info'])){
  $msg=$objcrudadmin->update_data($_POST);
  

}


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Project php</title>
  </head>
  <body>
    <div class="container my-4 p4 shadow">
        <h2><a style="text-decoration:none;" href="Index.php"> Student Database </a></h2>
        <form class="form" action="" method="post" enctype="multipart/form-data">
  
           <?php if(isset($msg)){ echo $msg; } ?>
            
            <input class="form-control mb-4" type="text" name="User_std_name" value="<?php echo $return_data['std_name']; ?>">
            <input class="form-control mb-4" type="number" name="User_std_roll" value="<?php echo $return_data['std_roll']; ?>" >            
            <label for="image"> Upload Your Image </label>
            <input class="form-control mb-2" type="file" name="User_std_img">

            <input type="hidden" name="User_std_id" value="<?php echo $return_data['id']; ?>">
            <button type="submit" name="update_info"class="form-control bg-warning ">Update Information</button><br>
            
        </form>
    </div>
  </body>
</html>