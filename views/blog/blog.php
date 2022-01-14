<main class="contenedor seccion contenido-centrado">
            <h1> Nuestro Blog</h1>


<?php foreach($blog as $blog) {  ?> 
            
         



    <section>
        

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                        <img loading="lazy" src="/public/imagenes/<?php echo $blog->imagen;?>" alt="anuncio">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4> <?php  echo $blog->titulo; ?> </h4>
                        <p class="informacion-meta">Escrito el: <span><?php  echo $blog->creado; ?></span> por: <span>Admin</span></p>
                        <p>
                        <?php  echo $blog->descripcion; ?>
                        </p>
                    </a>

                </div>


            </article>

            <?php } ?>
            </section>

           
        </main>

