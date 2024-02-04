<?php
     if (isset($_GET['notification'])) {
         $notification =  $_GET['notification'];
         switch($notification) {
             case 1: // Añadir al carrito éxito
                 echo '
                    <div id="notification">
                    <div id="notification__text">
                        <h4>Éxito</h4>
                        <p>Producto añadido al carrito.</p>
                    </div>
                    <div id="notification__icon">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    </div>
                     <style>
                     #notification {
                        position: fixed;
                        left: 20px;
                        top: 100px;
                        width: 350px;
                        height: 120px;
                        background-color: #63AB61;
                        padding: 20px;
                        display: flex;
                        align-items: center;
                        color: white;
                        transform: translateX(-400px);
                        animation: notificationPush 2s;
                    }
                    
                    #notification__text {
                        display: inline-block;
                        width: 240px;
                    }
                    
                    #notification__icon {
                        display: inline-block;
                        width: 60px;
                        font-size: 50px;
                    }
                    
                    #notification__icon  i {
                        margin-left: 10px;
                    }
                    
                    @keyframes notificationPush {
                        0%, 100% {
                            transform: translateX(-400px);
                        }
                        25%, 75% {
                            transform: translateX(0);
                        }
                    }
                     </style>
                 ';
             break;
        case 2: // Login correo incorrecto
            echo '
            <div id="notification">
                <div id="notification__text">
                    <h4>Error</h4>
                    <p>Correo incorrecto.</p>
                </div>
                <div id="notification__icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
            <style>
                            
                #notification {
                    position: fixed;
                    left: 20px;
                    top: 100px;
                    width: 350px;
                    height: 120px;
                    background-color: #F98118;
                    padding: 20px;
                    display: flex;
                    align-items: center;
                    color: white;
                    transform: translateX(-400px);
                    animation: notificationPush 2s;
                }

                #notification__text {
                    display: inline-block;
                    width: 240px;
                }

                #notification__icon {
                    display: inline-block;
                    width: 60px;
                    font-size: 50px;
                }

                #notification__icon  i {
                    margin-left: 10px;
                }

                @keyframes notificationPush {
                    0%, 100% {
                        transform: translateX(-400px);
                    }
                    25%, 75% {
                        transform: translateX(0);
                    }
                }
            </style>';
        break;
        case 3: // Login contraseña incorrecta
            echo '
            <div id="notification">
                <div id="notification__text">
                    <h4>Error</h4>
                    <p>Contraseña incorrecta.</p>
                </div>
                <div id="notification__icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
            <style>
                            
                #notification {
                    position: fixed;
                    left: 20px;
                    top: 100px;
                    width: 350px;
                    height: 120px;
                    background-color: #F98118;
                    padding: 20px;
                    display: flex;
                    align-items: center;
                    color: white;
                    transform: translateX(-400px);
                    animation: notificationPush 2s;
                }

                #notification__text {
                    display: inline-block;
                    width: 240px;
                }

                #notification__icon {
                    display: inline-block;
                    width: 60px;
                    font-size: 50px;
                }

                #notification__icon  i {
                    margin-left: 10px;
                }

                @keyframes notificationPush {
                    0%, 100% {
                        transform: translateX(-400px);
                    }
                    25%, 75% {
                        transform: translateX(0);
                    }
                }
            </style>';
        break;
        case 4: // Necesitas iniciar sesión
            echo '
            <div id="notification">
                <div id="notification__text">
                    <h4>Error</h4>
                    <p>Necesitas iniciar sesión para esto.</p>
                </div>
                <div id="notification__icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
            <style>
                            
                #notification {
                    position: fixed;
                    left: 20px;
                    top: 100px;
                    width: 350px;
                    height: 120px;
                    background-color: #F98118;
                    padding: 20px;
                    display: flex;
                    align-items: center;
                    color: white;
                    transform: translateX(-400px);
                    animation: notificationPush 2s;
                }

                #notification__text {
                    display: inline-block;
                    width: 240px;
                }

                #notification__icon {
                    display: inline-block;
                    width: 60px;
                    font-size: 50px;
                }

                #notification__icon  i {
                    margin-left: 10px;
                }

                @keyframes notificationPush {
                    0%, 100% {
                        transform: translateX(-400px);
                    }
                    25%, 75% {
                        transform: translateX(0);
                    }
                }
            </style>';
        break;
        case 5: // Registro contraseñas diferentes
            echo '
            <div id="notification">
                <div id="notification__text">
                    <h4>Error</h4>
                    <p>Las contraseñas deben de ser iguales.</p>
                </div>
                <div id="notification__icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
            <style>
                            
                #notification {
                    position: fixed;
                    left: 20px;
                    top: 100px;
                    width: 350px;
                    height: 120px;
                    background-color: #F98118;
                    padding: 20px;
                    display: flex;
                    align-items: center;
                    color: white;
                    transform: translateX(-400px);
                    animation: notificationPush 2s;
                }

                #notification__text {
                    display: inline-block;
                    width: 240px;
                }

                #notification__icon {
                    display: inline-block;
                    width: 60px;
                    font-size: 50px;
                }

                #notification__icon  i {
                    margin-left: 10px;
                }

                @keyframes notificationPush {
                    0%, 100% {
                        transform: translateX(-400px);
                    }
                    25%, 75% {
                        transform: translateX(0);
                    }
                }
            </style>';
        break;
        case 6: // Notificacion verde
            $tituloNot = $_GET['title'];
            $textNot = $_GET['text'];
            echo '
                    <div id="notification">
                    <div id="notification__text">
                        <h4>'.$tituloNot.'</h4>
                        <p>'.$textNot.'</p>
                    </div>
                    <div id="notification__icon">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    </div>
                     <style>
                     #notification {
                        position: fixed;
                        left: 20px;
                        top: 100px;
                        width: 350px;
                        height: 120px;
                        background-color: #63AB61;
                        padding: 20px;
                        display: flex;
                        align-items: center;
                        color: white;
                        transform: translateX(-400px);
                        animation: notificationPush 2s;
                    }
                    
                    #notification__text {
                        display: inline-block;
                        width: 240px;
                    }
                    
                    #notification__icon {
                        display: inline-block;
                        width: 60px;
                        font-size: 50px;
                    }
                    
                    #notification__icon  i {
                        margin-left: 10px;
                    }
                    
                    @keyframes notificationPush {
                        0%, 100% {
                            transform: translateX(-400px);
                        }
                        25%, 75% {
                            transform: translateX(0);
                        }
                    }
                     </style>
                 ';
        break;
        }
        
     }
