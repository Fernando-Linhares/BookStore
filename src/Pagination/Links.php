<?php
namespace Application\Pagination;

class Links
{
    public function __construct(
        private int $page,
        private int $limit,
        private bool $selected
    ){}

    public function link()
    {
        return $this->page / $this->limit;
    }

    public function isSelected()
    {
        return $this->selected;
    }

    public function getClass()
    {
        if($this->selected)
            return 'class="active"';
        
        return '';
    }
    public function __toString()
    {
        return $this->link();
    }
}