<?php

namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class BooksCategories extends BaseModel
{
    public ?int $id = null;
    
    public int $category_id;

    public int $book_id;

    public string $table = 'books_category';
}