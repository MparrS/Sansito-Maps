<?php
include_once('conexion.php');

session_start();

$valoracion = $_POST['rating'];
$idProducto = $_POST['idProducto'];
$comentario = $_POST['comentario'];

if(isset($_SESSION['usuario'])) {
    mysqli_query($conn, "INSERT INTO valoraciones(ID_usuario,ID_producto,comentario,puntuacion) VALUES ('".$_SESSION['usuario']."','$idProducto','$comentario','$valoracion')");
}

else {
    session_destroy();
}


header('Location: /SANSITO-MAPS/modules/product_details.php?productId='.$idProducto);
exit();
?>