<?php
namespace Application\Main;

use Application\Middleware\Middleware;
use Application\Router\Request\Request;

class Application
{
    /**
     * @return Response
     */
    public function load()
    {
        $middlewares = $this->middlewares();
        $request =  $this->request();
        $response = $this->response();
    
        return Middleware::load($middlewares, $request, $response);
    }

    public function middlewares(): array
    {
        return get_all_middlewares();
    }

    public function request(): mixed
    {
        $request = new Request;

        if($request->has())
            return $request;

        return VOID_STRING;
    }

    public function response(): mixed
    {
        return VOID_STRING;
    }
}