<?php

require_once __DIR__. '/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';
require_once __DIR__ .'/../layout/navbar.php';

?>

<table>
<tr>
    <th>userId</th>
    <th>userName</th>
    <th>email</th>
    <th>pwd</th>
    <th>photo</th>
    <th>Operation</th>
</tr>

<?php

$sth = $pdo -> query("SELECT * FROM users");
$rows = $sth ->fetchAll();
$result = count($rows);
// var_dump($rows);
// var_dump($result);
//判断数据有多少行，如果超过0，则可以展示
if(count($rows)>0){
    foreach($rows as $row){
        echo "<tr><td>". $row["userId"] ."</td>
                  <td>". $row["userName"] ."</td>
                  <td>". $row["email"] ."</td>
                  <td>". $row["pwd"] ."</td>
                  <td>". $row["photo"] ."</td>
                  <td><a href='index.php?id=".$row["userId"]."' class='btn'>Delete</a></td>
             </tr>";
    }} else {
        echo "0 result";
    }

    

?>
</table>