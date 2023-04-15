<?php

//gestion de charger la class
require_once 'vendor/autoload.php';   //un chemin relatif

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();

$dotenv ->loadEnv(__DIR__ .'/.env');   //chaine de caractère transmettre un chemin absolu

$test = true;

