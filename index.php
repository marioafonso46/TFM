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
    <div id="menu">
        <nav>
            <ul>
                <li><a title="Inicio" href="#"><img src="Imagenes/Logo-web.png" alt="Logo web"></a></li>
                <li><a title="Contacto" href="#">Contacto</a></li>
                <li><a title="Sobre nosotros" href="#">Sobre nosotros</a></li>
                <li><a title="Niveles" href="#">Niveles</a></li>
                <li><a title="Trabajo" href="#">Trabajo</a></li>
            </ul>
            <?php
            include("user.php");
            session_start();

            if (isset($_SESSION["user"]))
            {
                echo "";
                echo "<form id='login-form' action='logOut.php'>
                        <label>Bienvenido ".$_SESSION["user"]->nombre."</label>
                        <input type='submit' value='Salir' />
                    </form>";
            }else
            {
                echo "<form id='login-form' action='loginFunctions.php' method='POST'>
                <label>Usuario</label>
                <input type='text' name='usuario' id='usuario'>
                <label>Contraseña</label>
                <input type='password' name='password' id='password'>
                <input type='submit' value='Entrar'>
                </form>";
            }
            ?>
        </nav>
    </div>
    <div id="content">
        <div id="time-line">
            <?php

            include("timelineFunctions.php");

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
                    <div class='post-likes'><input onClick=\"doLike(".$foto->id.", '".$_SESSION['user']->email."', ".$foto->likes.");\" type='image' src='Imagenes/not-like-negro.png' /><p class='likes-number' id='likes-number'>".$foto->likes."</p></div>
                    <div class='post-comments'>
                        <p class='mensaje'><b><a href='www.google.com'>".$user->username."</a></b>".$comentario."</p>
                        <textarea class='caja-comentario' name='comentarios' rows='5' cols='20'></textarea>
                        <input class='boton-enviar-comentario' type='image' src='Imagenes/send-button.png' />
                    </div>
                </div>
                </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>