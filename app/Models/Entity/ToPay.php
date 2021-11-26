<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class ToPay extends BaseModel
{
    public ?int $id = null;
    
    public float $value;
    
    public int $fees;
    
    public string $table = 'to_paies';
}