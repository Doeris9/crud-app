<?php $connection = new PDO(); ?>

require "config.php";

try{
$connection = new PDO("mysql:host=localhost", $username, $password, $options);
$sql = file_get_contents("public/data/init.sql");
$connection->exec($sql);
    

Echo "db setup";
}catch(PDOException $error){
    echo $sql . "<br>". $error->getMessage();
}

