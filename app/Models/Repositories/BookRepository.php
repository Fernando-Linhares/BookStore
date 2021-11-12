<?php
namespace App\Models\Repositories;

use App\Models\Entity\{
    Book,
    Author,
    BooksCategories,
    Category,
    Description
};

use App\Models\Entity\Group\BooksGroup;
use Application\Pagination\Pages;

class BookRepository
{
    private Book $book;
    private Author $author;
    private BooksCategories $bookscategories;

    public function __construct()
    {
        $this->author = new Author;
        $this->book = new Book;
        $this->bookscategories = new BooksCategories;
    }

    public function getAllPaginated(int $limit, int $offset=0)
    {
        return $this->bookscategories
        ->join(Book::class)
        ->join(Author::class)
        ->join(Category::class)
        ->join(Description::class)
        ->paginate($limit, $offset,new Book ,BooksGroup::class);
    }

    public function getPages(int $limit,$page): Pages
    {
        return new Pages($this->book->count(), $limit, $page);
    }

    public function count()
    {
        return $this->book->count();
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