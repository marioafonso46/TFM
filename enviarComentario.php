<?php 
include("dbConn.php");
include("foto.php");
include("user.php");

session_start();

$consulta = "INSERT INTO comentarios (id_imagen, email, comentario) VALUES (".$_POST["foto_id"].", '".$_POST["email"]."', '".$_POST["comentario"]."')";

$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos8");
?>