<?php
// Include the database connection
include('../../sql/conexion.php');

// Fetch products from the database
$query = "SELECT * FROM usuarios";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Usuarios</title>
</head>
<body>
    
    <h1>Listado de Usuarios</h1>
    <table>
    <a id="volver" href="/SANSITO-MAPS" style="display: block; margin: 0 auto; width: 150px;">Volver a SANSITO-MAPS</a>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Acciones </th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { $nombreComp= $row['nombre'] . ' ' . $row['apellido'] ?>
            
            <tr>
                <td><?php echo $row['ID_usuario']; ?></td>
                <td><?php echo $nombreComp; ?></td>
                <td><?php echo $row['contacto']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['ID_usuario']; ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $row['ID_usuario']; ?>">Eliminar</a>
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
    background-color: #f2f2f2;
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
