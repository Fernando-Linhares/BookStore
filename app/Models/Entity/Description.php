<?php
namespace App\Models\Entity;

use Application\Mvc\Models\BaseModel;

class Description extends BaseModel
{
    public ?int $id;

    public string $content;

    public string $table = 'descriptions';
}