<?php

//importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//crear un email y paswword
$email = "correo@correo.com";
$password = "123456";


$passwordHash = password_hash($password, PASSWORD_BCRYPT);
//Query para crear usuario

$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

//Agragarlo a la base de datos

mysqli_query($db, $query);