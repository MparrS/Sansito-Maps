<?php
include('../../sql/conexion.php');

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $delete_query = "DELETE FROM usuarios WHERE ID_usuario=$user_id ";
    mysqli_query($conn, $delete_query);
    header("Location: lista.php");
}
?>
