<?php
namespace Application\Router\Interceptor\Contracts;

interface CallBackerInterface
{
    public function callAction(object $controller, string $action);
    public function callActionWith(object $controller, string $action, ...$args);
}