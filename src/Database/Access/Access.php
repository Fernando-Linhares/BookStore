<?php
namespace Application\Database\Access;

use Application\Database\AccessToDatabase;

class Access implements Accessable
{
    public function getAccess(?string $table=null): AccessToDatabase
    {
        return new AccessToDatabase($table);
    }   
}