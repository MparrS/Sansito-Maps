<?php
    include ('conexion.php');
    session_start();
    $nombreTienda = $_POST['nomTienda'];
    $imgTienda = $_POST['imgTienda'];
    $descripTienda = $_POST['descTienda'];
    $idUser = $_SESSION['usuario'];

    $query = "INSERT INTO `vendedores`(`ID_vendedor`, `nombre_empresa`, `img_empresa`, `descripcion_empresa`) VALUES ($idUser,'$nombreTienda','$imgTienda','$descripTienda');";
    $conn->query($query);
    $query = "UPDATE `usuarios` SET `tipo_usuario`=1 WHERE ID_usuario=$idUser";
    $conn->query($query);
    header("Location: /SANSITO-MAPS");
    $_SESSION['vendedor'] = 1;
    unset($_SESSION['justUser']);
    exit();
?>