<?php
session_start();
$_SESSION['isConnected']=false;
require_once __DIR__ . '/../bdd/pdo.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/navbar.php';
// require_once __DIR__. '/../movielanguage/moviesUpload.php';

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
              <h2 class="text-uppercase text-center mb-5">Add a film</h2>

			  <form method="POST" action="moviesUpload.php" enctype="multipart/form-data">

               <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg"  name="movieId" placeholder="movieId" required />
                  <label class="form-label" for="form3Example1cg"></label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg"  name="languageId" placeholder="languageId" required />
                  <label class="form-label" for="form3Example1cg"></label>
                </div>


                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg"  name="Title" placeholder="Title" required />
                  <label class="form-label" for="form3Example1cg"></label>
                </div>

                <div class="form-outline mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" ></label>
                    <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" name="Description" placeholder="Description" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label"> </label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="Picture" />
                </div>


                <div class="d-flex justify-content-center">
                        <button type="submit" name="register"
                          class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
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