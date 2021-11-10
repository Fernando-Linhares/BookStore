<?php
namespace Application\Main\Middleware\Handlers;

use Application\Main\Middleware\HandlerInterface;

class HandlerRoute implements HandlerInterface
{
    public function handle()
    {
        require '../routes/routes.php';
    }
}