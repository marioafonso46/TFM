<div id="menu">
        <nav>
            <ul>
                <li><a title="Inicio" href="#"><img src="Imagenes/Logo-web.png" alt="Logo web"></a></li>
                <li><a title="Contacto" href="#">Contacto</a></li>
                <li><a title="Sobre nosotros" href="#">Sobre nosotros</a></li>
                <li><a title="Niveles" href="#">Niveles</a></li>
                <li><a title="Trabajo" href="#">Trabajo</a></li>
            </ul>

            <div>
                <form action="almacenar.php" method="POST" enctype="multipart/form-data">
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" id="imagen" />
                    <input type="submit" name="subir" value="Subir Imagen"/>
                </form>
            </div>
            <?php
                include("user.php");
                session_start();

                if (isset($_SESSION["user"]))
                {
                    echo "";
                    echo "<form id='login-form' action='logOut.php'>
                            <a href='perfil.php'>Bienvenido ".$_SESSION["user"]->nombre."</a>
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