<?php
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/navbar.php';
require_once __DIR__. '/functions/functions.php';
require_once __DIR__. '/src/classes/registerError.php';



if (isset($_POST['register']) && isset($_FILES['user_photo'])&& $_FILES['user_photo']['error'] === UPLOAD_ERR_OK)  {

  $img_name = $_FILES['user_photo']['name'];
  $img_size = $_FILES['user_photo']['size'];
  $img_tmp_name = $_FILES['user_photo']['tmp_name'];
  $img_type = $_FILES['user_photo']['type'];
  $img_error = $_FILES['user_photo']['error'];

  if ($img_error === 0) {
    if ($img_size > 125000) {
      $em = "Sorry, your photo is too large.";
      header("Location:signup.php?error=$em");
    } else {
      $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_extension_lc = strtolower($img_extension);
      $allowed_extension = array('png', 'jpg', 'jpeg', 'webp');

      if (in_array($img_extension_lc, $allowed_extension)) {
        $user_photo = uniqid("IMG-") . '.' . $img_extension_lc;
        $img_upload_path = './assets/images/' . $img_name;
        if (move_uploaded_file($img_tmp_name, $img_upload_path)) {


          $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
          $count = $query->execute([
            'email' => $_POST['email']
          ]);
          // var_dump($count);
          $test = $query->fetch();


          if ($test !== false) {
            echo 'Email already exists, you can try logging with the email.';
          } else {
            $query = "INSERT INTO users VALUES (null, :userName,:email, :pwd, :photo)";
            $stmt = $pdo->prepare($query);
            $insert = $stmt->execute([
              'userName' => $_POST['username'],
              'email' => $_POST['email'],
              'pwd' => password_hash($_POST['password'], PASSWORD_DEFAULT),     //对密码进行加密
              'photo' => $img_upload_path
            ]);
            //how to insert the photos
            if ($insert) {
              echo "Hello ".$_POST['userName']."welcome to our site"; 
              redirect('signup.php?error=' .$_POST['userName']);
            } else {
              redirect('signup.php?error=' .registerError::UNABLE_REGISTER);
            }
          }
        } else {
          redirect('signup.php?error=' .registerError::CANNOT_FIND_IMAGES);
        }
      } else {
        redirect('signup.php?error=' .registerError:: UNACCEPTED_FORMAT);
      }
    }
  } else {
    redirect('signup.php?error=' .registerError::UNKNOWN_ERROR);
  }
} else {
  redirect('signup.php');
}
