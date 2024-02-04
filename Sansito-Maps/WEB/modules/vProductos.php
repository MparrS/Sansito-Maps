
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/mapa.css">
    <link rel="stylesheet" href="css/cuenta.css">
    <link rel="stylesheet" href="css/product.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b414b30242.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            include_once('sql/conexion.php');
            include('header.php');
            include('cuenta.php');
            include('category.php');
            include('notification.php'); 
        ?>
    <style>

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        margin-top: 120px;
        margin-bottom: 20px;
        padding: 40px;
        border: solid 2px #F9CE3A;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .form-container h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    #product-form {
        display: flex;
        flex-wrap: wrap;
    }

    .form-group {
        flex: 1;
        margin: 0 10px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .form-group label,
    .form-group input,
    .form-group textarea {
        margin-bottom: 10px;
    }

    .form-container label {
        font-size: 16px;
        color: #555;
    }

    .form-container input,
    .form-container textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 14px;
        color: #333;
    }

    .form-container input:focus,
    .form-container textarea:focus {
        border-color: #e9cc6e;
    }

    .form-container button[type="submit"] {
        background-color: #F9CE3A;
        color: black;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-container button[type="submit"]:hover {
        background-color: #e9cc6e;
    }

    </style>
    </head>
    <body>
    <div class="form-container">
    <h2>Formulario de Inserción de Productos</h2>
    <form action="sql/agregarproducto.php?idVendedor=<?php echo $_SESSION['usuario'];?>" method="post" id="product-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="NomProducto" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="FotoProducto" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcionProducto" required></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="PrecioProducto" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock Disponible:</label>
            <input type="number" id="stock" name="stock" required>
        </div>

        <div class="form-group">
            <label for="descuento">Descuento (Solo números):</label>
            <input type="number" id="descuento" name="descuento">
        </div>

        <button type="submit">Insertar Producto</button>
    </form>

    </div>
        <?php
            include('notification.php');
            $conn->close();
        ?>
    </div>
    <?php
        include('footer.php');
    ?>
    <script src="js/script.js"></script>
    <script src="js/category.js"></script>
</body>
</html>