<?php
   if(isset($_POST["id"])){
       include('connect.php');
       $sSQL= 'SET CHARACTER SET utf8'; 
       mysqli_query($con,$sSQL);
       $id = $_POST["id"];
       $query = "SELECT * FROM service WHERE ids = $id";
       $res = mysqli_query($con,$query);
       $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
       if(count($data) > 0){
          echo json_encode($data[0]["Price"]);
       }else{
         echo json_encode("false");
       }
       mysqli_free_result($res);
       mysqli_close($con);
   }
?>