
<main class="contenedor seccion">
    <h1> Administrador de Bienes Raices</h1>
    
    <?php
    if($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"> <?php echo s($mensaje) ?> </p>
        <?php } 
    }
    ?>
   


    <a href="crear" class="boton boton-verde"> Nueva Propiedad </a>
    <a href="crearv" class="boton boton-amarillo"> Nuevo Vendedor </a>

    <h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- mostrar los resultados -->
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo; ?> </td>
                    <td> <img src="/public/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                       
                        <a href="actualizar?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <!-- desde aca hasta el main es el vendedor -->

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>

            </tr>
        </thead>

        <tbody>
            <!-- mostrar los resultados -->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>

                    <td> <?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="eliminarv">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="actualizarv?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</main>
