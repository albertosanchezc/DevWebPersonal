<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Más Sobre Nosotros</h2>

    <?php include 'iconos.php'; ?>

</main>
<section class="seccion contenedor">
    <h2 data-cy="heading-listado">Explora Nuestros Proyectos y Servicios Web Personalizados</h2>

    <?php 
    include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="/paginas" class=" boton-verde" data-cy="todas-propiedades">Ver Todas</a>
    </div>
</section>

<section data-cy="imagen-contacto" class="imagen-contacto">
    <h2 data-cy="heading-contacto">Haz realidad tu visión en <span>línea</span></h2>
    <p>Completa el formulario de contacto y uno de nuestros desarrolladores web te contactará pronto</p>
    <a href="/contacto" class="boton-amarillo">Contáctanos</a>
</section>


<div class="contenedor seccion seccion-inferior">
    <section  data-cy="blog" class="blog">
        <h3>Nuestro Blog</h3>

        <?php foreach($entradas as $entrada){ ?>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/imagenes/<?php echo $entrada->imagen;?>" type="image/webp">
                        <source srcset="/imagenes/<?php echo $entrada->imagen;?>" type="image/jpeg">
                        <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen;?>" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada?id=<?php echo $entrada->id;?>">
                        <h4><?php echo $entrada->titulo;?></h4>
                        <p class="informacion-meta">Escrito el: <span><?php echo $entrada->creado . " ";?></span>por <span><?php echo $entrada->autor;?></span></p>
                        <p><?php echo $entrada->descripcion;?></p>
                    </a>
                </div>
            </article>
            <?php } ?>
    </section>

    <section data-cy="testimoniales" class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente manera, muy buena atención y el proyecto realizado cumple con todas mis expectativas.
            </blockquote>
            <p>- Alberto Sánchez Camacho</p>
        </div>

    </section>

</div>
