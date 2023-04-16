<?php
session_start();
require_once 'vendor/autoload.php';
$_SESSION['isConnected']=false;
require_once 'layout/header.php';
require_once 'layout/navbar.php';

require_once __DIR__. '/../functions/functions.php';
require_once __DIR__. '/../src/classes/registerError.php';

use App\Crud\UserCrud;
use App\User\Exception\UserRegisterException;
use App\User\UserRegister;
use App\Utils;

['email'=>$email, 'password'=>$password]=$_POST;

//si email ou password est null, alors l'utilisation du formaulaire n'est pas correcte
if ($email === null || $password === null) {
   Utils ::redirect("index.php");
}

require_once 'bdd/pdo.php';

try{
  $newUser =new UserRegister($user, $email, $password,$photo);
  $crud = new UserCrud($pdo);
  $crud->create($newUser);
}catch(UserRegisterException $e){
 $_SESSION['flash_msg'] = $e->getMessage();
 Utils ::redirect("signup.php");
  // echo "register error: ".$e->getMessage();
}catch(PDOException $e){
  $_SESSION['flash_msg'] = $e->getCode(). "/" . $e->getMessage();
  // echo "error while creating user: ".$e->getMessage()."/". 
  Utils ::redirect("signup.php");
}

// $session = new Session($user);
echo "your are now logged in";
