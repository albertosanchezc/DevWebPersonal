<main class="contenedor seccion">
    <h1>Administrador de DevWebPersonal</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
    <?php
        }
    }
    ?>
    <div class="botones">
        <a href="/proyectos/crear" class="boton boton-verde">Nueva Página</a>
        <a href="/categorias/crear" class="boton boton-amarillo">Nueva Categoria</a>
        <a href="/estados/crear" class="boton boton-azul">Nuevo Estado</a>
        <a href="/tecnologias/crear" class="boton boton-gris">Nueva Tecnología</a>
        <a href="/blog/crear" class="boton boton-morado">Nueva Entrada</a>
    </div>


    <h2>Páginas</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mostrar los Resultados -->
            <?php foreach ($paginas as $pagina) : ?>
                <tr>
                    <td><?php echo $pagina->id; ?></td>
                    <td><?php echo $pagina->nombre; ?></td>
                    <td><img src="/imagenes/<?php echo $pagina->imagen; ?>" class="imagen-tabla" alt="imagen-tabla"></td>
                    <td><?php echo isset($mapaCategorias[$pagina->categoriaId]) ? $mapaCategorias[$pagina->categoriaId] : 'Desconocida'; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/proyectos/eliminar">
                            <input type="hidden" name="id" value="<?php echo $pagina->id; ?>">
                            <input type="hidden" name="tipo" value="pagina">
                            <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/proyectos/actualizar?id=<?php echo $pagina->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Entradas de Blog</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los Resultados -->
            <?php foreach ($entradas as $entrada) { ?>
                <tr>
                    <td><?php echo $entrada->id; ?></td>
                    <td><?php echo $entrada->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $entrada->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $entrada->autor; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/blog/eliminar">
                            <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
                            <input type="hidden" name="tipo" value="entrada">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/blog/actualizar?id=<?php echo $entrada->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2>Categorias</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los Resultados -->
            <?php foreach ($categorias as $categoria) : ?>
                <tr>
                    <td><?php echo $categoria->id; ?></td>
                    <td><?php echo $categoria->nombre ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/categorias/eliminar">
                            <input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
                            <input type="hidden" name="tipo" value="categoria">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">

                        </form>
                        <a href="/categorias/actualizar?id=<?php echo $categoria->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <h2>Estados</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- Mostrar los Resultados -->
        <?php foreach ($estados as $estado) : ?>
            <tr>
                <td><?php echo $estado->id; ?></td>
                <td><?php echo $estado->nombre ?></td>
                <td>
                    <form method="POST" class="w-100" action="/estados/eliminar">
                        <input type="hidden" name="id" value="<?php echo $estado->id; ?>">
                        <input type="hidden" name="tipo" value="estado">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">

                    </form>
                    <a href="/estados/actualizar?id=<?php echo $estado->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Tecnologias</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        </tbody>

        <!-- Mostrar los Resultados -->
        <?php foreach ($tecnologias as $tecnologia) : ?>
            <tr>
                <td><?php echo $tecnologia->id; ?></td>
                <td><?php echo $tecnologia->nombre ?></td>
                <td>
                    <form method="POST" class="w-100" action="/tecnologias/eliminar">
                        <input type="hidden" name="id" value="<?php echo $tecnologia->id; ?>">
                        <input type="hidden" name="tipo" value="tecnologia">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">

                    </form>
                    <a href="/tecnologias/actualizar?id=<?php echo $tecnologia->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>