?>

<!-- 

-------------------------------------PLANTILLA NOTIFICACIONES

-----NOTIFICACIÓN OK:

CSS:

#notification {
    position: fixed;
    left: 20px;
    top: 100px;
    width: 350px;
    height: 120px;
    background-color: #63AB61;
    padding: 20px;
    display: flex;
    align-items: center;
    color: white;
    transform: translateX(-400px);
    animation: notificationPush 2s;
}

#notification__text {
    display: inline-block;
    width: 240px;
}

#notification__icon {
    display: inline-block;
    width: 60px;
    font-size: 50px;
}

#notification__icon  i {
    margin-left: 10px;
}

@keyframes notificationPush {
    0%, 100% {
        transform: translateX(-400px);
    }
    25%, 75% {
        transform: translateX(0);
    }
}

HTML:

<div id="notification">
    <div id="notification__text">
        <h4>Titulo</h4>
        <p>Mensaje.</p>
    </div>
    <div id="notification__icon">
        <i class="fa-solid fa-thumbs-up"></i>
    </div>
</div>

-----NOTIFICACIÓN ERROR:

CSS:

#notification {
    position: fixed;
    left: 20px;
    top: 100px;
    width: 350px;
    height: 120px;
    background-color: #F98118;
    padding: 20px;
    display: flex;
    align-items: center;
    color: white;
    transform: translateX(-400px);
    animation: notificationPush 2s;
}

#notification__text {
    display: inline-block;
    width: 240px;
}

#notification__icon {
    display: inline-block;
    width: 60px;
    font-size: 50px;
}

#notification__icon  i {
    margin-left: 10px;
}

@keyframes notificationPush {
    0%, 100% {
        transform: translateX(-400px);
    }
    25%, 75% {
        transform: translateX(0);
    }
}

HTML:

<div id="notification">
    <div id="notification__text">
        <h4>Titulo</h4>
        <p>Mensaje.</p>
    </div>
    <div id="notification__icon">
        <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
</div>

 -->