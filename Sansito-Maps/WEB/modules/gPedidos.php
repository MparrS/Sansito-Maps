<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header1.css">
    <link rel="stylesheet" href="css/cuenta.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b414b30242.js" crossorigin="anonymous"></script>
    <title>Gestion pedidos</title>
    <style>
        #orders {
            max-width: 800px;
            margin: 0 auto;
            padding: 2em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.5em;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            text-align: left;
        }

        .status-select {
            padding: 0.25em;
        }

        .update-container {
            display: flex;
            align-items: center;
        }

        .update-button {
            padding: 0.25em 0.5em;
            background-color: #ff0000;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 1em;
        }

        .update-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div>
        <?php
            include_once('sql/conexion.php');
            include('header.php');
            include('cuenta.php');
        ?>
        <br>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["order_id"]) && isset($_POST["new_status"])) {
                    $orderID = $_POST["order_id"];
                    $newStatus = $_POST["new_status"];

                    $sqlUpdate = "UPDATE pedidos SET estado_pedido = '$newStatus' WHERE ID_pedido = $orderID";
                    if ($conn->query($sqlUpdate) === TRUE) {
                        echo "Estado actualizado con éxito.";
                    } else {
                        echo "Error al actualizar el estado: " . $conn->error;
                    }
                }
            }

            $userID = $_SESSION['usuario'];

            $sql = "SELECT p.ID_pedido, p.estado_pedido, p.fecha_pedido, p.forma_pago, p.direccion_entrega, pr.nombre_producto, pr.imagen_producto
                    FROM pedidos p
                    INNER JOIN productos pr ON p.ID_producto = pr.ID_producto
                    WHERE p.ID_vendedor = $userID";

            $result = $conn->query($sql);

            if ($result !== false && $result->num_rows > 0) {
                echo '<br><br><br><br><br><br><div id="orders">
                        <h2>Pedidos</h2>
                        <table>
                            <tr>
                                <th>Producto</th>
                                <th>Fecha del Pedido</th>
                                <th>Forma de Pago</th>
                                <th>Dirección de Entrega</th>
                                <th>Estado</th>
                                <th>Actualizar Estado</th>
                            </tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row["nombre_producto"] . '</td>
                            <td>' . $row["fecha_pedido"] . '</td>
                            <td>' . $row["forma_pago"] . '</td>
                            <td>' . $row["direccion_entrega"] . '</td>
                            <td>';
                    switch ($row['estado_pedido']) {
                        case '1':
                            echo 'Almacen';
                            break;
                        case '2':
                            echo 'Proceso';
                            break;
                        case '3':
                            echo 'Entregado';
                            break;
                    }
                    echo '</td>
                            <td>
                                <select class="status-select" data-order-id="' . $row["ID_pedido"] . '">
                                    <option value="1">En almacen</option>
                                    <option value="2">En proceso</option>
                                    <option value="3">Entregado</option>
                                </select>
                                <button class="update-button">Enviar</button>
                            </td>
                        </tr>';
                }
                echo '</table></div><br><br><br><br>';
            } else {
                echo '<br><br><br><br><br><br><div id="orders">
                        <h2>No tienes órdenes activos.</h2></div>';
            }
            $conn->close();
        ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".update-button").click(function() {
                    var orderId = $(this).siblings(".status-select").data("order-id");
                    var newStatus = $(this).siblings(".status-select").val();

                    $.ajax({
                        type: "POST",
                        url: "",
                        data: {
                            order_id: orderId,
                            new_status: newStatus
                        },
                        success: function(response) {
                            var statusElement = $(".status-select[data-order-id='" + orderId + "']").siblings(".order__status").find("p");
                            statusElement.text(response);
                            console.log("Estado actualizado con éxito");
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error("Error al actualizar el estado del pedido:", error);
                        }
                    });
                });
            });
        </script>
    </div>
    <?php
        include('footer.php');
    ?>
</body>
</html>