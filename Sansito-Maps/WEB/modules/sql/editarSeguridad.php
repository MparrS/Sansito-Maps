<?php

    include_once('C:\xampp\htdocs\SANSITO-MAPS\modules\sql\conexion.php');

    $idUser = $_GET['id'];

    if (isset($_POST['passwSecu'])) {
        $passwUser = $_POST['passwSecu'];
    }

    if(isset($passwUser)){
        mysqli_query($conn, "UPDATE usuarios set contrasena='$passwUser' WHERE ID_usuario=$idUser");
    }

    header("Location: \SANSITO-MAPS");
    exit();
?>