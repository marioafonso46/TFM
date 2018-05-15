<?php

include("foto.php");

function getGlobalTimeLine($conexion)
{
    $consulta = "SELECT * FROM foto LIMIT 10";

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos3");

    $array_foto = array();

    $i = 0;
    while($columna = mysqli_fetch_array( $resultado ))
    {
        $foto = new foto();

        $foto->id = $columna["id"];
        $foto->email = $columna["email"];
        $foto->url = $columna["url"];
        $foto->likes = $columna["likes"];
        $foto->comentarios = $columna["comentarios"];

        $array_foto[$i] = $foto;
        $i = $i+1;
    }
 
    return $array_foto;
}

function getComments($conexion, $id_foto)
{
    $consulta = "SELECT * FROM comentarios WHERE id_imagen=".$id_foto;

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos4");

    $array_comentarios = array();

    $i = 0;
    while($columna = mysqli_fetch_array( $resultado ))
    {
        $comentario = $columna["comentario"];

        $array_comentarios[$i] = $comentario;
        $i = $i+1;
    }

    return $array_comentarios;
}

?>