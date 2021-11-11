<?php
namespace Application\Pagination;

class Pages
{
    public function __construct(
        private int $total,
        private int $limit,
        private int $page
    ){
        if($page == 0 OR $page == 1)
            $page = 1;
    }

    public function getLinks()
    {
        $all = range(0,$this->total, $this->limit);

        $limit = $this->limit;

        $selected = $this->page;

        $collectionLinks = array_map(
            function($item)use($limit, $selected)
            {
                return new Links($item,$limit,($item/$limit) == $selected);
            }
            ,$all);
        
        unset($collectionLinks[0]);

        return $collectionLinks;
    }

}