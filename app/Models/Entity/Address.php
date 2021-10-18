<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Address extends BaseModel
{
    public ?int $id = null;
    
    public string $street;

    public string $state;

    public string $complement;

    public string $table = 'address';

    public function __construct(string $street, string $state, string $complement)
    {
        $this->street = $street;
        $this->state = $state;
        $this->complement = $complement;
    }
}