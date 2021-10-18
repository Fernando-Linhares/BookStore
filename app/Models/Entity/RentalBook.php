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

    public function __construct(int $book_id, int $costumer_id, string $rental_date)
    {
        $this->book_id = $book_id;
        $this->costumer_id = $costumer_id;
        $this->rental_date = $rental_date;
    }
}