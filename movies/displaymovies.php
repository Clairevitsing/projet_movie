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
$sth = $pdo -> query("SELECT * FROM movies");
$rows = $sth ->fetchAll();
$result = count($rows);
// var_dump($rows);
// var_dump($result);
//判断数据有多少行，如果超过0，则可以展示
if(count($rows)>0){
    foreach($rows as $row){
        echo "<tr><td>". $row["movieId"] ."</td>
                  <td>". $row["englishTitle"] ."</td>
                  <td><a href='index.php?id=".$row["movieId"]."' class='btn'>Delete</a></td>
             </tr>";
    }} else {
        echo "0 result";
    }

    

?>
</table>