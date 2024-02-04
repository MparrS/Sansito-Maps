<div id="barraLateral">
    <button id="cerrarBtn"><i class="fas fa-times"></i></button>
    <form action="promos.php" method="post" class="formulario">
      <button type="submit" name="descuento" value="true" class="btn-promociones">Promociones</button>
    </form>
    <form action="categorias.php" method="post" class="formulario">
      <label for="categoria">Categoria:</label><br>
      <select name="categoria" class="select-categoria">
        <option value="">Todas las categorías</option>
        <?php
          $categoriaQuery = mysqli_query($conn, 'SELECT DISTINCT categoria
          FROM productos
          WHERE categoria IS NOT NULL;
          ');
          while($row = $categoriaQuery->fetch_assoc()) {
            echo '<option value="' . $row["categoria"] . '">' . $row["categoria"] . '</option>';
          }
        ?>
      </select>
      <label for="orden">Ordenar por:</label><br>
      <select name="orden" id="orden" class="select-orden">
        <option value="recent">Productos: Más recientes</option>
        <option value="desc">precio: Mayor a Menor</option>
        <option value="asc">Precio: Menor a Mayor</option>
        <option value="rating">Valoración: Mejor valorados</option>
      </select>
      <input type="submit" value="Buscar" class="btn-buscar">
    </form>
  </div>
  <style>

    #categoriasBtn {
      padding: 1px 1px;
      color: white;
      border: none;
      cursor: pointer;
    }

    #cerrarBtn {
      border: none;
      background-color: transparent;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      float: right;
    }

    #barraLateral {
      padding: 10px;
      position: fixed;
      top: 0;
      left: -300px;
      width: 300px;
      height: 100%;
      background-color: #333;
      transition: left 0.3s ease;
    }

    #barraLateral.activo {
      left: 0;
    }

    /* Nuevos estilos con clases y IDs */
    .formulario {
      margin-top: 20px;
    }

    .btn-promociones {
      background-color: yellow;
      color: black;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
    }

    .select-categoria,
    .select-orden {
      width: 100%;
      padding: 8px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #fff;
      margin-bottom: 10px;
    }

    .btn-buscar {
      background-color: red;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    #barraLateral label {
      color: whitesmoke;
      margin-bottom: 5px;
    }
  </style>