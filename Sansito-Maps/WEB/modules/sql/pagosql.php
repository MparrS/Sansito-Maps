<?php
    session_start();
    include_once('conexion.php');
    if (isset($_SESSION['cartCount'])) {
        $formapago = $_POST['forma_pago'];
        $estado = 1;
        $direccion = $_POST['direccion_entrega'];
        $user = $_SESSION['usuario'];

        for ($i = 0; $i < count($_SESSION['cartCount']); $i++) {
            $productId = $_SESSION['cartCount'][$i];
            $query = $conn->query("SELECT ID_vendedor FROM productos WHERE ID_producto= $productId");
            $vendedor = $query->fetch_assoc();
            mysqli_query($conn, "INSERT INTO pedidos(forma_pago, ID_usuario, ID_producto, ID_vendedor,estado_pedido,direccion_entrega) VALUES('$formapago', '$user', '$productId', ".$vendedor['ID_vendedor'].",'$estado', '$direccion')");
            $conn->query(" UPDATE `productos` SET `stock_disponible`=(`stock_disponible`- 1) WHERE ID_producto=$productId");
        }
        unset($_SESSION['cartCount']);
    }
    else if (isset($_POST['productId'])){
        $formapago = $_POST['forma_pago'];
        $estado = 1;
        $direccion = $_POST['direccion_entrega'];
        $user = $_SESSION['usuario'];
        $productId = $_POST['productId'];
        $query = $conn->query("SELECT ID_vendedor FROM productos WHERE ID_producto= $productId");
        $vendedor = $query->fetch_assoc();
        mysqli_query($conn, "INSERT INTO pedidos(forma_pago, ID_usuario, ID_vendedor, ID_producto,estado_pedido,direccion_entrega) VALUES('$formapago', '$user', ".$vendedor['ID_vendedor'].",'$productId','$estado', '$direccion')");
        $conn->query(" UPDATE `productos` SET `stock_disponible`=(`stock_disponible`- 1) WHERE ID_producto=$productId");
    }
    header("Location: /SANSITO-MAPS");
    exit();
?>