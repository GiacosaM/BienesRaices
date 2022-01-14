<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController {
    public static function index (Router $router) {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio

        ]);
    }

    public static function nosotros (Router $router) {
        $router->render('paginas/nosostros');
    }
    public static function propiedades (Router $router) {

        $propiedades = Propiedad::all();
        $inicio = true;

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
            'inicio' => $inicio

        ]);
    

    }

    public static function propiedad (Router $router) {
        $id = $_GET["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

            if (!$id) { // Verifico que manden el id por el GET, sino lo redirijo al Home
                 header('Location: /');
            }

        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad

        ]);


    }

    
    public static function entrada () {
        echo "desd entrada";
    }
    public static function contacto (Router $router) {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $respuestas = $_POST['contacto'];
            
        // Crear una Instacia de PHPMailer
        $mail = new PHPMailer();

        // Confirgurar SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'f9560dbf0602cf';
        $mail->Password = '3bdd2497cd7970';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        // Configurar el contenido del email
        $mail->setFrom('admin@bienesraices.com');
        $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
        $mail->Subject ='Tienes un nuevo mensaje';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        // Definir el contenido
        $contenido = '<html>';
        $contenido .= '<p>Tienes un nuevo mensaje </p>'; 
        $contenido .= '<p>Nombre:' . $respuestas['nombre'] . '</p>'; 
        

        // Enviar en forma condicional algunos campos de email o telefono 
        if ($respuestas['contacto'] === 'telefono') {   
            $contenido .= '<p> Eligio ser contactado por Telefono </p>';
            $contenido .= '<p>Telefono:' . $respuestas['telefono'] . '</p>';
            $contenido .= '<p>Fecha Contacto:' . $respuestas['fecha'] . '</p>';   
            $contenido .= '<p>Hora Contacto:' . $respuestas['hora'] . '</p>';   

        } else {
            $contenido .= '<p> Eligio ser contactado por email </p>'; 
            $contenido .= '<p>Email:' . $respuestas['email'] . '</p>';
        }

        
        $contenido .= '<p>Mensaje:' . $respuestas['mensaje'] . '</p>';
        $contenido .= '<p>Vende o Compra:' . $respuestas['tipo'] . '</p>'; 
        $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';
        $contenido .= '<p>Prefiere ser contactado por:' . $respuestas['contacto'] . '</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $mail->AltBody = 'Esto es texto sin HTML';


        // Enviar el email 
        if ($mail->send()){
            $mensaje = "Mensaje enviado correctamente";
        } else {
            $mensaje= "El mensaje no se pudo enviar";
        }


        }

        
        $router->render('paginas/contacto', [
            'mensaje'=>$mensaje
        ]);
    }
    
}