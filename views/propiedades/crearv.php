<main class="contenedor seccion">
    <h1> Crear Vendedor</h1>
    <a href="admin" class="boton boton-verde"> Volver </a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error;   ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="POST" action="crearv" enctype="multipart/form-data"  > 

    <?php include __DIR__ . '/formulariov.php'; ?>

        <input type="submit" value="Crear Vendedor" class="boton boton-verde">

    </form>
    

    </main>
