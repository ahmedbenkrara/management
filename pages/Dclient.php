<?php 

if($_POST['idc']){
    include('connect.php');

    $id = $_POST['idc'];
    $query = "DELETE FROM client WHERE idc = $id";
    if(mysqli_query($con,$query)){
        echo json_encode('true');
    }else{
        echo json_encode('false');
    }
    mysqli_close($con);
}

?>