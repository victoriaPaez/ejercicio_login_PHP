<?php

class Conection{

    public function init(){
     
        $servername="localhost";
        $username="prueba";
        $password="prueba";
        $dbname="adsi";
        $port="3306";
      
        try {
            $base = new PDO("mysql:host=$servername;dbname=$dbname;port=$port",$username,$password);
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");
            return $base;
            
        }catch(PDOException $e){
            echo "connection failed: I'm Sorry".$e->getMessage();
        }finally{
            $base=null;
        }
  

    }
}
