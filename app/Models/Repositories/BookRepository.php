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
    private Category $categories;   

    public function __construct(){
        $this->book = new Book;
        $this->author = new Author;
        $this->categories = new Category;
        $this->bookscategories = new BooksCategories;
    }

    public function getAllPaginated(int $limit=10, int $offset=0)
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

    public function create(object $request): bool
    {
        $request = $request->all();
        $this->book->title = $request->title;
        $this->book->setDescription($request->description);
        $this->book->book_cover = $request->image;
        $this->book->setAuthor($request->author);
        $this->book->published_at = $request->date;
        if($this->book->save()){
            $category_id = $this->categories->where('name',$request->category)->id;
            $this->bookscategories->book_id = $this->book->getLast()->id;
            $this->bookscategories->category_id = $category_id;
            return $this->bookscategories->save();
        }

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

    public function getAllAuthors()
    {
        return $this->author->all();
    }

    public function getAllCategories()
    {
        return $this->categories->all();
    }

    public function getAuthor()
    {
        $author_id = $this->book->author_id;
        return $this->author->find($author_id);
    }
}