<?php 

$sName = "localhost";
$uName = "root";
$pass = "admin";
$db_name = "atw";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'success';
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}