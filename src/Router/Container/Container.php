<?php
namespace Application\Router\Container;

class Container implements Psr\ContainerInterface
{
    private $id;

    public function get(string $id): mixed
    {
        // var_dump($id);exit;
        try{
            if($this->has($id))
                $this->id = $id;
                // var_dump($this);die;
            return $this;
        }catch(ContainerException $exception){
            echo $exception->getMessage();
        }
    }


    public function build(...$dependences)
    {
        $dependences = array_map(function($item){
            return new $item;
        },$dependences);

        if(empty($dependences))
            return new $this->id;

        return new $this->id(...$dependences);
    }

    public function has(string $id): bool
    {
        return class_exists($id);
    }
}