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
            <div id="user-info">
                <div id="avatar">
                <?php echo "<img src='".$_SESSION["user"]->imagen."' alt='Logo web'>" ?>
                </div>
                <div id="stats">
                    <p><?php echo $_SESSION["user"]->nombre ?></p>
                    <table>
                        <tr>
                            <th>Seguidores</th>
                            <td><?php echo $_SESSION["user"]->seguidores ?></td> 
                            <th>Likes recividos</th>
                            <td><?php echo $_SESSION["user"]->likes_recived?></td>
                        </tr>
                        <tr>
                            <th>Seguidos</th>
                            <td><?php echo $_SESSION["user"]->seguidos ?></td> 
                            <th>Likes send</th>
                            <td><?php echo $_SESSION["user"]->likes_send?></td> 
                        </tr>
                        <tr>
                            <th>Nivel</th>
                            <td><?php echo $_SESSION["user"]->nivel ?></td> 
                            <th>Experiencia</th>
                            <td><?php echo $_SESSION["user"]->experiencia ?></td> 
                        </tr>
                    </table>
                </div>
                <div id="galeria">
                    <?php
                    include("timelineFunctions.php");
                    include("dbConn.php");

                    $array_fotos = getUserGallery($conexion, $_SESSION["user"]);

                    foreach($array_fotos as $foto)
                    {
                        echo "<img src='".$foto->url."' alt='foto-galeria'>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>