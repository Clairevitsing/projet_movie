
<?php

require_once __DIR__ .'/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $stmt = $pdo -> prepare("DELETE FROM languages WHERE languageId= ?");  
    $stmt->execute([$id]);
    if ($stmt->rowCount()>0) {
        echo "record deleted successfully";
        header("location:displayLanguages.php");
      } else {
        echo "Unable to delete record";
      }
}

?>

<table>
<tr>
    <th>languageId</th>
    <th>languageCode</th>
    <th>languageName</th>
    <th>Operation</th>
</tr>

<?php

$sth = $pdo -> query("SELECT * FROM languages");
$rows = $sth ->fetchAll();
$result = count($rows);
// var_dump($rows);
// var_dump($result);
//判断数据有多少行，如果超过0，则可以展示
if(count($rows)>0){
    foreach($rows as $row){
        echo "<tr><td>". $row["languageId"] ."</td>
                  <td>". $row["languageCode"] ."</td>
                  <td>". $row["languageName"] ."</td>
                  <td><a href='deleteLanguages.php?id=".$row["languageId"]."' class='btn'>Delete</a></td>
             </tr>";
    }} else {
        echo "0 result";
    }

    

?>
</table>

