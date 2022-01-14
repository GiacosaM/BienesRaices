<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectarn os a la BD
$DB = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($DB);

