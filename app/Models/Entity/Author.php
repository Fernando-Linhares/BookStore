<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Author extends BaseModel
{
    public ?int $id = null;
    
    public string $first_name;

    public string $last_name;

    public string $table = 'authors';

}