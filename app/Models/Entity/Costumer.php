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

    public function __construct(
        string $first_name,
        string $last_name,
        bool $is_paid,
        int $to_pay_id,
        int $address_id
        )
    {
        $this->address_id = $address_id;
        $this->is_paid = $is_paid;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->to_pay_id = $to_pay_id;
        
    }
}