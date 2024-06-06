<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? null;

if(!isset($inicio)){
    $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevWebPersonal</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header <?php echo ($inicio) ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <p class="logo">DevWebPersonal</p>
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav data-cy="navegacion-header" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/paginas">Paginas</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) { ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php } else { ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php } ?>
                    </nav>
                </div>

            </div>
            <!--. barra-->
            <?php if ($inicio) {
                echo "<h1 data-cy='heading-sitio'>Desarrollo Web Personalizado</h1>";
            } ?>
        </div>
    </header>

    <?php echo $contenido;?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="navegacion">
                <nav data-cy="navegacion-footer" class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/paginas">Paginas</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <?php if ($auth) { ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php } else { ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php } ?>
                </nav>
            </div>
        </div>

        <p data-cy="copyright" class="copyright">Todos los derechos Reservados <?php echo date('Y')?>&copy;</p>
    </footer>

    <?php echo $script ?? ''; ?>
    <script src="build/js/modernizr.js"></script>
    <script src="../build/js/bundle.js"></script>
</body>

</html>