<?php
include("dbConn.php");

$id = $_GET["id"];
$tipo = $_GET["tipo"];

$query = mysqli_query($conexion,"SELECT * FROM foto WHERE id=$id") or 
die("Couldn't execute query in your database!".mysqli_error($conexion));

while($row = mysqli_fetch_assoc($query)){
    $imageData = $row["binario"];
}

header("content-type: $tipo");
echo $imageData;
?>