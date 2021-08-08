<?php
session_start();

$varsesion =$_SESSION["email"];
if($varsesion ==null || $varsesion ==''){
echo"no tiene autorizacion";
die();
}
session_unset();
session_destroy();
header("Location:login.php");
?>