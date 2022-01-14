<?php
namespace MVC;
class Router {

        public $rutasGET = [];
        public $rutasPOST = [];

        public function get($url, $fn) {
            $this->rutasGET[$url]= $fn;
        }

        public function post($url, $fn) {
            $this->rutasPOST[$url]= $fn;
        }

        public function comprobarRutas() {
            session_start();
            $auth = $_SESSION['login'] ?? null;

            //Arreglos de rutas protegidas
            $rutas_protegidas =['/admin', '/crear', '/actualizar', '/eliminar', '/crearv', '/actualizarv', '/eliminarv'];


            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if ($metodo === 'GET') {
                $fn= $this->rutasGET[$urlActual] ?? null;
            } else {
                
                $fn= $this->rutasPOST[$urlActual] ?? null;
            }
            //proteger las rutas 
            if (in_array($urlActual, $rutas_protegidas) && !$auth) {
                header('Location: /public');

            }



            if ($fn) {
                // La URL existe y hay una funcion asociada
                call_user_func($fn, $this); 
            } else {
                echo "pagina no encontrada";
            }
        }

        // Muestra una Vista
        public function render ($view, $datos = []) {
            foreach($datos as $key => $value) {
                $$key = $value; // Variable de Variable
             }

            ob_start(); // Almacenamiento en memoria surante un momento 
            
            include_once __DIR__ . "/views/$view.php";
            $contenido = ob_get_clean(); // Limpia el Biffer 

            include_once __DIR__ . "/views/layout.php";

        }


}