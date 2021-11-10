<?php
namespace Application\Router\Container;

use Exception;

class ContainerException extends Exception implements Psr\ContainerNotFoundExceptionInterface
{
    
}