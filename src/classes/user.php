<?php
namespace App\User;

use App\User\Exception\UserLoginException;
use PDO;

class User
{

    public function __construct(
        PDO $pdo,
        private string $email, 
        private string $pwd
        ){
            $query="SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
             $stmt->execute(['email'=>$email]);
            $passDatabase = $stmt ->fetch();

            if ($passDatabase===false) {
                throw new UserLoginException("this mail is not registered");
             }
          
             $hashedPassword = $passDatabase['pwd'];
             if(password_verify($pwd,$hashedPassword)===false){
                throw new UserLoginException("this password is not correct");
             }
        }

        public function getEmail():string
        {
            return $this->email;
        }
        public function getPwd():string
        {
            return $this->pwd;
        }
    }