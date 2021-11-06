<?php
namespace Tests\Database\Pagination;

use Application\Database\QueryBuilder;
use Application\Pagination\Paginator;
use PHPUnit\Framework\TestCase;

class PaginationTest extends TestCase
{
    /**
     * @test
     */
    public function get_paginated_itens()
    {
        $querybuilder = (new QueryBuilder('books'))->select('*');
        $itens =  Paginator::paginate($querybuilder, 2, 2);
        return $this->assertCount(2, $itens);
    }
}