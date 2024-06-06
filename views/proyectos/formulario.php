<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="pagina[nombre]" placeholder="Nombre Página" value="<?php echo s($pagina->nombre); ?>">

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="pagina[descripcion]"><?php echo s($pagina->descripcion); ?></textarea>

    <label for="fechaCreacion">Fecha de Creacion:</label>
    <input type="date" id="fechaCreacion" name="pagina[fechaCreacion]" placeholder="Fecha de Creacion Página" value="<?php echo s($pagina->fechaCreacion); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="pagina[imagen]" accept="image/jpeg, image/png">

    <?php if ($pagina->imagen) : ?>
        <img src="/imagenes/<?php echo $pagina->imagen; ?>" class="imagen-small">
    <?php endif; ?>

</fieldset>

<fieldset>
    <legend>Informacion Página</legend>

    <label for="enlace">Enlace:</label>
    <input type="url" id="enlace" name="pagina[enlace]" placeholder="https://ejemplo.com" value="<?php echo s($pagina->enlace); ?>">

    <label for="repositorio">Repositorio:</label>
    <input type="url" id="repositorio" name="pagina[repositorio]" placeholder="https://github.com/ejemplousuario/ejemplo-repositorio" value="<?php echo s($pagina->repositorio); ?>">

</fieldset>

<fieldset>
    <legend>Características del Sitio</legend>

    <label for="categoria">Categoría:</label>
    <select name="pagina[categoriaId]" id="categoria" value="<?php echo $pagina->categoriaId; ?>">
        <option value="">-- Seleccione --</option>
        <?php foreach ($categorias as $categoria) { ?>
            <option value="<?php echo s($categoria->id); ?>" <?php echo ($categoria->id == $pagina->categoriaId) ? 'selected' : '' ?>><?php echo s($categoria->nombre); ?></option>
        <?php } ?>
    </select>

    <label for="estado">Estado:</label>
    <select name="pagina[estadoProyectoId]" id="estado" value="<?php echo s($pagina->estadoProyectoId); ?>">
        <option value="">-- Seleccione --</option>
        <?php foreach ($estados as $estado) { ?>
            <option value="<?php echo s($estado->id); ?>" <?php echo ($estado->id == $pagina->estadoProyectoId) ?  'selected' : ''; ?>><?php echo s($estado->nombre); ?></option>
        <?php } ?>

    </select>

    <div class="formulario__campo">
        <label class="formulario__label">Tecnologías Utilizadas</label>
        <div class="formulario__contenedor-tecnologias">
            <div class="formulario__tecnologias">
                <?php foreach ($tecnologias as $tecnologia) { ?>

                    <div class="formulario__tecnologias">
                        <input type="checkbox" id="<?php echo s(trim($tecnologia->nombre)); ?>"  value="<?php echo s(trim($tecnologia->nombre)); ?>" />
                        <label for="<?php echo s(trim($tecnologia->nombre)); ?>" class="formulario__tecnologia__nombre">
                            <?php echo s($tecnologia->nombre); ?>
                        </label>
                    </div>
                <?php } ?>

            </div>
        </div>
        <input type="hidden" name="pagina[tecnologias]" id="tecnologiasSeleccionadas" name="tecnologiasSeleccionadas" value="<?php echo s($pagina->tecnologias); ?>">
    </div>


</fieldset>