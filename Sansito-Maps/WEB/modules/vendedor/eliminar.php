<?php
include('../sql/conexion.php');

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $delete_query = "DELETE FROM productos WHERE ID_producto=$product_id";
    $conn->query($delete_query);
    header("Location: lista.php");
    exit();
}
?>
