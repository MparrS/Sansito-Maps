<?php
    include_once('conexion.php');

    $NombreProducto = $_POST['NomProducto'];

    // Imagen

    $dir = "../img/";
    $dirSQL = "/SANSITO-MAPS/modules/img/";
    $idImg = uniqid();
    $extension = pathinfo($_FILES['FotoProducto']['name'], PATHINFO_EXTENSION);
    $fileDir = $dir . $idImg . '.' .$extension;
    $imgFile = $dir . basename($_FILES['FotoProducto']['name']);
    $resultado = move_uploaded_file($_FILES['FotoProducto']['tmp_name'], $fileDir);
    $ImagenProducto = $dirSQL . $idImg . '.' . $extension;
    

    // —————————————————————————————————

    $Descripcion = $_POST['descripcionProducto'];
    $Precio = $_POST['PrecioProducto'];
    $Categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $Descuento = $_POST['descuento'];
    if (isset($_GET['idVendedor'])) {
        $idVendedor = $_GET['idVendedor'];
        $sql = "INSERT INTO productos(nombre_producto,ID_vendedor,imagen_producto,descripcion,precio,stock_disponible,descuento,categoria) VALUES('$NombreProducto','$idVendedor','$ImagenProducto','$Descripcion','$Precio','$stock','$Descuento','$Categoria')";
        mysqli_query($conn, $sql);
        if ($resultado) {
            header("Location: /SANSITO-MAPS/modules/vProductos.php?notification=6&title=Exito&text=Producto añadido con exito");
            exit();
        }
        else {
            echo $_FILES['FotoProducto']['error'];
            if (is_writable($dir)) {
                echo "La carpeta tiene permisos de escritura.";
            } else {
                echo "La carpeta no tiene permisos de escritura.";
            }
        }
    }
    else {
        $sql = "INSERT INTO productos(nombre_producto,imagen_producto,descripcion,precio,stock_disponible,descuento,categoria) VALUES('$NombreProducto','$ImagenProducto','$Descripcion','$Precio','$stock','$Descuento','$Categoria')";
        mysqli_query($conn, $sql);
        if ($resultado) { 
            header("Location: ../admin/producto/agregar.php");
            exit();
        }
        else {
            echo $_FILES['FotoProducto']['error'];
            if (is_writable($dir)) {
                echo "La carpeta tiene permisos de escritura.";
            } else {
                echo "La carpeta no tiene permisos de escritura.";
            }
        }
    }
    
?>