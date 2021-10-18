<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class User extends BaseModel
{
    public ?int $id = null;
    
    public string $first_name;

    public string $last_name;

    public string $email;

    public string $password;

    public string $created_at;

    public string $updated_at;

    public string $table = 'users';

    public function __construct(
        string $first_name,
        string $last_name,
        string $email,
        string $password,
        string $created_at,
        string $updated_at
    )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}