<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class BooksCategories extends BaseModel
{
    public ?int $id = null;
    
    public int $category_id;

    public int $book_id;

    public string $table = 'books_categories';

    public function __construct(int $category_id, int $book_id)
    {
        $this->category_id = $category_id;
        $this->book_id = $book_id;
    }
}