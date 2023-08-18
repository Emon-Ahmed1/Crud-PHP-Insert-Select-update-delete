<?php
//include('Index.php');
//include('edit.php');

class curdApp{
    private $conn;

    public function __construct()
    {
        //database information
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'curdapp';

        $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

      if (!$this->conn ) {
          die( "database connect error");
        }

       
    }
 //Send data
public function add_data($data){
    $std_name = $data['std_name'];
    $std_roll = $data['std_roll'];
    $std_img = $_FILES['std_img']['name'];
    $tmp_name = $_FILES['std_img']['tmp_name'];
   
     $query = "INSERT INTO `students`(std_name, std_roll, std_img ) VALUE ( '$std_name', $std_roll,'$std_img')";
      //send database information
     $result = mysqli_query( $this->conn ,$query);
     if($result){
        move_uploaded_file($tmp_name,'upload/'.$std_img);
        return('Information Added Successfully');
     }
    }
    //display data
    public function display_data(){
        $query = "SELECT * FROM `students`";
        $result = mysqli_query($this->conn, $query);
        if($result){
            $return_data =  $result;
            return $return_data;
        } ;
    } 
    //edit data
    public function display_data_by_edit($id){
        $query = "SELECT * FROM `students` WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
         $retrunData = mysqli_query($this->conn, $query);
         $studentData = mysqli_fetch_assoc($retrunData);
         return $studentData;

        }
       /* $result = mysqli_query($this->conn, $query);
        if($result){
            $return_data =  $result;
            $student_data = mysqli_fetch_assoc($return_data);
            return $student_data;
        } ; */
    }
    //Update information Database
    public function update_data($data){
        $std_name = $data['User_std_name'];
        $std_roll = $data['User_std_roll'];
        $std_id = $data['User_std_id'];
        $std_img =$_FILES['User_std_img']['name'];
        $tmp_name =$_FILES['User_std_img']['tmp_name'];
        
       $query ="UPDATE `students` SET std_name='$std_name', std_roll=$std_roll, std_img='$std_img' WHERE id=$std_id";

        if(mysqli_query($this->conn,$query)){

            move_uploaded_file($tmp_name,'upload/'.$std_img);
            return "Information Updated Successfully!";
        }
    }
    //delete data
    public function delete_data($id){
        $catch_img="SELECT * FROM `students` WHERE id=$id";
        $delete_Std_Info = mysqli_query($this->conn, $catch_img);
        $std_info_delete= mysqli_fetch_assoc($delete_Std_Info);
        $std_img_delete = $std_info_delete['std_img'];

        $query = "DELETE FROM `students` WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            unlink('upload/'.$std_img_delete);
            return("Deleted Successfully"); 
        }
       /* $catch_img = " SELECT * FROM `students` WHERE id=$id ";
        $delete_std_info = mysqli_query($this->conn, $catch_img);
        $std_info_delete = mysqli_fetch_assoc($delete_std_info);
        $delete_img_data = $std_info_delete['std_img'];
        $query = "DELETE FROM students WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            unlink('upload/'.$delete_img_data);
            return "Deleted Succesfully";
        }*/

    }
}







?>