<?php
namespace Application\Pagination;

class Pages
{
    public function __construct(
        private int $total,
        private int $limit,
        private int $page
    ){
    }

    public function getNextPage(): int
    {
        $pagenext = $this->page + 1;

        if($pagenext == 1)
            return $pagenext + 1;
        if($this->isFinal($pagenext))
            return $this->page;

        return $pagenext;
    }

    private function isFinal(int $page)
    {
        $end = $this->total / $this->limit;
        $end = (int) $end;
        return $page > $end;
    }

    public function getBackPage(): int
    {
        if($this->page == 1)
            return $this->page;

        return $this->page - 1;
    }

    public function getLinks()
    {
        $all = range(0,$this->total, $this->limit);

        $limit = $this->limit;
        
        $selected = $this->page;

        if($selected==0) $selected += 1;

        $collectionLinks = array_map(

            function($item)use($limit, $selected)
            {
                $is_selected = $item == ($selected * $limit);

                return new Links($item, $limit, $is_selected);
            }
            , $all);
        
        unset($collectionLinks[0]);
        return $collectionLinks;
    }

}