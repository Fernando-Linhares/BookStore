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

    public function __construct($id,$name,$author_id,$book_cover,$published_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->book_cover = $book_cover;
        $this->author_id = $author_id;
        $this->published_at;
    }
}