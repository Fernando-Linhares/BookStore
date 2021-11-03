<?php
namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Book extends BaseModel
{
    public ?int $id = null;

    public string $title;
    
    public string $book_cover;

    public int $decription_id;

    public int $author_id;

    public string $published_at;

    public string $table = 'books';

}