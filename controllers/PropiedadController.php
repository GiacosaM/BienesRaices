<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores



        ]);
    }



    public static function crear(Router $router)
    {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con Mensajes de errores 
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Crea una nueva instancia */
            $propiedad = new Propiedad($_POST['propiedad']);
            

            /** Subida de archivo */
            // Generar un nombre unico 
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // Crea un nombre aleatorio.

            // Setear la imagen
            // Realiza un resize a la imagen con intervetion
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            //Validar

            $errores = $propiedad->validar();

            // Revisar que el arreglo de errores este vacio 
            if (empty($errores)) {


                // Crear la Carpeta para Subir Imagenes.

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la base de datos 
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores

        ]);
    }


    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('admin'); // Valida el ID del GET, sino redirecciona al 'Admin'
        

        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();

        

        $router->render('propiedades/actualizar', [
            'propiedad'=> $propiedad,
            'errores'=>$errores,
            'vendedores'=>$vendedores
        ]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los atributos 
            
            $args = $_POST['propiedad'];
            
            $propiedad->sincronizar($args);
        
            // Validacion
            $errores = $propiedad->validar();
        
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // Crea un nombre aleatorio.
        
            //Subida de Archivos
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
                
            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
        
                //Almacenar Imagen 
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
        
        
                $resultado = $propiedad->guardar();
            }
        }


    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
        
                if (ValidarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                  
                }
            }
        }
    }

    
}
