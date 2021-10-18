<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Category extends BaseModel
{
    public ?int $id = null;
    
    public string $name;

    public string $table = 'categories';

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}