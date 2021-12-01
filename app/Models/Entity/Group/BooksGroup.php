<?php
namespace App\Models\Entity\Group;

class BooksGroup
{
    public int $id;

    public string $title;
    
    public string $book_cover;

    public string $name;

    public string $content;

    public string $first_name;

    public string $last_name;

    public string $published_at;

    public function getAuthor(): string
    {
        return $this->first_name . $this->last_name;
    }

    public function getImage(): string
    {
        return assets($this->book_cover);
    }

    public function getResume(): string
    {
        return $this->content;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): string
    {
        return $this->name;
    }

    public function getBookId(): int
    {
        return $this->book_id;
    }

    public function getPublished(): string
    {
        return date_format(new \DateTime($this->published_at), 'd/m/Y');
    }
}