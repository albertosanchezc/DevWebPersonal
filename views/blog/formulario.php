<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="entrada[titulo]" placeholder="Titulo de la entrada de Blog" value="<?php echo s($entrada->titulo); ?>">

    <label for="autor">autor:</label>
    <input type="text" id="autor" name="entrada[autor]" placeholder="Autor" value="<?php echo s($entrada->autor); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="entrada[descripcion]" placeholder="Descripción de la entrada de Blog" value="<?php echo s($entrada->descripcion); ?>">

    <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="entrada[imagen]" accept="image/jpeg, image/png">

            <?php if($entrada->imagen){ ?>
                <img src="/imagenes/<?php echo $entrada->imagen; ?>" class="imagen-small" alt="">
            <?php } ?>

</fieldset>