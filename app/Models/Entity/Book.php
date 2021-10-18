<?php
namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Book extends BaseModel
{
    public ?int $id = null;

    public string $title;
    
    public string $book_cover;

    public int $author_id;

    public string $published_at;

    public string $table = 'books';

    public function __construct(
        string $title,
        string $book_cover,
        int $author_id,
        string $published_at
        )
    {
        $this->title = $title;
        $this->book_cover = $book_cover;
        $this->author_id = $author_id;
        $this->published_at = $published_at;
    }
}