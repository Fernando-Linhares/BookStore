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
}