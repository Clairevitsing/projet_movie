<?php
require_once __DIR__ .'/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';
?>

<table>
<tr>
    <th>movieId</th>
    <th>EnglishTitle</th>
    <th>Operation</th>
</tr>


<?php
$englishTitle = "Beyond the Clouds";

$query = $pdo->prepare("SELECT * FROM movies WHERE englishTitle= :englishTitle");
$result = $query->execute([
  'englishTitle'=>$englishTitle]);
var_dump($result);

$test = $query->fetch();
var_dump($test);


// in order to verify if there is an douplicate
if($test !== false){
  echo "This movie already exists"; 
}
else
{$stmt = $pdo->prepare("INSERT INTO movies (englishTitle)
                        VALUES (:englishTitle)");
  $stmt->bindParam(":englishTitle",$englishTitle);
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Unable to create record";
  }
  
}

?>