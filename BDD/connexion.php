<?php
$host="localhost";
$user="root";
$pass="";
$db="biblio";

try {
    $pdo=new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connexion Reusite !  ";
    //var_dump($pdo);
} catch (PDOException $e) {
    echo "erreur de connexion: ".$e->getMessage();
    $pdo=null;
}

