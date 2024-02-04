<div id="pagoContainer">
    <form action="/SANSITO-MAPS/modules/sql/pagosql.php" method="POST">
            <h3>FORMA DE PAGO</h3>
            <input type="hidden" name="productId" id="productoId">
            <div id="pago__direc"><span>Direccion de entrega</span><input type="text" name="direccion_entrega"></div>
            <div id="pago__options">
            <div id="pago__efectivo" class="pago__option">
                <input type="radio" class="pago__input" name="forma_pago" id="efectivo" value="efectivo">
                <label for="efectivo">Efectivo</label>
            </div>

            <div id="pago__nequi" class="pago__option">
                <input type="radio" class="pago__input" name="forma_pago" id="nequi" value="nequi">
                <label for="nequi">Nequi</label>
            </div>

            <div id="pago__davi" class="pago__option">
                <input type="radio" class="pago__input" name="forma_pago" id="daviplata" value="daviplata">
                <label for="daviplata">Daviplata</label>
            </div>
            </div>
                <div id="pago__buttons">
                <button type="submit">Enviar</button>
                <button type="button" id="button__cancel" onclick="cerrarForm()">Cancelar</button>
                </div>
    </form>
</div>
<style>
    #pagoContainer {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.3 );
    }

    #pagoContainer img {
        width: 50px;
        height: 50px;
    }

    #pagoContainer form {
        background-color: white;
        width: 400px;
        height: 200px;
        position: absolute;
        top: 40%;
        left: 41%;
        margin: -25px 0 0 -25px;
        padding: 20px;
        border-radius: 0.5em;
    }

    #pago__direc span {
        font-size: 17px;
        font-weight: bold;
    }

    #pagoContainer h3{
        text-align: center;
        margin-bottom: 10px;
    }

    .pago__option {
        display: inline-flex;
        justify-content: center;
        margin: 5px;
        padding: 0 10px;
        transition: 1s;
    }

    #pagoContainer input[type="text"] {
    padding: 8px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

    /* Estilos para los botones de radio */
    .pago__input {
    margin-right: 5px;
    appearance: none;
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #007bff;
    border-radius: 50%;
    outline: none;
    cursor: pointer;
    transition: 0.5s;
    }

    .pago__input:checked {
    background-color: #007bff;
    }

    #pago__buttons {
    margin-top: 15px;
    }

    #pagoContainer button {
    padding: 8px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    #button__cancel {
    background-color: #dc3545;
    margin-left: 10px;
    }

    #pago__direc {
        text-align: center;
    }

    #pago__options {
        text-align: center;
    }

    #pago__buttons {
        margin: 10px;
        text-align: center;
    }

    #pago__buttons button {
        cursor: pointer;
        width: 80px;
        border-radius: 0.5em;
        border: none;
        box-shadow: 0 3px 2px rgba(0, 0, 0, 0.1 );
        font-size: 14px;
        padding: 5px 0;
    }
    </style>
