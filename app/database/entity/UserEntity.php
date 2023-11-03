<?php

namespace app\database\entity;

class UserEntity extends Entity
{
    public function emailIsValid()
    {
        if (!isset($this->attributes["email"])) {
            throw new \Exception("Email fild does not exists.");
        }

        return filter_var($this->attributes["email"], FILTER_VALIDATE_EMAIL);
    }


    public function setPasswordHash(string $password)
    {
        $this->attributes["password"] = md5($this->attributes["password"]);
    }
}
