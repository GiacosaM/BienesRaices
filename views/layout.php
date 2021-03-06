<?php 
    
    //var_dump($_SESSION);

    if (!isset ($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false; // Si esta autenticado muestra True, sino le asigno null

    if (!isset ($inicio)){
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../public/build/css/app.css">
    
</head>
<body>
        <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> 
            <div class="contenedor contenido-header"> 
                
                <div class="barra">
                    <a href="/public/">
                        <img src="../public/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                    </a>
                    <div class="mobile-menu">
                        <img src="../public/build/img/barras.svg" alt="Icono Menu responsive">
                    </div>
                    <div class="derecha">
                        <img class="dark-mode-boton" src="../public/build/img/dark-mode.svg">
                        <nav data-cy= "navegacion-header" class="navegacion">
                            <a href="nosotros">Nosotros</a>
                            <a href="propiedades">Propiedades</a>
                            <a href="blog">Blog</a>
                            <a href="contacto">Contacto</a>
                            <?php if (!$auth): ?>
                                <a href="login">login</a>
                            <?php endif; ?>
                       
                            <?php if ($auth): ?>
                                <a href="crearblog">Alta en Blog</a>
                                <a href="logout">Cerrar Sesion</a>
                            <?php endif; ?>

                        </nav>
    
                    </div>
                    

                </div>
                <?php 
                    if ($inicio) {
                        echo "<h1 data-cy='heading-sitio'>Venta de Departamentos y casas Exclusivos de lujo</h1>";
                    }
                ?>
                

            </div>
        </header>

        <?php echo $contenido; ?>

        
        <footer class="footer seccion">
        <div  class="contenedor contenedor-footer">
            <nav data-cy= "navegacion-footer" class="navegacion">
            <a href="nosotros">Nosotros</a>
            <a href="propiedades">Propiedades</a>
            <a href="blog">Blog</a>
            <a href="contacto">Contacto</a>
            </nav>
        </div>

        
        <p data-cy ="copyright" class="copyright"> Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../public/build/js/bundle.min.js"> </script>
    <!--Agrego Modernizer al sitio para que los nav. soporten imagenes Webp --->
</body>

</html>
