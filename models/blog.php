<?php
namespace Model;

class Blog extends ActiveRecord {
    protected static $tabla= 'blog';
    protected static $columnaDB = ['id', 'titulo', 'descripcion', 'usuarioid', 'creado', 'imagen'];

    public $id;
    public $titulo;
    public $descripcion;
    public $usuarioid;
    public $creado;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->usuarioid = $args['usuarioid'] ?? '6';
        $this->creado = date('Y/m/d');
        $this->imagen = $args['imagen'] ?? '';
        
    }

    public function validar()
        {
            if (!$this->titulo) {
                self::$errores[] = 'El Titulo es obligatorio';
            }

            if (!$this->descripcion) {
                self::$errores[] = 'La descripcion es obligatoria';
            }

            if (!$this->imagen) {
                self::$errores[] = 'La imagen es Obligatoria';
            }

            return self::$errores;
        }

}