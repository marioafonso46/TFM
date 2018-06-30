<?php
// Conexion a la base de datos
include("dbConn.php");
include("user.php");
$name = $_FILES['imagen']['name'];
$extension = strtolower(substr($name, strpos($name, '.') + 1));
$tmp_name = $_FILES['imagen']['tmp_name'];
$type = $_FILES['imagen']['type'];
$size = $_FILES['imagen']['size'];
$max_size = 1074752;

if(isset($name)){

  if(!empty($name)){
  	
    if(($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png')&& ($type == 'image/jpeg' || $type == 'image/png') && $size <= $max_size){
		
	// Image submitted by form. Open it for reading (mode "r")
		$fp = fopen($_FILES['imagen']['tmp_name'], "r");
		
		// If successful, read from the file pointer using the size of the file (in bytes) as the length.
		if ($fp) {
			$content = fread($fp, $_FILES['imagen']['size']);
			fclose($fp);
		
			// Add slashes to the content so that it will escape special characters.
			// As pointed out, mysql_real_escape_string can be used here as well. Your choice.
			//$content = addslashes($content);
			$content= mysqli_real_escape_string($conexion, $content);
			$name= mysqli_real_escape_string($conexion, $name);
			// Insert into the table "table" for column "image" with our binary string of data ("content")
			mysqli_query($conexion,"INSERT INTO foto (email, url, likes, comentarios, binario, tipo) Values('hollywoodrose94@hotmail.com','null', 0, 0, '$content','$type')") or 
			die("Couldn't execute query in your database!".mysqli_error($conexion));
			
			echo 'Data-File was inserted into the database!|';
			echo '<a href="showImages.php">view</a>';
		}
		
    else{
      echo 'There was an error!';
    }
  }
  else{
    echo 'File must be jpg/jpeg and must be 73 kilobyte or less! ';
  }

}

  else {
  echo 'Please select a file!';

  }
}
?>