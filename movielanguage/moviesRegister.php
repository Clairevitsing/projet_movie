
<?php
session_start();
$_SESSION['isConnected']=false;
require_once __DIR__ . '/../bdd/pdo.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/navbar.php';

require_once 'composer/vendor/autoload.php';

use App\Sesion\Sessoion;
use App\Utils;

$session =new Session();
if(!$session->isConnected()) {
  $sessuib->addFlash('please login first');
  Utils::redirect('login.php');
}

?>
<!-- //TODO. 制作一个button按钮 -->
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">movie Lists</h2>

         <!-- $session =new Session();
      
         
         if  -->

        <form method="POST" action="signup-process.php" enctype="multipart/form-data">
               <div class="btn-group mb-4">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" name='movieId'>
                      movieId
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">1</a></li>
                      <li><a class="dropdown-item" href="#">2</a></li>
                      <li><a class="dropdown-item" href="#">3</a></li>
                      <li><a class="dropdown-item" href="#">4</a></li>
                      <li><a class="dropdown-item" href="#">5</a></li>
                      <li><a class="dropdown-item" href="#">6</a></li>
                      <li><a class="dropdown-item" href="#">7</a></li>
                    </ul>
                </div>

                <div class="btn-group mb-4">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" name="languageId">
                      LanguageId(En=1,Fr=2,Zh=3)
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">1</a></li>
                      <li><a class="dropdown-item" href="#">2</a></li>
                      <li><a class="dropdown-item" href="#">3</a></li>
                    </ul>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg"  name="Title" placeholder="Title" required />
                  <label class="form-label" for="form3Example1cg"></label>
                </div>
                <div class="form-outline mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" name="Description"></label>
                    <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3">Description</textarea>
                </div>
                <div class="form-outline mb-4">
                    <label for="moviePicture" class="form-label">Profile Pictures. Max file size 50 MB </label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="moviePicture" />
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class=" btn btn-primary btn-lg btn-block mb-4">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
require_once __DIR__ . '/../layout/footer.php';
?>
```