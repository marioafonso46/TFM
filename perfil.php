<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Sharegress</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="Estilos/estilos.css" />
<link rel="shortcut icon" href="Imagenes/favicon.png" />
<link rel="alternate" title="Pozolería RSS" type="application/rss+xml" href="/feed.rss" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="JavaScript/functions.js"></script>
</head>
 
<body>
    <?php include("menu.php") ?>
    <?php include("following_functions.php") ?>
    <div id="content">
        <div id="time-line">
            <div id="user-info">
                <div id="avatar">
                <?php 
                //include("user.php");
                include("dbConn.php");

                $user_email = $_GET["email"];

                $user = get_user($user_email, $conexion);

                echo "<img src='".$user->imagen."' alt='Logo web'>" ?>
                </div>
                <div id="stats">
                    <p><?php echo $user->nombre ?></p>
                    <form method='POST' id='following-form' action='follow.php'>
                        <input type="hidden" id="seguidor" name="seguidor" value=<?php echo $_SESSION["user"]->email ?>>
                        <input type="hidden" id="seguido" name="seguido" value=<?php echo $user->email ?>>
                        <input type='submit' value='Seguir' />
                    </form>
                    <table>
                        <tr>
                            <th>Seguidores</th>
                            <td><?php echo $user->seguidores ?></td> 
                            <th>Likes recividos</th>
                            <td><?php echo $user->likes_recived?></td>
                        </tr>
                        <tr>
                            <th>Seguidos</th>
                            <td><?php echo $user->seguidos ?></td> 
                            <th>Likes send</th>
                            <td><?php echo $user->likes_send?></td> 
                        </tr>
                        <tr>
                            <th>Nivel</th>
                            <td><?php echo $user->nivel ?></td> 
                            <th>Experiencia</th>
                            <td><?php echo $user->experiencia ?></td> 
                        </tr>
                    </table>
                </div>
                <div id="galeria">
                    <?php
                    include("timelineFunctions.php");
                    include("dbConn.php");

                    $array_fotos = getUserGallery($conexion, $user);

                    foreach($array_fotos as $foto)
                    {
                        echo "<img src='http://localhost/showImages.php?id=".$foto->id."&tipo=".$foto->tipo."' alt='foto-galeria'>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>