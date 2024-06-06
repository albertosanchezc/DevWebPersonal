<main class="contenedor seccion contenido-centrado">

        <h1 data-cy="titulo-propiedad"><?php echo $pagina->nombre; ?></h1>
    <div class="contenedor-pagina">

        <img loading="lazy" src="/imagenes/<?php echo $pagina->imagen; ?>" alt="Imagen de la propiedad">

        <div class="resumen-propiedad">
            <p>Descripción: <span class="publica__texto"><?php echo $pagina->descripcion; ?></span></p>
            <p>Enlace: <a class="publica__texto" href="<?php echo $pagina->enlace; ?>"><?php echo $pagina->enlace; ?></a></p>
            <p>Categoría: <span class="publica__texto"><?php echo isset($mapaCategorias[$pagina->categoriaId]) ? $mapaCategorias[$pagina->categoriaId] : 'Desconocida'; ?></span></p>
            <p>Fecha de Creación: <span class="publica__texto"><?php echo $pagina->fechaCreacion; ?></span></p>
            <p>Estado del Proyecto: <span class="publica__texto"><?php echo isset($mapaEstados[$pagina->estadoProyectoId]) ? $mapaEstados[$pagina->estadoProyectoId] : 'Desconocido'; ?></span></p>
            <p>Repositorio: <span class="publica__texto"><?php echo $pagina->repositorio; ?></span></p>
            <p>Tecnologías Usadas: <span class="publica__texto"><?php if (is_string($pagina->tecnologias)) {
                    // Eliminar corchetes y comillas de la cadena
                    $limpiaTecnologias = str_replace(array('[', ']', '"'), '', $pagina->tecnologias);

                    // Convertir la cadena en un arreglo
                    $tecnologiasArray = explode(",", $limpiaTecnologias);
        
                    // Limpiar espacios adicionales de cada tecnología
                    $tecnologiasArray = array_map('trim', $tecnologiasArray);
        
                    // Imprimir los valores del arreglo en una sola línea sin llaves ni comillas
                    echo implode(", ", $tecnologiasArray);
                    } else {
                        echo "La propiedad 'tecnologias' no es una cadena.";
                    } ?></span></p>
        </div>
    </div>
</main>