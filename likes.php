<?php

include("dbConn.php");
include("foto.php");
include("user.php");
session_start();

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
    //Actualizamos el usuario que da like

    $_SESSION["user"]->likes_send = $_SESSION["user"]->likes_send + 1;
    $_SESSION["user"]->experiencia = $_SESSION["user"]->experiencia + 10;
    $_SESSION["user"]->commit_usuario($conexion);

    //Actualizamos el usuario que recive like

    $user_reciver = get_user($foto->email, $conexion);
    $user_reciver->likes_recived = $user_reciver->likes_recived + 1;
    $user_reciver->experiencia = $user_reciver->experiencia + 100;
    $user_reciver->commit_usuario($conexion);
    // 200 == todo ha ido bien
    return 200;

    ?>