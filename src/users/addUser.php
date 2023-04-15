<!--将用户注册的信息写入数据库-->
<?php
require_once __DIR__. '/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';
require_once __DIR__ .'/../layout/navbar.php';

$first =  $_POST['first'];
$last =  $_POST['last'];
$email =  $_POST['email'];
$userName =  $_POST['username'];
$pwd =  $_POST['pwd'];

$sql = "INSERT INTO users (firstName, lastName, userEmail, username, userPwd)
       VALUES ('$first', '$last', '$email','$username', '$pwd');";

header("Location: ../index.php?signup=success");  //这个命令需要重新修改