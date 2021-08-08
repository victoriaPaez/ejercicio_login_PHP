<?php

require_once("Person.php");
require_once('Conection.php');

if(isset($_REQUEST["enviar"])){
    session_start();
    error_reporting(0);
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
 
    $person=new Person($email,$password);  //instanciar y llamar al objeto person aca se compara con la bd
    $a=$person->getAccess();
    $b=$person->getByPassword($password).$registro['pasword'];
    $c=$person->getAccessP();


    if(($password ==null || $password=='')|| ($email ==null || $email=='')){  
        $msg="Digte el correo y la clave por favor";
        $apathOrigin=explode('?', $_SERVER['HTTP_REFERER']);
        $pathOrigin=$apathOrigin[0];
        header("Location:$pathOrigin?msg=$msg");
        die();

     }

     else{ 
         if($email===$a and $password===$b){
             //creamos sesion
             
             $_SESSION["email"]=$email;
             $_SESSION["password"]=$password;
             $_SESSION["id"]=random_int(1,1000);
             echo "<br>";
             echo "<br>";
             echo"<h1> bienvenido iniciaste sesion: </h1>";
             echo "<br>";
             echo "tus datos de usuario son: ";
             echo "<br>";
             echo "Correo Electronico: ".$a;
             echo "<br>";
             echo "Clave de Usuario ".$c;
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<a href='cerrar.php'>cerrar Sesion</a>"; 
         }
         else {

             $msg="Usuario y contraseña incorrectos ";
             $apathOrigin=explode('?', $_SERVER['HTTP_REFERER']);
             $pathOrigin=$apathOrigin[0];
             header("Location:$pathOrigin?msg=$msg");
         }
     }
}

?>
