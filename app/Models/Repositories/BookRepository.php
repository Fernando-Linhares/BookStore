<?php
namespace App\Models\Repositories;

use App\Models\Entity\{
    Book,
    Author,
    BooksCategories,
    Category
};
use App\Models\Entity\Group\BooksGroup;

class BookRepository
{
    private Book $book;
    private Author $author;

    public function __construct()
    {
        $this->author = new Author;
        $this->book = new Book;
    }

    public function getAll()
    {
        return $this->book
        ->join(Author::class)
        ->join(Category::class)
        ->join(Description::class)
        ->join(BooksCategories::class)
        ->get(BooksGroup::class);
    }

    public function join(string $entityName)
    {
        return $this->book->join($entityName);
    }

    public function find(int $id)
    {
        return $this->book->find($id);
    }

    public function getAllWithAuthors()
    {
        return $this->book->with('author_id');
    }

    public function getAuthor()
    {
        $author_id = $this->book->author_id;
        return $this->author->find($author_id);
    }

}