<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="modules/css/header1.css">
    <link rel="stylesheet" href="modules/css/product.css">
    <link rel="stylesheet" href="modules/css/cuenta.css">
    <script src="https://kit.fontawesome.com/b414b30242.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <?php
            include('modules/sql/conexion.php');
            include('modules/header.php');
            include('modules/cuenta.php');
            include('modules/category.php');
            include('modules/notification.php');     
        ?>
            <script src="modules/js/category.js"></script>
            <script src="modules/js/script.js"></script>
    </div>
    <div class="product-container" style="margin-top: 100px;">
        <?php
        $categoria = $_POST['categoria'];
        $orden = $_POST['orden'];
        $categoriaEscapada = mysqli_real_escape_string($conn, $categoria);

        // Filtros ;)
        if ($orden === "recent") {
            $ordenSQL = "p.fecha_agregado DESC";
        } elseif ($orden === "rating") {
            $ordenSQL = "AVG(v.puntuacion) DESC";
        } else {
            $ordenSQL = "p.precio $orden";
        }

        // todas-category
        if ($categoria === "") {
            $categoriaCondicion = "1";
        } else {
            $categoriaCondicion = "p.categoria = '$categoriaEscapada'";
        }

        $sql = "SELECT p.`ID_producto`, p.`nombre_producto`, p.`imagen_producto`, p.`precio`, p.`descuento`, p.`categoria`, AVG(v.puntuacion) AS promedio_valoracion, COUNT(v.puntuacion) AS cantidad_valoraciones
                FROM productos p
                LEFT JOIN valoraciones v ON p.ID_producto = v.ID_producto
                WHERE $categoriaCondicion
                GROUP BY p.ID_producto
                ORDER BY $ordenSQL";
        $resultado = $conn->query($sql);

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


            while ($f = $resultado->fetch_assoc()) {
                $precioFormateado = number_format($f["precio"], 0, ',', '.');
                
                echo '<div class="product">
                    <div class="product-inner">
                        <div class="product-image">
                            <a href="modules/product_details.php?productId=' . $f["ID_producto"] . '"><img src="' . $f["imagen_producto"] . '" alt="' . $f["nombre_producto"] . '"></a>
                        </div>
                        <h2 class="product-name">' . $f["nombre_producto"] . '</h2>
                        <div class="product-rating">
                            <span class="stars">&#9733; ' . ($f["promedio_valoracion"] ? round($f["promedio_valoracion"], 1) : 'N/A') . '</span>
                            <span class="rating-count"><br>' . ($f["cantidad_valoraciones"] ?? 0) . ' valoracion(es)</span>
                        </div>';
                
                if ($f["descuento"] > 0) {
                    $precioConDescuento = $f["precio"] * (1 - ($f["descuento"] / 100));
                    $precioConDescuentoFormateado = number_format($precioConDescuento, 0, ',', '.');
                    
                    echo '<p class="product-price strike">Antes: <span class="strike">$' . $precioFormateado . ' COP</span></p>';
                    echo '<p class="product-price discount-price">Ahora: <span class="discount-price">$' . $precioConDescuentoFormateado . ' COP</span></p>';
                    echo '<p class="product-discount discount-text">Descuento: <span class="discount-value">' . $f["descuento"] . '%</span></p>';
                } else {
                    echo '<p class="product-price">Precio: $' . $precioFormateado . ' COP</p>';
                }
                
                echo '<button class="product-buy">Comprar</button>
                    <form action="modules/validar.php?option=4" method="post">
                        <button name="productId" value="' . $f["ID_producto"] . '" type="submit" class="product-cart">Añadir al carrito</button>
                    </form>';
                echo '      
                    </div>
                </div>';
            }

        $conn->close();
        ?>
    </div>

    <?php
        include('modules/footer.php');
    ?>
</body>
</html>
