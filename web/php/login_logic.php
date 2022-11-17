<?php
require 'conexion.php';
session_start();

$usuario = $_POST['user_name'];
$clave = $_POST['user_pass'];

$Q = "SELECT COUNT(*) as contar from usuarios where user_name = '$usuario' and user_pass = '$clave' ";
$consulta = mysqli_query($conexion,$Q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['user_name'] = $usuario;
    header("location: ../index.php");
}else{
    header("location: ./login.php?msg=error");

}
?> 