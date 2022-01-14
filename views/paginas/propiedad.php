<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="titulo-propiedad"> <?php echo $propiedad->titulo ?> </h1>

    <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ?>" alt="imagen de la proiedad">


    <div class="resumen-propiedad">
        <p class="precio"> $ <?php echo $propiedad->precio ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy " src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo $propiedad->wc ?></p>
            </li>

            <li>

                <img class="icono" loading="lazy " src="build/img/icono_estacionamiento.svg" alt="icono parking">
                <p><?php echo $propiedad->habitaciones ?></p>

            </li>

            <li>

                <img class="icono" loading="lazy " src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                <p><?php echo $propiedad->estacionamiento ?></p>
            </li>
        </ul>

        <p><?php echo $propiedad->descripcion ?></p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptas voluptate expedita
            consequatur temporibus maiores nam soluta ipsa mollitia enim distinctio nihil quod, repellendus ex
            impedit, ut cumque atque illo?</p>

    </div>

</main>