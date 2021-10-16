<?php
namespace Application\Mvc\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Book extends BaseModel
{
    public ?int $id = null;

    public string $name;

    public int $author_id;

    public string $book_cover;

    public string $published_at;

    public string $table = 'books';

}