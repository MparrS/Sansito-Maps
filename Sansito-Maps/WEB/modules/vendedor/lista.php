<?php
// Include the database connection
include('../sql/conexion.php');

// Fetch products from the database}
session_start();
$query = "SELECT * FROM productos WHERE ID_vendedor =".$_SESSION['usuario'];
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
</head>
<body>
    
    <h1>Listado de Productos</h1>
    <table>
    <a id="volver" href="/SANSITO-MAPS" style="display: block; margin: 0 auto; width: 150px;">Volver a SANSITO-MAPS</a>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th>Acciones </th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['ID_producto']; ?></td>
                <td><?php echo '<a href="/SANSITO-MAPS/modules/product_details.php?productId='.$row['ID_producto'].'">'.$row['nombre_producto'].' </a>';?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['stock_disponible']; ?></td>
                <td><?php echo $row['categoria']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['ID_producto']; ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $row['ID_producto']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #999;
    color: white;
}

table tr:nth-child(odd) {
    background-color: whitesmoke;
}

a {
    text-decoration: none;
    margin-right: 10px;
    color: blue;
}

a:hover {
    text-decoration: underline;
}

#volver {
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

    #volver:hover {
    background-color: #45a049;
} 

</style>

</html>
