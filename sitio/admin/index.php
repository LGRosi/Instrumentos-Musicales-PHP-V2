<?php

    require_once __DIR__ . '/../bootstrap/init.php';
    require_once RUTA_RAIZ . '/bootstrap/rutas.php';

    $rutas = getRutasAdmin();

    $pagina = $_GET['p'] ?? 'login';

    if (!isset($rutas[$pagina])) {
        $pagina = "404";
    }


    $autenticacion = new Autenticacion();

    
    $requiereAutenticacion = $rutas[$pagina]['autenticacion'] ?? false;
    if($requiereAutenticacion && !$autenticacion->estaAutenticado()) {
        $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
        header("Location: index.php?p=login");
        exit;
    }



    $mensajeExito = $_SESSION['mensaje_exito'] ?? null;
    $mensajeError = $_SESSION['mensaje_error'] ?? null;
    unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="icon" href="../imagenes/nota.png" />
        <title>Panel de administración | <?= $rutas[$pagina]['title'];?></title>
    </head>


    <body class="fondobody">

        <div class="ocultarContenido">
            <a href="#content">Saltar al contenido</a>
        </div>

        <header class="container-fluid fondoheader mb-3 h-100">
            <h1 class="logo">Panel de administración</h1>
                <div class="row">
                    <nav class="col-12 px-md-5 mb-5 navbar navbar-expand-md navbar-dark fondoheader">
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#barra" aria-controls="barra" aria-expanded="false" aria-label="Menú Hamburguesa">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="barra">
                        <?php
                        if($autenticacion->estaAutenticado()):
                        ?>
                            <ul class="navbar-nav text-center ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?p=inicio">INICIO</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="index.php?p=listados">LISTADO</a>
                                </li>
                                <li class="nav-item">
                                    <form action="acciones/auth-cerrar-sesion.php" method="post">
                                        <button class="btn btn-danger" type="submit">Cerrar sesión</button>
                                    </form>
                                </li>
                            </ul>
                        <?php
                        endif;
                        ?>
                        </div>
                    </nav>
                </div>
        </header>

        <div class="container pt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                <?php
                if($mensajeExito !== null):
                ?>
                <div class="text-success"><?= $mensajeExito;?></div>
                <?php
                    endif;
                ?>
                <?php
                    if($mensajeError !== null):
                ?>
                <div class="text-danger"><?= $mensajeError;?></div>
                <?php
                    endif;
                ?>
                </div>
            </div>
        </div>
        

       
        <?php
            require __DIR__ . '/paginas/' . $pagina . '.php';
        ?>
    




        <footer class="container-fluid fondofooter text-white">
            <div class="row d-flex justify-content-around align-items-center">
                <div class="col-lg-10 mt-5">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-sm-8 col-md-6 pb-lg-4 pl-3">
                            <p class="text pb-3">Información adicional de Musindi:</p>
                            <p class="datos colorletras">Somos una empresa con 30 años de trayectoria. Nos orientamos a los apasionados de la música.</p>
                            <p class="logofooter mb-5 mb-sm-1 ml-5">Musindi</p>
                        </div>

                        <div class=" col-sm-8 col-md-6 pl-3 pl-md-5">
                            <p class="text pb-3">Información de la tienda:</p>
                            <ul class="ulredes mb-5">
                                <li class="my-1">MUSINDI</li>
                                <li class="mb-1">Calle falsa 123 - CABA</li>
                                <li class="mb-1">Ciudad de Buenos Aires - Argentina</li>
                                <li class="mb-1">Llamanos: 11 9999 9999</li>
                                <li class="mb-1">Envianos un correo electrónico:</li>
                                <li>instrumentos@musindi.com.ar</li>
                            </ul>
                            <div class="pb-5 mt-5 mt-sm-1">
                                <ul class="ulredes d-flex flex-wrap flex-sm-nowrap">
                                    <li class="my-1 px-3 px-sm-2"><a href="https://es-la.facebook.com/" target="_blank"><img class="redes" src="../imagenes/facebook.png" alt="facebook"></a></li>
                                    <li class="my-1 px-3 px-sm-2"><a href="https://twitter.com/login?lang=es" target="_blank"><img class="redes" src="../imagenes/twitter.png" alt="twitter"></a></li>
                                    <li class="my-1 px-3 px-sm-2"><a href="https://web.whatsapp.com/" target="_blank"><img class="redes" src="../imagenes/whatsapp.png" alt="whatsapp"></a></li>
                                    <li class="my-1 px-3 px-sm-2"><a href="https://www.youtube.com/" target="_blank"><img class="youtube" src="../imagenes/youtube.png" alt="youtube"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="copy w-100 pt-2 colorletras" id="info">
                    <p class="mx-5">© copyright 2021 Todos los Derechos Reservados | Musindi</p>
                </div>

            </div> 

        </footer>


        
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

        
        <script>
            $('.nav-item').on('click', function() {
                $(".navbar-collapse").collapse("hide");
            })
        </script>


        <script>
            document.createElement("picture");
        </script>
        <script src="js/picturefill.js"></script>

        <script>
            $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
        </script>

    </body>
</html>
