<?php
namespace Tests\Routing;

use PHPUnit\Framework\TestCase as BaseTest;
use Application\Main\Routing\Url;

class UrlTest extends BaseTest
{
    /**
     * @test
     */
    public function get_url(): void
    {
        $url = new Url('/test/{abc}');
        $nameurl = (string) $url;
        $this->assertEquals($nameurl,'/test/{abc}');
    }

    /**
     * @test
     */
    public function get_keys(): void
    {
        $url = new Url('/test/{name}/{id}');
        $placeholder = $url->getPlaceHolders();
        $result = preg_match('/'.$placeholder.'/','/test/fernando/1') == 1;
        $this->assertTrue($result);
    }
}