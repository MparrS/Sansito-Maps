<footer>
    <div>
    <img src="/SANSITO-MAPS/modules/img/logo.png" alt="logo" width="200px" height="200px">
        <div id="footer__content">
            <p  class="footer_title">Soporte</p>
            <div id="sop_mail">
                <p  class="footer_title">E-mail</p>
                <p><i class="fa-solid fa-envelope"></i>sansitomaps@gmail.com</p>
            </div>
            <div id="sop_tel">
                <p class="footer_title">Teléfono</p>
                <p><i class="fa-solid fa-phone"></i>666-6666</p>
            </div>
            <?php if (isset($_SESSION['justUser'])){echo '<span onclick="abrirForm(regTienda);">Registrar una tienda</span>'; }?>
        </div>
    </div>
</footer>
<div id="regTienda">
    <form action="modules/sql/agregarTienda.php" method="post">
        <h3>Registre su tienda</h3>
        <input type="text" name="nomTienda" id="nomTienda" placeholder="Ingrese el nombre de su tienda" required>
        <input type="text" name="imgTienda" id="imgTienda" placeholder="Ingrese una url con la imagen de su tienda" required>
        <textarea name="descTienda" id="descTienda" placeholder="Ingrese la descripción de su tienda" required></textarea>
        <div id="buttonsTienda">
            <button class="regTiendaButton" type="submit">Enviar</button><button class="regTiendaButton" id="cerrarRegTienda"type="button">Cerrar</button>
        </div>
    </form>
</div>

<script>
    const regTienda = document.getElementById("regTienda");
    const cerrarRegTienda = document.getElementById("cerrarRegTienda");

    cerrarRegTienda.addEventListener("click", function() {
        regTienda.style.display = "none";
    });
</script>