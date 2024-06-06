<main class="contenedor seccion ">
        <h1 data-cy="heading-contacto">Contacto</h1>

        <?php
        if($mensaje){?>
            <p data-cy="alerta-envio-formulario" class='alerta exito'><?php echo $mensaje; ?></p>
       <?php  } ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen-contacto">
        </picture>

        <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

        <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
                
                <label for="apellido">Apellidos</label>
                <input type="text" placeholder="Tu/s Apellido/s" id="apellido" name="contacto[apellido]" required>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre el proyecto</legend>

                <label for="mensaje">Mensaje:</label>
                <textarea data-cy="input-mensaje" type="mensaje" placeholder="Describe las características principales de la aplicación que deseas: funcionalidades clave, diseño deseado, público objetivo, plazos, y cualquier otra especificación relevante."
                id="mensaje" name="contacto[mensaje]" required></textarea>

                <label for="presupuesto"> Presupuesto:</label>
                <input data-cy="input-precio" type="number" placeholder="Tu Presupuesto" id="presupuesto" name="contacto[precio]" required>

            </fieldset>

            <fieldset>
                <legend>Como desea ser contactado</legend>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                    <label for="contactar-email">Email</label>
                    <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>

    </main>