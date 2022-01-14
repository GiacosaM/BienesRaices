<?php
namespace Controllers;

use MVC\Router;
use Model\Blog;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController
{
    public static function crear(Router $router) {

       

        $blog = new Blog;
        
        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Crea una nueva instancia */
            $blog = new blog($_POST['blog']);
           
            

            /** Subida de archivo */
            // Generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // Crea un nombre aleatorio.

            // Setear la imagen
            // Realiza un resize a la imagen con intervetion
            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImagen($nombreImagen);
            }

            //Validar

            $errores = $blog->validar();
            

            // Revisar que el arreglo de errores este vacio 
            if (empty($errores)) {


                // Crear la Carpeta para Subir Imagenes.

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la base de datos 
                
                $blog->guardar();
            }
        }

        $router->render('blog/crear', [
            'blog' => $blog,
            'errores' => $errores

        ]);
    }   

    public static function blog (Router $router) {
        $blog = Blog::all();
        

        $router->render('blog/blog', [
            'blog' => $blog

        ]);
    }
}