<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
</head>
<body>
    <form method="post" action="../../sql/agregarproducto.php" enctype="multipart/form-data">
        <div class="add-product">
            <div class="add-product__block">
                <p class="add-product__item">
                    Nombre del producto<input type="text" name="NomProducto" class="add-product__input">
                </p>
                <p class="add-product__item">
                    Imagen del producto<br> <input type="file" id="imagen" name="FotoProducto" accept="image/*" required>
                </p>
                <p class="add-product__item">
                    Descripcion del producto <textarea name="descripcionProducto" class="add-product__textarea"></textarea>
                </p>
            </div>
        </td></tr>
            <p class="add-product__item">
                Precio del producto <input type="number" name="PrecioProducto" class="add-product__input">
            </p>
            <p class="add-product__item">
                <div class="add-product__category">
                    <p class="add-product__radio"><input type="radio" name="categoria" value="ropa">Ropa</p>
                    <p class="add-product__radio"><input type="radio" name="categoria" value="calzado">Calzado</p>
                    <p class="add-product__radio"><input type="radio" name="categoria" value="tecnologia">Tecnologia</p>
                    <p class="add-product__radio"><input type="radio" name="categoria" value="belleza">Belleza</p>
                </div>
            </p>
            <p class="add-product__item">
                Stock disponible <input type="number" name="stock" class="add-product__input">
            </p>
            <p class="add-product__item">
                Descuento (NÚMERO)<input type="text" name="descuento" class="add-product__input">
            </p>
            <p class="add-product__item">
                <button type="submit" class="add-product__button">Enviar</button><a href="lista.php">Volver</a>
            </p>
        </div>
    </form>
</body>
<style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .add-product {
            width: 60%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .add-product__block {
            margin-bottom: 15px;
        }

        .add-product__item {
            margin-bottom: 10px;
        }

        .add-product__input,
        .add-product__textarea,
        .add-product__radio {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .add-product__textarea {
            resize: vertical;
        }

        .add-product__category {
            display: flex;
            gap: 20px;
        }

        .add-product__button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-product__button:hover {
            background-color: #45a049;
        }
        a{
            padding: 10px 20px;
            font-size: 13px;
            margin-left: 10px;
            text-decoration: none;  
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

         a:hover {
            background-color: #45a049;
        } 
</style>
</html>