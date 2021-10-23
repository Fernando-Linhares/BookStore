<?php
namespace App\Models\Repositories;

use App\Models\Entity\Book;

class BookRepository
{
    private Book $book;

    public function __construct()
    {
        $this->book = new Book;
    }

    public function getAll()
    {
        return $this->book->all();
    }

    public function find(int $id)
    {
        return $this->book->find($id);
    }
}