<?php
namespace Application\Pagination;

use Application\Database\QueryBuilder;

class Paginator
{
    public static function paginate(QueryBuilder &$queryBuilder, int $limit, int $offset)
    {
        return $queryBuilder->limit($limit, $offset);
    }
}