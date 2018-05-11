<?php
include("conexion.php");

$consulta = "SELECT * FROM user";

$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

echo "<table borde='2'>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>email</th>";
echo "</tr>";

while ($columna = mysqli_fetch_array( $resultado ))
{
	echo "<tr>";
	echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['email'] . "</td>";
	echo "</tr>";
}

echo "</table>";
?>