<?php
include("dbConn.php");

class foto
{
    public $id = 0;
    public $email = "";
    public $url = "";
    public $likes = 0;
    public $comentarios = 0;
    
    public function add_like($conexion) 
    {
        $this->likes = $this->likes + 1;
        $consulta = "UPDATE foto SET likes = '".$this->likes."' WHERE email = '".$this->email."' AND id=".$this->id;

        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos5");
    }

    public function add_comment() 
    {
        $comentarios = $comentarios + 1;
        $consulta = "UPDATE foto SET comentarios = '".$comentarios."' WHERE email = '".$email."'";

        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos6");
    }
}
?>