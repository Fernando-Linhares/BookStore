<?php
namespace Application\Database\Access;

use Application\Database\AccessToDatabase;

interface Accessable
{
    public function getAccess(?string $table=null): AccessToDatabase;
}