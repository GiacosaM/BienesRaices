<?php 
    
    //var_dump($_SESSION);

    if (!isset ($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false; // Si esta autenticado muestra True, sino le asigno null
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
    
</head>
<body>
        <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> 
            <div class="contenedor contenido-header"> 
                
                <div class="barra">
                    <a href="/">
                        <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                    </a>
                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="Icono Menu responsive">
                    </div>
                    <div class="derecha">
                        <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                        <nav class="navegacion">
                            <a href="nosotros.php">Nosotros</a>
                            <a href="anuncios.php">Anuncios</a>
                            <a href="blog.php">Blog</a>
                            <a href="contacto.php">Contacto</a>
                            <?php if ($auth): ?>
                                <a href="cerrar-sesion.php">Cerrar Sesion</a>
                            <?php endif; ?>

                        </nav>
    
                    </div>
                    

                </div>
                <?php 
                    if ($inicio) {
                        echo "<h1> Venta de Departamentos y casas Exclusivos de lujo </h1>";
                    }
                ?>
                

            </div>
        </header>

        