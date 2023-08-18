<?php
//connection php file
//include ('edit.php');
include ('function.php');
$objcrudadmin = new curdApp();

if(isset($_POST['add_info'])){
  $return_msg = $objcrudadmin->add_data($_POST);

  $display = $objcrudadmin ->display_data();
 } 
   $display = $objcrudadmin ->display_data();
   //delete data
   if(isset($_GET['status'])){
    if($_GET['status']='delete'){
      $delete_id=$_GET['id'];
    
     // $objcrudadmin->delete_data($delete_id);
      $delmsg=$objcrudadmin->delete_data($delete_id);
    }
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
        <?php if(isset($delmsg)){echo $delmsg;} ?>

        <form class="form" action="" method="post" enctype="multipart/form-data">
  <?php if (isset($return_msg)){ echo $return_msg; } ?>
            
            <input class="form-control mb-4" type="text" name="std_name" placeholder="Enter Name">
            <input class="form-control mb-4" type="number" name="std_roll" placeholder="Enter Roll">
            <label for="image"> Upload Your Image </label>
            <input class="form-control mb-2" type="file" name="std_img">
            <button type="submit" name="add_info"class="form-control bg-warning ">Add Information</button><br>
            
        </form>
    </div>
    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th> SL </th>
                    <th> Name </th>
                    <th> Roll </th>
                    <th> Image </th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>
                <?php
                  //$student=mysqli_fetch_assoc($display);
                 while($student=mysqli_fetch_assoc($display)){ 
                    
                    
                ?>
               
                <tr>
                    <td> <?php echo $student['id'] ?> </td>
                    <td> <?php echo $student['std_name'] ?> </td>
                    <td> <?php echo $student['std_roll'] ?> </td>
                    <td> <img style=" height:100px;" src="upload/<?php echo $student['std_img'] ?>" /> </td>
                    <td> 
                        <a class="btn btn-success" href="edit.php? status=edit&&id=<?php echo $student['id'] ?>"> Edit </a>
                        <a class="btn btn-warning" href="?status=delete&&id=<?php echo $student['id'] ?>"> Delete </a>
                        
                    </td>
                </tr>
                <?php } ?>


            </tbody>


        </table>


    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>