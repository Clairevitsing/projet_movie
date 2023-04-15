<?php
// session_start();
// $_SESSION['isConnected']=false;
require_once __DIR__. '/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';
require_once __DIR__ .'/../layout/navbar.php';
?>


<main role="main">

<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Users Album</h1>
<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
<p>
  <a href="#" class="btn btn-primary my-2">Main call to action</a>
  <a href="#" class="btn btn-secondary my-2">Secondary action</a>
</p>
</div>
</section>

<div class="album py-5 bg-light">
<div class="container">
<div class="row">

<?php

$sth = $pdo -> query("SELECT * FROM movies_languages WHERE");
$movies = $sth ->fetchAll();
    foreach($movies as $movie){
                                echo '<div class="col-md-2">';
                                  echo'<div class="card mb-4 box-shadow">';
                                    echo'<img class="rounded-circle"  src="'.$movie['poster'].'" alt="Card image cap" height = "200" width = "195">';
                                      echo '<div class="d-flex justify-content-between align-items-center">';
                                        echo '<div class="btn-group">';
                                          echo '<button type="button" class="btn btn-sm btn-outline-secondary" name="En">En</button>';
                                          echo '<button type="button" class="btn btn-sm btn-outline-secondary" name="Fr">Fr</button>';
                                          echo '<button type="button" class="btn btn-sm btn-outline-secondary" name="中文">中文</button>';
                                        echo '</div>';
                                        echo '<small class="text-muted">'.$data['userName'].'</small>';
                                      echo '</div>';
                                    echo '</div>';
                                    };
  ?> 



</div>
</div>
</div>
</div>
 
</main>

<?php 
require_once __DIR__ . '/../layout/footer.php';
?>