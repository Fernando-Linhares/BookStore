<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class User extends BaseModel
{
    public ?int $id = null;
    
    public string $first_name;

    public string $last_name;

    public string $image = 'none';

    public string $email;

    public string $password;

    public string $created_at;

    public string $updated_at;

    public string $table = 'users';

    public function getUserName()
    {
        return $this->first_name .'&nbsp&nbsp'. $this->last_name;
    }

    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}