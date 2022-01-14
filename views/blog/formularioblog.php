<fieldset>
            <legend> Alta Articulo Blog </legend>

            <label for="titulo"> Titulo:</label>
            <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo Blog" value="<?php echo s($blog->titulo); ?>">

        
            <label for="imagen"> Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="blog[imagen]">
            <?php if ($blog->imagen) { ?>
                <img src="/public/imagenes/<?php echo $blog->imagen ?>" class="imagen-small">

            <?php }?>

            <label for="descripcion"> Descripcion</label>
            <textarea id="descripcion" name="blog[descripcion]"> <?php echo s($blog->descripcion); ?> </textarea>

        </fieldset>

        
        <fieldset>
            <legend>usuario</legend>
            <label for="vendero"> Vendedor </label>
            <select name="blog[usuarioId]" id="usuario">
                <option selected value=""> --Seleccione-- </option>
                <?php foreach($usuario as $usuario) { ?>
                    <option 
                        <?php echo $usuario->usuarioId === $usuario->id ? 'selected' : ''; ?>
                        value= "<?php echo s($usuario->id); ?>">
                    <?php echo s($usuario->nombre) . " ". s($usuario->apellido); ?> </option>
                <?php } ?>
            </select>
            
        </fieldset>