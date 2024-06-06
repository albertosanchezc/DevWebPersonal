<?php

use Model\Pagina;

    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
        $paginas = Pagina::all();
    } else{
        $paginas = Pagina::get(3);
    }
?>

<div class="contenedor-anuncios">
    <?php foreach ($paginas as $pagina){ ?>
        <div class="anuncio">

            <img src="<?php echo $pagina->imagen; ?>" alt="Imagen Pagina"/>

            <div class="contenido-anuncio">
                <h3><?php echo $pagina->nombre; ?></h3>
                <p><?php echo $pagina->descripcion; ?></p>
                <p class="precio">$<?php echo $pagina->tecnologias; ?></p>

                <a href="anuncio.php?id=<?php echo $pagina->id; ?>" class="boton boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!-- .contenido-anuncio -->
        </div><!-- .anuncio -->
    <?php } ?>
</div><!-- .contenedor-anuncios -->
