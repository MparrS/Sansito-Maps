<?php
 session_start();

 if (isset($_SESSION['usuario'])) {
     echo '
        <header>
        <div class="navBar">
            <div class="searchBar">
            <button id="categoriasBtn"><i class="fas fa-bars"></i></button>
                <input type="text" id="searchText" placeholder="Buscar...">
            </div>
            <a href="/SANSITO-MAPS" id="sansitoMaps">SANSITO-MAPS</a>
            <div id="user_panel">
                ';
            if (isset($_SESSION['cartCount'])) {
                echo '
                <div id="cartIcon">
                    <p>'.count($_SESSION['cartCount']).'</p>
                    <a href="/SANSITO-MAPS/modules/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
                <style>
                    #user_panel {
                        width: 100px;
                    }
                </style>
                ';
            }
            else {
                echo '
                <style>
                    #user_panel {
                        width: 50px;
                    }
                </style>
                ';
            }
            echo'
            <div id="user__panel__icon">
                <input type="checkbox" id="visible_ul"></input>
                <label id="usericon" for="visible_ul" class="fa-solid fa-circle-user">         
                </label>
                <ul id="ulCont">
                    <li><button id="userButton" onclick="abrirForm(myAccount);"><i class="fa-solid fa-wrench"></i> Configuración</button></li>
                    <li><a href="/SANSITO-MAPS/modules/pedidos.php"><i class="fa-solid fa-box"></i> Pedidos</a></li>
                    <li><a href="/SANSITO-MAPS/modules/validar.php?option=3"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a></li>
                </ul>
            </div>        
        </div>
    </div>
    </header>
     ';
 }

 else {
     echo '
     <header>
     <div class="navBar">
         <div class="searchBar">
            <button id="categoriasBtn"><i class="fas fa-bars"></i></button>
            <input type="text" id="searchText" placeholder="Buscar...">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
         </div>
         <a href="/SANSITO-MAPS" id="sansitoMaps">SANSITO-MAPS</a>
         <div class="buttons">
             <button onclick="openLogin()" id="bLog">Iniciar sesión</button>
             <button onclick="openRegister()" id="bReg">Registrarse</button>
         </div>
     </div>
 </header>
 <div id="log_cont">
     <div id="login">
         <form action="/SANSITO-MAPS/modules/validar.php?option=1" method="post">
             <h3>Login</h3>
             <input type="text" name="logMail" id="logMail" placeholder="Correo" required>
             <input type="password" name="logContraseña" id="logContraseña" placeholder="Contraseña" required>
             <div>
                 <button id="login__submit" type="submit">Ingresar</button>
                 <button onclick="cancelLogin()" id="login__cancel" >Cancelar</button>
             </div>
         </form>
     </div>
     <div id="register">
         <form action="/SANSITO-MAPS/modules/validar.php?option=2" method="post">
             <h3>Registro</h3>
             <input type="text" name="regNombre" placeholder="Nombre(s)" required>
             <input type="text" name="regApellido" placeholder="Apellidos" required>
             <input type="number" name="regContacto" placeholder="Número de contacto" required>
             <input type="email" name="regCorreo" placeholder="Correo" required>
             <input type="password" name="regContraseña" placeholder="Contraseña" required>
             <input type="password" name="regConfirmContraseña" placeholder="Confirmar contraseña" required>
             <div>
                 <button id="register__submit" type="submit">Ingresar</button>
                 <button onclick="cancelRegister()" id="register__cancel" >Cancelar</button>
             </div>
         </form>
        
     </div>
 </div>
 <script>
     var logCont = document.getElementById("log_cont");
     var loginInput = document.getElementById("login");
     var registerInput = document.getElementById("register");
     function openLogin() {
         logCont.style.display = "block";
         loginInput.style.display = "block";
     }
     function cancelLogin()    {
         logCont.style.display = "none";
         loginInput.style.display = "none";
     }
     function openRegister() {
         logCont.style.display = "block";
         registerInput.style.display = "block";
     }
     function cancelRegister() {
         logCont.style.display = "none";
         registerInput.style.display = "none";
     }
 </script>
     ';
 }

 if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 1) {
        echo '
        <div id="admin">
            <label for="adminIcon"><i class="fa-solid fa-user-gear"></i>Admin panel</label>
            <input type="checkbox" name="adminIcon" id="adminIcon">
            <div id="admin__options">
                <h3>Administrar...</h6>
                <ul>
                    <li><a href="/SANSITO-MAPS/modules/admin/producto/lista.php">Productos</a></li>
                    <li><a href="/SANSITO-MAPS/modules/admin/usuario/lista.php">Usuarios</a></li>
                </ul>
            </div>
        </div>
        ';
     }
 }
 if (isset($_SESSION['vendedor'])) {
    if ($_SESSION['vendedor'] == 1) {
        echo '
        <div id="shopAdmin">
            <label for="shopIcon"><i class="fa-solid fa-store"></i></label>
            <input type="checkbox" id="shopIcon">
        <ul id="shopOpciones">
            <li><a href="/SANSITO-MAPS/modules/vProductos.php">Agregar</a></li>
            <li><a href="/SANSITO-MAPS/modules/vendedor/lista.php">Productos</a></li>
            <li><a href="/SANSITO-MAPS/modules/gPedidos.php">Pedidos</a></li>
        </ul>
        </div>
        ';
     }
 }
?>




