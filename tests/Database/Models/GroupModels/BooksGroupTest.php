<?php
namespace Tests\Database\Models\GroupModels;

use PHPUnit\Framework\TestCase;

class BooksGroupTest extends TestCase
{
    /**
     * @test
     */
    public function assert_true_please()
    {
        return $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function use_a_repo()
    {
        $repo = new \App\Models\Repositories\BookRepository;
        
        return $this->assertTrue(isset($repo));
    }

    public function call_all_books_with_repository()
    {
        $repo = new \App\Models\Repositories\BookRepository;
        $all = $repo->getAll();
        $hasall = count($all)>1;
        $this->assertTrue($hasall);
    }
}