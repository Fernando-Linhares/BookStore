<?php
namespace Tests\Lib\View;

use Application\Mvc\View\View;
use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    /**
     * @test
     * 
     */
    public function get_address_view()
    {
        $view = new View;

        $view->setAddress('homepage');

        $expected = '../app/views/homepage-view.php';

        $this->assertEquals($view->getAddress(), $expected);
    }
}