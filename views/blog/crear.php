<main class="contenedor seccion">
    <h1> Crear Articulo de Blog</h1>
    <a href="admin" class="boton boton-verde"> Volver </a>

    <?php foreach ($errores as $error) :  ?>
        <div class="alerta error">
            <?php echo $error;   ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="POST" enctype="multipart/form-data"> 

    <?php include __DIR__ . '/formularioblog.php'; ?>
    <input type="submit" value="Dar de Alta" class="boton boton-verde">

    </form>
    

</main>