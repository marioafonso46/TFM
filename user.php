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
    public $likes_send = 0;
    public $likes_recived = 1;
    
    public function commit_usuario($conexion) 
    {
        $consulta = "UPDATE user SET email = '".$this->email."', password = '".$this->password."',nombre = '".$this->nombre."',genero = ".$this->genero.",username = '".$this->username."',telefono = ".$this->telefono.",seguidores = ".$this->seguidores.",seguidos = ".$this->seguidos.",nivel = ".$this->nivel.",experiencia = ".$this->experiencia.",fecha_nacimiento = '".$this->fecha_nacimiento."',fecha_creacion = '".$this->fecha_creacion."',imagen = '".$this->imagen."',bloqueo = ".$this->bloqueo.",avisos = ".$this->avisos.",numero_publicaciones = ".$this->numero_publicaciones.",invitaciones = ".$this->invitaciones.", likes_send = ".$this->likes_send.", likes_recived = ".$this->likes_recived." WHERE email = '".$this->email."'";
        echo $this->email;
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos7");
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
    $user->likes_send = $columna['likes_send'];
    $user->likes_recived = $columna['likes_recived'];
    return $user;
}
?>