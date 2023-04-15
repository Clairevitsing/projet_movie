<?php

require_once __DIR__ .'/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';

// Create connection  - Gestion de langues (Liste, Ajout, Modification, Suppression)
// $conn = new mysqli($dsn, $dbUser, $dbPassword, $dbname);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// $langId = "1";
// $langCode = "En";
// $langName = "English";

// $langId = "2";
// $langCode = "Fr";
// $langName = "French";

// $langId = "3";
// $langCode = "Zh";
// $langName = "Chinese";

// $langId = "9";
$langCode = "Jpn";
$langName = "Japanese";

$result = $pdo->prepare("SELECT * FROM languages WHERE languageName= :langName");
$query = $result->execute([
  'langName'=>$langName]);
var_dump($query);

$test = $result->fetch();
var_dump($test);
// var_dump(count($test));

// in order to verify if there is an douplicate
if($test>0 ){
  echo "The languages already exists"; 
}
else
{$stmt = $pdo->prepare("INSERT INTO languages (languageCode, languageName)
  VALUES 
  (:languageCode,:languageName)");
  $stmt->bindParam(":languageCode",$langCode);
  $stmt->bindParam(":languageName",$langName);
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Unable to create record";
  }
  
}

?>