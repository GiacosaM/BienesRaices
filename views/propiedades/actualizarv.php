<main class="contenedor seccion">
    <h1> Crear</h1>
    <a href="admin" class="boton boton-verde"> Volver </a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error;   ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="POST" enctype="multipart/form-data"> 

    <fieldset>
            <legend> Informacion General</legend>

            <label for="titulo"> Nombre:</label>
            <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor" value="<?php echo s($vendedor->nombre); ?>">

            <label for="titulo"> Apellido:</label>
            <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor" value="<?php echo s($vendedor->apellido); ?>">

            
</fieldset>       
<fieldset>
<legend> Informacion Extra</legend>
            <label for="titulo"> Telefono:</label>
            <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono Vendedor" value="<?php echo s($vendedor->telefono); ?>">


</fieldset>    

<input type="submit" value="Actualizar Vendedor" class="boton boton-verde">

    </form>
    

</main>

