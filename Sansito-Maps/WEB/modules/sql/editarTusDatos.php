<?php


    include_once('C:\xampp\htdocs\SANSITO-MAPS\modules\sql\conexion.php');

    $idUser = $_GET['id'];
    $option = $_GET['option'];

    switch ($option) {
        case 1: // Nombre y apellido.
            $apeUser = $_POST['apeUser'];
            $nameUser = $_POST['nameUser'];
            $sql = "UPDATE usuarios set nombre='$nameUser' WHERE ID_usuario=$idUser";
            mysqli_query($conn, $sql);
            echo $sql;
            mysqli_query($conn, "UPDATE usuarios set apellido='$apeUser' WHERE ID_usuario=$idUser");
            header("Location: \SANSITO-MAPS");
        exit();
        break;
        case 2: // Numero
            $numCont = $_POST['numContactTusDatos'];
            mysqli_query($conn, "UPDATE usuarios set contacto='$numCont' WHERE ID_usuario=$idUser");
            header("Location: \SANSITO-MAPS");
        exit();
        break;
        case 3: //Email
            $email = $_POST['emailTusDatos'];
            mysqli_query($conn, "UPDATE usuarios set correo='$email' WHERE ID_usuario=$idUser");
            header("Location: \SANSITO-MAPS");
        exit();
        break;
    }
?>