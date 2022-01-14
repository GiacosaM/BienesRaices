<?php
namespace Model;

class Admin Extends ActiveRecord {
    // Base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB =['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args=[]) 
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';        
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] ="El email es obligatorio";
        }

        if (!$this->password) {
            self::$errores[] ='La password es obligatoria';
        }

        return self::$errores;
    }

    public function existeUsuario() {

        //Rivisar si un usuario existe
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . " ' LIMIT 1 ";
        
        $resultado = self::$db->query($query);

        if (!$resultado->num_rows){
            self::$errores[] = "El usuario NO existe";
            return;
        }
        return $resultado;

    }

    public function comprobarPassword($resultado) {
        $usuraio = $resultado->fetch_object();
        

        $autenticado = password_verify($this->password, $usuraio->password);

        if (!$autenticado) {
            self::$errores[]= 'El password es incorrecto';
        }
        return $autenticado;
    }

    public function autenticar (){
        session_start();
        //Llenar el arreflo de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: admin');
    }


}