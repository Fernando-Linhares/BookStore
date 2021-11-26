<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class RentalBook extends BaseModel
{
    public ?int $id = null;
    
    public bool $is_paided;

    public string $rental_date;

    public int $book_id;

    public int $to_pay_id;

    public int $costumer_id;

    public string $table = 'rental_book';
}