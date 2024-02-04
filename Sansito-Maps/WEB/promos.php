<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="modules/css/header1.css">
    <link rel="stylesheet" href="modules/css/cuenta.css">
    <link rel="stylesheet" href="modules/css/product.css">
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
            <script src="modules/js/script.js"></script>
            <script src="modules/js/category.js"></script>
    </div>
    <div class="product-container" style="margin-top: 100px;">
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "sansitooo");
    
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $mostrarDescuento = isset($_POST['descuento']) && $_POST['descuento'] === 'true';

    if (isset($_POST['orden'])) {
        $orden = $_POST['orden'];

        if ($orden === "recent") {
            $ordenSQL = "p.fecha_agregado DESC";
        } elseif ($orden === "rating") {
            $ordenSQL = "AVG(v.puntuacion) DESC";
        } else {
            $ordenSQL = "p.precio $orden";
        }
    } else {
        $ordenSQL = "p.fecha_agregado DESC";
    }

    $categoriaCondicion = "1";
    $descuentoCondicion = "";

    if ($mostrarDescuento) {
        $descuentoCondicion = "AND p.descuento > 0";
    }

    $sql = "SELECT p.`ID_producto`, p.`nombre_producto`, p.`imagen_producto`, p.`precio`, p.`categoria`, p.`descuento`, AVG(v.puntuacion) AS promedio_valoracion, COUNT(v.puntuacion) AS cantidad_valoraciones
            FROM productos p
            LEFT JOIN valoraciones v ON p.ID_producto = v.ID_producto
            WHERE $categoriaCondicion $descuentoCondicion
            GROUP BY p.ID_producto
            ORDER BY $ordenSQL";

    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    while ($f = mysqli_fetch_assoc($resultado)) {
        $precioNormalFormateado = number_format($f["precio"], 0, ',', '.');

        if (isset($f["descuento"])) {
            $descuento = $f["descuento"];
        } else {
            $descuento = 0; // O cualquier otro valor predeterminado
        }

        $precioConDescuento = $f["precio"] * (1 - ($descuento / 100));
        $precioConDescuentoFormateado = number_format($precioConDescuento, 0, ',', '.');

        echo '<div class="product">
            <div class="product-inner">
                <div class="product-image">
                    <a href="modules/product_details.php?productId=' . $f["ID_producto"] . '"><img src="' . $f["imagen_producto"] . '" alt="' . $f["nombre_producto"] . '"></a>
                </div>
                <h2 class="product-name">' . $f["nombre_producto"] . '</h2>
                <div class="product-rating">
                    <span class="stars">&#9733; ' . ($f["promedio_valoracion"] ? round($f["promedio_valoracion"], 1) : 'N/A') . '</span>
                    <span class="rating-count"><br>' . ($f["cantidad_valoraciones"] ?? 0) . ' valoraciones</span>
                </div>';

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
        echo '<p class="product-price"><span class="strike">Antes:</span> <span class="strike normal-price">$' . $precioNormalFormateado . ' COP</span></p>';
        
        if ($mostrarDescuento) {
            echo '<p class="product-price"><span class="discount-price">Ahora: $' . $precioConDescuentoFormateado . ' COP</span></p>';
        }
        
        echo '<p class="product-discount"><span class="discount-text">Descuento:</span> <span class="discount-value">' . $descuento . '%</span></p>';
        echo '<button class="product-buy">Comprar</button>
            <form action="modules/validar.php?option=4" method="post">
                <button name="productId" value="' . $f["ID_producto"] . '" type="submit" class="product-cart">Añadir al carrito</button>
            </form>
        </div>
    </div>';
    }
    $conexion->close();
    ?>
    </div>

    <?php
        include('modules/footer.php');
    ?>
</body>
</html>
  