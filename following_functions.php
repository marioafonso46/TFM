<?php
include("dbConn.php");

function follow($seguidor, $seguido){
    $consulta = "INSERT INTO followers (seguidor, seguido) VALUES ($seguidor, $seguido)";

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos12");
}

function unfollow($seguidor, $seguido){
    $consulta = "DELETE FROM followers WHERE seguidor = $seguidor AND seguido = $seguido";

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos13");
}

function check_follow($seguidor, $seguido){
    $consulta = "SELECT * FROM followers WHERE seguidor = $seguidor AND seguido = $seguido";

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos14");

    if($resultado == null){
        return true;
    } else{
        return false;
    }
}
?>