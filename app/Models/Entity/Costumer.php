<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Costumer extends BaseModel
{
    public ?int $id = null;
    
    public string $first_name;

    public string $last_name;

    public bool $is_paid;

    public int $to_pay_id;

    public int $address_id;

    public string $table = 'costumers';
}