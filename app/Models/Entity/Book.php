<?php
namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Book extends BaseModel
{
    public ?int $id = null;

    public string $title;
    
    public string $book_cover;

    public int $decription_id;

    public int $author_id;

    public string $published_at;

    public string $table = 'books';

    public function setDescription(string $content): bool
    {
        try{

            $description = new Description;
            $description->content = $content;

            if($description->save())
               return $this->description_id = $description->getLast()->id;

        }catch(\Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function setAuthor(string $author_name): bool
    {
        try{

            $author = new Author;
            list($first_name, $last_name) = explode(' ',$author_name);
            $author = $author->where('first_name', $first_name);

            return $this->author_id = $author->id;
    
        }catch(\Exception $exception)
        {
            echo $exception->getMessage();
        }
    }
}