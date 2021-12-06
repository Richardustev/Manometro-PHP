<?php
$mysqli = mysqli_connect("localhost", "root", "", "web-manometro");

try{
    $pdo = new PDO('mysql:host=localhost; dbname=web-manometro', 'root', '');
    
} catch(PDOException $e){
    echo 'Error: ' . $e->getMessage() ;
}
?>