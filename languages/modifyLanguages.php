<?php

require_once __DIR__ .'/../bdd/pdo.php';
require_once __DIR__ .'/../layout/header.php';

    // prepare an SQL statement to update a record in the database
    $stmt = $pdo->prepare("UPDATE languages SET languageCode = :languageCode, languageName = :languageName WHERE languageId = :id");

    // bind the values for the parameters in the SQL statement
    $stmt->bindParam(":languageCode", $value1);
    $stmt->bindParam(":languageName", $value2);
    $stmt->bindParam(":id", $id);

    // set the values of the variables used in the SQL statement
    $value1 = "es";
    $value2 = "Espagnol";
    $id = 4;

    $count=$stmt->execute();
    // execute the SQL statement
    if($count > 0){
        echo"update successfully"
    }else{
        echo "unable to update";
    };
