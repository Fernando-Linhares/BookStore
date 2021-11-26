<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Customer extends BaseModel
{
    public ?int $id = null;
    
    public string $first_name;

    public string $last_name;

    public int $addres_id;

    public string $table = 'customers';

    public function getName()
    {
        return $this->first_name . '  '. $this->last_name;
    }
}