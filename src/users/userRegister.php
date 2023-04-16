<?php

namespace App\User;
use App\User\Exception\UserRegisterException;

class UserRegister
{
    public function __construct(
        private string $userName,
        private string $email,
        private string $password,
        private string $photo
    ){
         if(!$this->emailIsValid()){
            throw new userRegisterException('Email is not valid');
        }
        if(!$this->passwordIsValid()){
            throw new userRegisterException('Password is not validm should be at least 6 characters long');
        }
    }

 
    private function emailIsValid():string
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function passwordIsValid():string
    {
        return mb_strlen($this->password) > 6;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }
}   