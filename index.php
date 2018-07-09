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
    <div id="content">
        <div id="time-line">
            <?php

            include("timelineFunctions.php");

            if (isset($_SESSION["user"]))
            {
                $array_fotos = getUserTimeLine($conexion, $_SESSION["user"]);

                $i = 0;

                foreach($array_fotos as $foto)
                {
                    $user = get_user($foto->email, $conexion);
                    $comentario = getComments($conexion, $foto->id);
                    echo "<div class='post'>
                    <div class='post-cabecera'>
                        <div class='user-avatar'>
                            <img src='".$user->imagen."' alt='Avatar'>
                        </div>
                        <div class='user-name'><a href='http://localhost/perfil.php?email=".$user->email."'>".$user->nombre."</a></div>
                        <div class='user-level'>".$user->nivel."</div>
                    </div>
                    <div class='post-contenido'>
                        <img src='http://localhost/showImages.php?id=".$foto->id."&tipo=".$foto->tipo."' alt='Post'>
                    </div>
                    <div class='post-stats'>
                    <div class='post-likes'><input onClick=\"doLike(".$foto->id.", '".$_SESSION['user']->email."', ".$foto->likes.", ".$i.");\" type='image' src='Imagenes/not-like-negro.png' />
                    <p class='likes-number' id='likes-number".$i."'>".$foto->likes."</p></div>
                        <div class='post-comments'>
                            <p class='mensaje'><b><a href='www.google.com'>".$user->username."</a></b>".$comentario[0]."</p>
                            <textarea class='caja-comentario' id='comentario' name='comentarios' rows='5' cols='20'></textarea>
                            <input class='boton-enviar-comentario' onClick=\"sendComment(".$foto->id.", '".$_SESSION['user']->email."');\" type='image' src='Imagenes/send-button.png' />
                        </div>
                    </div>
                    </div>";

                    $i = $i+1;
                }
            }
            else{
                $array_fotos = getGlobalTimeLine($conexion);

                foreach($array_fotos as $foto)
                {
                    $user = get_user($foto->email, $conexion);
                    $comentario = getComments($conexion, $foto->id)[0];
                    echo "<div class='post'>
                    <div class='post-cabecera'>
                        <div class='user-avatar'>
                            <img src='".$user->imagen."' alt='Avatar'>
                        </div>
                        <div class='user-name'>".$user->nombre."</div>
                        <div class='user-level'>".$user->nivel."</div>
                    </div>
                    <div class='post-contenido'>
                        <img src='".$foto->url."' alt='Post'>
                    </div>
                    <div class='post-stats'>
                    <div class='post-likes'><input type='image' src='Imagenes/not-like-negro.png' />
                    <p class='likes-number' id='likes-number'>".$foto->likes."</p></div>
                        <div class='post-comments'>
                            <p class='mensaje'><b><a href='www.google.com'>".$user->username."</a></b>".$comentario."</p>
                            <textarea class='caja-comentario' name='comentarios' rows='5' cols='20'></textarea>
                            <input class='boton-enviar-comentario' type='image' src='Imagenes/send-button.png' />
                        </div>
                    </div>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>