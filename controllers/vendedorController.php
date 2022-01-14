<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;


class VendedorController
{



    public static function crear(Router $router)
    {
        // Arreglo con Mensajes de errores 
        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor();
        

        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //crear una instancia nueva
        $vendedor = new Vendedor(($_POST['vendedor']));

        $errores = $vendedor->validar();
        

        // no hay errores
        if (empty($errores)) {
    
        $vendedor->guardar();
            }

        }

        $router->render('propiedades/crearv', [
            'errores' => $errores,
            'vendedor' => $vendedor
            

        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('admin'); // Valida el ID del GET, sino redirecciona al 'Admin'
        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        $router->render('propiedades/actualizarv', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los atributos 
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
            // Validacion
            $errores = $vendedor->validar();
            $resultado = $vendedor->guardar();
        }
    }






    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
        
                $tipo = $_POST['tipo'];
        
                if (ValidarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                  
                }
            }
        }
    }
}
