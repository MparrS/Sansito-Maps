<?php
include_once('sql/conexion.php');

$option = $_GET['option'];

switch($option) {
    case 1: // Verificación Login
        $mail = $_POST['logMail'];
        $password = $_POST['logContraseña'];

        $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '".$mail."'");

        $user = $consulta->fetch_assoc();

        if ($mail == $user['correo']) {
            if ($password == $user['contrasena']) {
                session_start();
                if ($user['tipo_usuario'] == 2) {
                    $_SESSION['admin'] = 1;
                }
                else if ($user['tipo_usuario'] == 1) {
                    $_SESSION['vendedor'] = 1;
                }
                else {
                    $_SESSION['justUser'] =  1;
                }
                $_SESSION['usuario'] =  $user['ID_usuario'];
                header("Location: /SANSITO-MAPS");
                exit();
            }
            else {
                header("Location: /SANSITO-MAPS/?notification=3");
                exit();
            }
        }
        else {
            header("Location: /SANSITO-MAPS/?notification=2");
            exit();
        }
    break;
    case 2: // Verificación Registro
        $nombre = $_POST['regNombre'];
        $apellido = $_POST['regApellido'];
        $numero = $_POST['regContacto'];
        $mail = $_POST['regCorreo'];
        $contra = $_POST['regContraseña'];
        $contra1 = $_POST['regConfirmContraseña'];

        if ($contra == $contra1) {
            $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `contacto`, `correo`, `contrasena`) VALUES ('$nombre','$apellido',$numero,'$mail','$contra')";
            mysqli_query($conn, $query);
            $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '".$mail."'");

            $user = $consulta->fetch_assoc();
            session_start();
            $_SESSION['usuario'] =  $user['ID_usuario'];
            $_SESSION['justUser'] = 1;
            header("Location: /SANSITO-MAPS");
            exit();
        }
        else {
            header("Location: /SANSITO-MAPS?notification=5");
        }
    break;
    case 3: //Cerrar sesión
        session_start();
        session_destroy();
        header("Location: /SANSITO-MAPS");
        exit();
    break;
    case 4: // Agregar producto a carrito
        session_start();
        if (isset($_SESSION['usuario'])) {
            $productId = $_POST['productId'];
            if (!isset($_SESSION['cartCount'])) {
                $_SESSION['cartCount'] = array($productId);
            }
            else {
                $_SESSION['cartCount'][] = $productId;
            }
            header("Location: /SANSITO-MAPS/?notification=1");
            exit();
        }
        else {
            session_destroy();
            header("Location: /SANSITO-MAPS/?notification=4");
            exit();
        }
    break;
    case 5: //Eliminar producto del carrito
        session_start();
        $productId = $_POST['productId'];
        $datos = $_SESSION['cartCount'];
        $posicion = array_search($productId, $datos);
        if ($posicion !== false) {
            unset($datos[$posicion]);
            $datos = array_values($datos);
            $_SESSION['cartCount'] = $datos;
            if (empty($_SESSION['cartCount'])) {
                unset($_SESSION['cartCount']);
                header("Location: /SANSITO-MAPS");
                exit();
            }
            else {
                header("Location: /SANSITO-MAPS/modules/cart.php");
                exit();
            }
        }
    break;
    case 6: // Verificación Registro Admin
        $usuario = $_POST['username'];
        $token = '3a7Fb9E1pR6XvKtY';
        $tokenIngresado = $_POST['token'];
        $mail = $_POST['email'];
        $password = $_POST['password'];

        if ($token == $tokenIngresado) {
            $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `contacto`, `correo`, `contrasena`, `tipo_usuario`) VALUES ('$usuario','', 6666666,'$mail','$password', '2')";
            mysqli_query($conn, $query);
            $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '".$mail."'");

            $user = $consulta->fetch_assoc();
            session_start();
            $_SESSION['usuario'] =  $user['ID_usuario'];
            $_SESSION['admin'] = 1;
            header("Location: /SANSITO-MAPS");
            exit();
        }
        else {
            echo 'Token incorrecto. <a href="/SANSITO-MAPS">Volver</a>'; 
        }
    break;
}

?>