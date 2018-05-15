<?php

include("dbConn.php");
include("foto.php");

    $consulta = "SELECT * FROM foto WHERE id=".$_POST["foto_id"];

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos1");

    $columna = mysqli_fetch_array( $resultado );

    $foto = new foto();

    $foto->id = $columna["id"];
    $foto->email = $columna["email"];
    $foto->url = $columna["url"];
    $foto->likes = $columna["likes"];
    $foto->comentarios = $columna["comentarios"];
    //Contador de likes en la tabla foto
    $foto->add_like($conexion);

    //Relacion de likes en la tabla like

    $consulta = "INSERT INTO likes (id_imagen, email) VALUES (".$_POST["foto_id"].", '".$_POST["id_user"]."')";

    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos2");

    // 200 == todo ha ido bien
    return 200;

    ?>