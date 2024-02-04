<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/cuenta.css">
    <link rel="stylesheet" href="css/pDetails.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b414b30242.js" crossorigin="anonymous"></script>
    <title>SANSITO-MAPS</title>
</head>
<body>
    <div>
            <?php
                include_once('sql/conexion.php');
                include('header.php');
                include('cuenta.php');
                include('category.php');
                include('pago.php');
                $productId = $_GET['productId'];
                $sql = "SELECT `nombre_producto`, `imagen_producto`, `descripcion`, `precio`, `stock_disponible`, `descuento` FROM productos WHERE ID_producto=".$productId;
                $result = $conn->query($sql);
                $comentario = "SELECT `ID_usuario`, `comentario`, `puntuacion` FROM valoraciones WHERE ID_producto=".$productId;
                $resulta = $conn->query($comentario);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div style="padding-top: 100px;">
                <div id="product__container">
                    <div id="product__images">
                        <div class="image__container">
                            <img id="product__image1" onclick="changeImg(`'. $row["imagen_producto"] .'`)" class="product__image" src="'. $row["imagen_producto"] .'" width="80" height="80">
                            <div class="overlay"></div>
                        </div>
                        <div class="image__container">
                            <img id="product__image2" onclick="changeImg(`'. $row["imagen_producto"] .'`)" class="product__image" src="'. $row["imagen_producto"] .'" width="80" height="80">
                            <div class="overlay"></div>
                        </div>
                        <div class="image__container">
                            <img id="product__image3" onclick="changeImg(`'. $row["imagen_producto"] .'`)" class="product__image" src="'. $row["imagen_producto"] .'" width="80" height="80">
                            <div class="overlay"></div>
                        </div>
                        <img id="product__mainImage" class="product__mainImage" src="'. $row["imagen_producto"] .'" width="400" height="400">
                    </div>          
                    <div id="product__attributes">
                        <h2 id="product__name">'. $row["nombre_producto"] .'</h2>
                        <div class="rating clearfix">
                        <form action="sql/valoracionsql.php?idUser='.$_SESSION['usuario'].'" method="post">
                            <input type="radio" class="pComentario" id="star5" name="rating" value="5">
                            <label for="star5"></label>
                            <input type="radio" class="pComentario" id="star4" name="rating" value="4">
                            <label for="star4"></label>
                            <input type="radio" class="pComentario" id="star3" name="rating" value="3">
                            <label for="star3"></label>
                            <input type="radio" class="pComentario" id="star2" name="rating" value="2">
                            <label for="star2"></label>
                            <input type="radio" class="pComentario" id="star1" name="rating" value="1">
                            <label for="star1"></label>
                            <input type="hidden" name="idProducto" value="'.$productId.'">
                            <div id="comentario">
                                <textarea name="comentario" rows="5" cols="33">Ingrese su comentario..</textarea>
                                <button type="submit">Enviar</button>
                                <button type="button" id="cancelButton">Cancelar</button>
                            </div>
                        </form>
                        </div>
                        <p id="product__description">'. $row["descripcion"] .'</p>';
                        
                
                $precioNormalFormateado = number_format($row["precio"], 0, ',', '.');
                $precioConDescuento = $row["precio"] * (1 - ($row["descuento"] / 100));
                $precioConDescuentoFormateado = number_format($precioConDescuento, 0, ',', '.');
                
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

                        $precioNormalFormateado = number_format($row["precio"], 0, ',', '.');
                        $descuento = isset($row["descuento"]) ? $row["descuento"] : 0;
                        $precioConDescuento = $row["precio"] * (1 - ($descuento / 100));
                        $precioConDescuentoFormateado = number_format($precioConDescuento, 0, ',', '.');

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

                        if ($descuento > 0) {
                            echo '<p class="product-price"><span class="strike">Antes:</span> <span class="strike normal-price">$' . $precioNormalFormateado . ' COP</span></p>';
                            echo '<p class="product-price"><span class="discount-price">Ahora: $' . $precioConDescuentoFormateado . ' COP</span></p>';
                        } else {
                            echo '<p class="product-price">Precio: $' . $precioNormalFormateado . ' COP</p>';
                        }

                        echo '<div id="product__stock">
                                <p class="product__stock__item" id="product__stock__number">'. $row["stock_disponible"] .' disponibles</p>
                            </div>
                            <button class="product-inner product-buy  boton__comprar" value="' . $productId .'">Comprar</button>
                            <form action="validar.php?option=4" method="post">
                                <button name="productId" value="' . $productId .'"type="submit" class="product-inner product-cart">Añadir al carrito</button>
                            </form>  
                        </div>
                        <div id="product__description">
                    
                        </div>
                    </div>
                    </div>';
                }
            }
            if($resulta->num_rows > 0)
            {
                while ($roww = $resulta->fetch_assoc()){
                    $usuariosql = "SELECT `nombre`, `apellido` FROM usuarios WHERE ID_usuario=".$roww['ID_usuario'];
                    $aaa = $conn->query($usuariosql);
                    $resultado = $aaa->fetch_assoc();
                    $nombreComp =  $resultado['nombre'].' '. $resultado['apellido'];
                    echo '
                    <div class="comentario__usuario">
                        <h4>'.$nombreComp .'</h4><span>&#9733 '.$roww["puntuacion"].'</span>
                        <p>'.$roww["comentario"].'.</p>
                    </div>';
                }
            }       
            $conn->close();
        ?>
    </div>

    <?php
        include('footer.php');
    ?>
    <script src="modules/js/category.js"></script>
    <script>
        function changeImg (newSrc) {
            var mainImg = document.getElementById("product__mainImage");
            mainImg.setAttribute("src", newSrc)
            mainImg.setAttribute("src", newSrc);
        }

        const comentarioTextArea = document.getElementById("comentario");
        const comentarioCancelar = document.getElementById("cancelButton");
        const comentarioEstrella = document.getElementsByClassName("pComentario");

        for (let i = 0; i < comentarioEstrella.length; i++) {
            comentarioEstrella[i].addEventListener("click", function () {
                comentarioTextArea.style.display = "block";
            });
        }
        comentarioCancelar.addEventListener("click", function () {
            comentarioTextArea.style.display = "none";
        });
        const buy__button = document.querySelectorAll(".boton__comprar");
        const pagoContainer = document.getElementById("pagoContainer");
        
        buy__button.forEach(function(boton) {
            boton.addEventListener("click", function(){
                pagoContainer.style.display="block";
                // Lo que queda de está función es constancia de que me gusta complicarme la vida
                var complique = document.getElementById("productoId");
                complique.value = boton.value;
        });
        })

        function cerrarForm() {
            pagoContainer.style.display = "none";
        }
    </script>
    </script>
    <style>
        #product__attributes button {
            width: 150px;
            height: 30px;
            border: none;
            border-radius: 0.5em;
            margin-right: 10px;
            font-size: 15px;
            cursor: pointer;
            transition: .5s;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.01);
            margin: 5px 0;
        }

        .product-buy{
            background-color: rgb(198, 255, 236);
        }

        .product-buy:hover {
            background-color: aquamarine;
        }
        .product-cart {
            background-color: rgb(255, 229, 181);

        }

        .product-cart:hover {
            background-color: rgb(255, 206, 115);
        }
    </style>
</body>
</html>

