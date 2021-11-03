<?php
namespace App\Models\Entity\Group;

class BooksGroup
{
    public int $id;

    public string $title;
    
    public string $description;

    public string $image;

    public string $first_name;

    public string $last_name;

    public string $category;

    private function __set($name, $value){}
}