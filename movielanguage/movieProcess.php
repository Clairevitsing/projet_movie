<?php
session_start();
$_SESSION['isConnected']=false;
require_once __DIR__ . '/../bdd/pdo.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/navbar.php';



    if(($_POST['movieId'])===null || ($_POST['languageId'])===null){
         header('Location:index.php');
         exit;
         }

         if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
            $img_tmp_path = $_FILES['picture']['tmp_name'];
            var_dump($_FILES['picture']);
            $img_name = $_FILES['picture']['name'];
            $img_upload_path = './assets/images/' . $img_name;
            var_dump($img_upload_path);

            if (move_uploaded_file($img_tmp_path, $img_upload_path)) {
              // 檔案已成功上傳，進行資料庫操作
              $query= "INSERT INTO movies_languages VALUES (:movieId, :languageId, :title, :description, :poster)";
                $stmt = $pdo->prepare($query);
                $stmt ->execute([
                  'movieId' => $_POST['movieId'],
                  'languageId' => $_POST['languageId'],
                  'title' => $_POST['Title'],
                  'description' => $_POST['Description'],
                  'poster' => $img_upload_path
                ]);
             
            } else {
                echo 'Error: '. $img_tmp_path;
            }}

               


require_once __DIR__ . '/../layout/footer.php';
?>