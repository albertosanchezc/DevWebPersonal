<div class="contenedor-anuncios">
    <?php foreach ($paginas as $pagina): ?>
        <div class="publica">
            <img src="/imagenes/<?php echo $pagina->imagen; ?>" alt="Imagen página" class="publica__imagen">

            <div class="publica__contenedor">
                <h5 class="publica__titulo"><?php echo $pagina->nombre;?></h5>
                
                <p class="publica__campo">Descripción: <span class="publica__texto" ><?php echo substr($pagina->descripcion, 0, 50); ?></span></p>
                
                <p class="publica__campo">Categoría: <span class="publica__texto"><?php echo isset($mapaCategorias[$pagina->categoriaId]) ? $mapaCategorias[$pagina->categoriaId] : 'Desconocida'; ?></span></p>

                <p class="publica__campo">Estado del Proyecto: <span class="publica__texto"><?php echo isset($mapaEstados[$pagina->estadoProyectoId]) ? $mapaEstados[$pagina->estadoProyectoId] : 'Desconocido'; ?></span></p>

                <p class="publica__campo">Tecnologías: <span class="publica__texto"><?php if (is_string($pagina->tecnologias)) {
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
                }?></span></p>

                
                <a href="<?php echo $pagina->enlace;?>" class="boton boton-verde-block">Visitar Página</a>

                <a href="/pagina?id=<?php echo $pagina->id; ?>" class="boton boton-amarillo-block">Ver Proyecto</a>
            </div>
        </div>
    <?php endforeach; ?>
</div><!-- .contenedor-anuncios -->



