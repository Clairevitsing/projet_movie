<?php
session_start();
$_SESSION['isConnected']=false;
require_once __DIR__ . '/../bdd/pdo.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/navbar.php';


if (isset($_POST['register']) && isset($_FILES['picture'])&& $_FILES['picture']['error'] === UPLOAD_ERR_OK)  {

  $img_name = $_FILES['picture']['name'];
  $img_size = $_FILES['picture']['size'];
  $img_tmp_name = $_FILES['picture']['tmp_name'];
  $img_type = $_FILES['picture']['type'];
  $img_error = $_FILES['picture']['error'];

  if ($img_error === 0) {
    if ($img_size > 125000) {
      $em = "Sorry, your photo is too large.";
      header("Location:signup.php?error=$em");
    } else {
      $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_extension_lc = strtolower($img_extension);
      $allowed_extension = array('png', 'jpg', 'jpeg', 'webp');

      if (in_array($img_extension_lc, $allowed_extension)) {
        $picture= uniqid("IMG-") . '.' . $img_extension_lc;
        $img_upload_path = './assets/images/' . $img_name;
        if (move_uploaded_file($img_tmp_name, $img_upload_path)) {

            $query = "INSERT INTO movies_languages VALUES (:movieId,:languagesId,:title,:description,:poster)";
            $stmt = $pdo->prepare($query);
            $insert = $stmt->execute([
              'movieId' => $_POST['movieId'],
              'languageId' => $_POST['languageId'],
              'title' => $_POST['title'],
              'description' => $_POST['description'],
              'poster' => $img_upload_path
            ]);
            //how to insert the photos
            if ($insert) {
              echo "The movie was added!";
            } else {
              $em = "unable to add!";
              header("Location:movieslanguages.php?error=$em");
            } 
        } else {
          $em = "can't find the images";
          header("Location: movieslanguages?error=$em");
        }
      } else {
        $em = "You can't upload images of this type";
        header("Location:movieslanguages?error=$em");
      }
    }
  } else {
    $em = "unknown error occurred!";
    header("Location:movieslanguages?error=$em");
  }
} else {
  header("Location:movieslanguages.php");
}
