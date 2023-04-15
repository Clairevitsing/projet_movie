<?php
session_start();
$title = "Accueil Page";
$_SESSION['isConnected']=false;
require_once __DIR__. '/bdd/pdo.php';
require_once __DIR__ .'/layout/header.php';
require_once __DIR__ .'/layout/navbar.php';
?>

<!-- <div class="welcome">
    <p>Hello <?php echo $_GET['username']?> </p> 
</div> -->

<div class=mainpage>
    <h1>Welcome to the multilingual movie site</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos laudantium, esse dolorem ad modi dolor sint
         saepe quos iste animi laboriosam. Quod aperiam praesentium pariatur vel nobis quae accusantium id.</p>

</div>



<?php 
require_once __DIR__ . '/layout/footer.php';
?>
