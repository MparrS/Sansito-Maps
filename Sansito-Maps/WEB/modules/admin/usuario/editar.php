<?php
include('../../sql/conexion.php');

if(isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    
    if(isset($_POST['update'])) {
        $new_name = $_POST['new_name'];
        $new_lName = $_POST['new_lName'];
        $new_price = $_POST['new_price'];
        $new_category = $_POST['new_category'];
        
        $update_query = "UPDATE usuarios SET nombre='$new_name', apellido='$new_lName', contacto='$new_price', correo='$new_category' WHERE ID_usuario=$usuario_id";
        mysqli_query($conn, $update_query);
        header("Location: lista.php");
    }
    
    $query = "SELECT * FROM usuarios WHERE ID_usuario=$usuario_id";
    $result = mysqli_query($conn, $query);
    $usuario = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="new_name" value="<?php echo $usuario['nombre']; ?>"><br>

        <label>Apellido:</label>
        <input type="text" name="new_lName" value="<?php echo $usuario['apellido']; ?>"><br>
        
        <label>Contacto:</label>
        <input type="text" name="new_price" value="<?php echo $usuario['contacto']; ?>"><br>
        
        <label>Correo:</label>
        <input type="text" name="new_category" value="<?php echo $usuario['correo']; ?>"><br>
        
        <button type="submit" name="update">Actualizar</button><a href="lista.php">Volver</a>
    </form>
</body>

<style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            margin: 0;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
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
