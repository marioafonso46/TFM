<?php
include("dbConn.php");
include("user.php");

if($_POST)
{
    $user = get_user($_POST["usuario"], $conexion);

    if(password_verify($_POST["password"], $user->password))
    {
        session_start();

        $_SESSION['user'] = $user;

        echo "<a href='index.php'>volver</a>";

    }else
    {
        echo "Fallo en la consulta";
    }
}
?>