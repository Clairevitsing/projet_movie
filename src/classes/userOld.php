<?php
namespace App;

class user
{
    private string $username;
    private string $email;
    private string $pwd;
    private string $photo;


    public function __construct(string $username, ?string $email, string $pwd, string $photo)
    {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->photo = $photo;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPwd(): string
    {
        return $this->pwd;
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }
}