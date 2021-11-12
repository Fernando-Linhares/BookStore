<?php
namespace Application\Main\Middleware\Handlers;

use Application\Debuggin\Depurator;
use Application\Main\Middleware\HandlerInterface;

class HandlerRoute implements HandlerInterface
{
    public function handle()
    {
        require '../routes/routes.php';
    }

    public function debug()
    {
        try
        {
            return $this->handle();
        }
        catch(\Exception $exception)
        {
            dd($exception->getMessage());
        }
    }
}