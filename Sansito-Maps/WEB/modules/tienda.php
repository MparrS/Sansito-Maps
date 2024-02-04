<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/header1.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/tienda.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b414b30242.js" crossorigin="anonymous"></script>

<?php
    include_once('sql\conexion.php');
    include_once("sql/conexion.php");
    include("header.php");
    include("category.php");
    include("notification.php");

    $idVendedor = $_GET['ID_vendedor'];
    
    $queryUsers = mysqli_query($conn, "SELECT 
    ID_vendedor,
    img_empresa,
    nombre_empresa,	
    descripcion_empresa from vendedores where ID_vendedor = ".$idVendedor);


    $userActual = $queryUsers->fetch_assoc();

    $nameCompa = $userActual['nombre_empresa'];
    $imgCompa = $userActual['img_empresa'];
    $descripCompa = $userActual['descripcion_empresa'];

    if(isset($_GET['ID_vendedor'])){
        echo'
        <title>'.$nameCompa.'</title>
        </head>
        <body>
   
        <div class="main__container">
            <div class="container-info-tienda">
                <div class="info-tienda">
                    <div class="tienda-fotoName">
                        <div class="tienda-foto" >
                            <img id="tienda-foto" src="'.$imgCompa.'"></img>
                        </div>
                        <h2 id="tienda-name">'.$nameCompa.'</h2>
                    </div>
                        <p id="tienda-desc">'.$descripCompa.'</p>
                    </div>
                </div>
                <div class="container-productos">';
            }

            $queryProducts = mysqli_query($conn, "SELECT
            ID_producto, 
            nombre_producto,
            imagen_producto,	
            descripcion,
            descuento,
            precio from productos where ID_vendedor = ".$idVendedor);
    
            while ($productActual = $queryProducts->fetch_assoc()) {
                $idproducto = $productActual['ID_producto'];
                $nameProduct = $productActual['nombre_producto'];
                $imgProduct = $productActual['imagen_producto'];
                $descrProduct = $productActual['descripcion'];
                $precioProduct = $productActual['precio'];
                $precioFormateado = number_format($productActual["precio"], 0, ',', '.');
                $promedioQuery = $conn->query("SELECT FORMAT(AVG(puntuacion), 1) AS promedio_valoracion
                FROM valoraciones
                WHERE ID_producto = " . $productActual["ID_producto"]);

                if ($promedioQuery->num_rows ) {
                    $promedioRow = $promedioQuery->fetch_assoc();
                    if (isset($promedioRow['promedio_valoracion'])) {
                        $promedioValoracion = $promedioRow['promedio_valoracion'];
                    }
                    else {
                        $promedioValoracion = 'N/A';
                    }

                }

                echo'
                <div class="producto">
                    <div>
                        <div class="product-image">
                            <a href="/SANSITO-MAPS/modules/product_details.php?productId='.$productActual["ID_producto"].'"><img id="image__product" src="'.$imgProduct.'" width="200px" heigth="200px"></a>
                        </div>
                        <h2 class="product-name">'.$nameProduct.'</h2>
                        <div class="product-rating">
                            <span class="stars">&#9733; '.$promedioValoracion.'</span>
                        </div>';
                        if ($productActual["descuento"] > 0) {
                            $precioConDescuento = $productActual["precio"] * (1 - ($productActual["descuento"] / 100));
                            $precioConDescuentoFormateado = number_format($precioConDescuento, 0, ',', '.');
                            
                            echo '<p class="product-price">Precio: <span class="strike">$' . $precioFormateado . ' COP</span></p>';
                            echo '<p class="product-price discount-price">Ahora: <span class="discount-price">$' . $precioConDescuentoFormateado . ' COP</span></p>';
                            echo '<p class="product-discount discount-text">Descuento: <span class="discount-value">' . $productActual["descuento"] . '%</span></p>';
                        } else {
                            // Mostrar solo el precio normal para los productos sin descuento
                            echo '<p class="product-price">Precio: $' .$precioFormateado. ' COP</p>';
                        }
                        echo '<div class="producto-description">'.$descrProduct.'</div>
                    </div>
                </div>
                ';
            }
            echo'
            </div>
        </div>
        <script src="js/script.js"></script>
        <script src="js/category.js"></script>

        ';
        echo '<style>
            .strike {
                text-decoration: line-through;
            }
            
            .discount-price {
                color: green;
            }
            
            .discount-text {
                font-weight: bold;
                color: red;
            }
            
            .discount-value {
                font-weight: bold;
                color: red;
            }
        </style>';
        ?>
        <div class="product-container">

<?php
    include("footer.php");
?>
</body>
</html>