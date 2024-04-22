<?php

   if(isset($_POST["id"])){
       
       include('connect.php');
       $id = $_POST["id"];
       $query = "DELETE FROM service WHERE ids = $id";
       if(mysqli_query($con,$query)){
           echo json_encode("true");
       }else{
           echo json_encode("false");
       }
   }

?>