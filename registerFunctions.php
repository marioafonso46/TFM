<?php
include("dbConn.php");

if($_POST){

    $date = $_POST["BirthYear"] . "-" . $_POST["BirthMonth"] . "-" . $_POST["BirthDay"];
    $date_now = date("Y-m-d");
    $pass = $_POST['password'];    
    $passHash = password_hash($pass, PASSWORD_BCRYPT);
    /*  En un futuro para comprobar la contraseña: password_verify($pass, $passHash) */
    
    $consulta = "INSERT INTO user (email, password, nombre, genero, username, telefono, seguidores, seguidos, nivel, experiencia, fecha_nacimiento, fecha_creacion, imagen, bloqueo, avisos, numero_publicaciones, invitaciones, likes_send, likes_recived) VALUES ('".$_POST['email']."', '".$passHash."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['username']."', '".$_POST['phone']."', 0, 0, 1, 0, '".$date."', '".$date_now."', 'Imagenes/Perfiles-demo/usuario-sin-foto.png', 0, 0, 0, 3, 0, 0)";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    echo "Felicidades por registrarte! <a href='index.html'>Volver a la pagina inicial<a>";
}
?>