<?php
session_start();
$_SESSION['isConnected']===false;
require_once "layout/header.php";
require_once "layout/navbar.php";
?>

<div>
    <form action="" method="post">
        <input type="file" name="myfile"/>
        <input type="submit" value="Envoyer"/>
    </form>
</div>