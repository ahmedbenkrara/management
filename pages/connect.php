<?php 

$server = 'localhost';
$user = 'mery';
$password = 'mery123456';
$database = 'nsai';

$con = mysqli_connect($server,$user,$password,$database);
if(!$con){
    echo 'Connection error : '. mysqli_connect_error();
}

?>