<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class RentalBook extends BaseModel
{
    public ?int $id = null;
    
    public int $book_id;

    public int $costumer_id;

    public string $rental_date;

    public string $table = 'rental_book';
}