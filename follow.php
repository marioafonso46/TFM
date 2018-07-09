<?php
include("dbConn.php");
include("user.php");

$seguidor = $_POST['seguidor'];
$seguido = $_POST['seguido'];

echo $seguidor." ".$seguido;
$seguido1 = get_user($seguidor, $conexion);
$seguidor2 = get_user($seguido, $conexion);

$seguido1->seguidos = $seguido1->seguidos + 1;
echo $seguido1->seguidos;
$seguidor2->seguidores = $seguidor2->seguidores + 1;
echo $seguidor2->seguidores;

$seguido1->commit_usuario($conexion);
$seguidor2->commit_usuario($conexion);

$consulta = "INSERT INTO followers (seguidor, seguido) VALUES ('$seguidor', '$seguido')";
echo $consulta;
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos12");

echo "Has seguido correctamente a $seguido <a href='index.php'>Volver</a>"

?>