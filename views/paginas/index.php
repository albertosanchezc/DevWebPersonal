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

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="https://festivalmusicasassgulpdev.netlify.app/">
                    <h4>Simple Page Application</h4>
                    <p class="informacion-meta">Escrito el: <span>05/03/2024</span> por <span>Alberto Sánchez Camacho</span></p>
                </a>

                <p>
                    Consejos para construir una aplicación de simple página, con el mejor diseño y siguiendo las buenas prácticas
                </p>
            </div>

         </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="https://tocgeje.nyc.dom.my.id/">
                    <h4>Guía para la creción de un panel de administración</h4>
                    <p class="informacion-meta">Escrito el: <span>05/03/2024</span> por <span>Alberto Sánchez Camacho</span></p>
                </a>

                <p>
                    Crea tu panel de administración con MVC usando PHP, JavaScript y MySql </p>
            </div>
        </article>
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
