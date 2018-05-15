<?php
include("dbConn.php");

class user
{
    public $email = "";
    public $password = "";
    public $nombre = "";
    public $genero = 0;
    public $username = "";
    public $telefono = 000000000;
    public $seguidores = 0;
    public $seguidos = 0;
    public $nivel = 0;
    public $experiencia = 0;
    public $fecha_nacimiento = "0000-0-0";
    public $fecha_creacion = "0000-0-0";
    public $imagen = "";
    public $bloqueo = 0;
    public $avisos = 0;
    public $numero_publicaciones = 0;
    public $invitaciones = 0;
    
    public function commit_usuario() 
    {
        $consulta = "UPDATE user SET email = '".$email."', password = '".$password."',nombre = '".$nombre."',genero = ".$genero.",username = '".$username."',telefono = ".$telefono.",seguidores = ".$seguidores.",seguidos = ".$seguidos.",nivel = ".$nivel.",experiencia = ".$experiencia.",fecha_nacimiento = '".$fecha_nacimiento."',fecha_creacion = '".$fecha_creacion."',imagen = '".$imagen."',bloqueo = ".$bloqueo.",avisos = ".$avisos.",numero_publicaciones = ".$numero_publicaciones.",invitaciones = ".$invitaciones."WHERE email = '".$email."'";
        
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    }
}

function get_user($user_email, $conexion) 
{
    $consulta = "SELECT * FROM user WHERE email ='".$user_email."'";
    
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    $columna = mysqli_fetch_array( $resultado );

    $user = new user();

    $user->email = $columna["email"];
    $user->password = $columna['password'];
    $user->nombre = $columna['nombre'];
    $user->genero = $columna['genero'];
    $user->username = $columna['username'];
    $user->telefono = $columna['telefono'];
    $user->seguidores = $columna['seguidores'];
    $user->seguidos = $columna['seguidos'];
    $user->experiencia = $columna['experiencia'];
    $user->fecha_nacimiento = $columna['fecha_nacimiento'];
    $user->fecha_creacion = $columna['fecha_creacion'];
    $user->imagen = $columna['imagen'];
    $user->bloqueo = $columna['bloqueo'];
    $user->avisos = $columna['avisos'];
    $user->numero_publicaciones = $columna['numero_publicaciones'];
    $user->invitaciones = $columna['invitaciones'];

    return $user;
}
?>