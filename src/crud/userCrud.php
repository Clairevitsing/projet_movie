<?php
namespace App\Crud;

use App\User\userRegister;
use PDO;
use PDOException;

//Create/Read/Update/Delete

class UserCrud
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(UserRegister $user)
    {
        $query = "INSERT INTO users VALUES (null, :username, :email, :pwd, :photo)";
        $stmt = $this ->pdo ->prepare($query);
        $stmt->execute([
            "username" => $user->getUserName(),
            "email" => $user->getEmail(),
            "pwd" => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            "photo" => $user->getphoto()
        ]);

    }

    public function read():array
    {
        return [];
    }

    public function update(int $id, array $data)
    {
    }

    public function delet(int $id)
    {  
    }
}