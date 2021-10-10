<?php
namespace Tests\Database;

use PHPUnit\Framework\TestCase as TestBase;
use Application\Database\AccessToDatabase;
use Application\Mvc\Models\Entity\Book;

class AccessToDatabaseTest extends TestBase
{
    /**
     * 
     */
    public function GetAllRows(): void
    {
        //load consts with database configurations
        require "config/config.php";

        $accessdatabase = new AccessToDatabase("books");

        //testing if has more than 0 products
        $all = count($accessdatabase->all()) > 0;
        
        $this->assertTrue($all);
    }

    /**
     * 
     */
    public function updateDataFromDatabase(): void
    {
        $accessdatabase = new AccessToDatabase('books');

        $isUpdated = $accessdatabase->update('author','Stephen King', 1);

        $this->assertTrue($isUpdated);
    }

    /**
     * 
     */
    public function deleteDataFromDatabase(): void
    {
        $accessdatabase = new AccessToDatabase('books');

        $isDeleted = $accessdatabase->delete(1);

        $this->assertTrue($isDeleted);
    }

    /**
     * 
     */
    public function createDataFromDatabase(): void
    {
        require "config/config.php";

        $accessdatabase = new AccessToDatabase('books');

        $book = new Book;
        $book->name = "Harry Potter";
        $book->author = "J.K Rowling";
        $book->published_at = "2021-10-7";

        $isCreated = $accessdatabase->create($book);

        $this->assertTrue($isCreated);
    }
}