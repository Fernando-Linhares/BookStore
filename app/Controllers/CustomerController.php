<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Mvc\View\ViewLable;
use Application\Sessions\Session;
use Application\Guards\Guard;

class CustomerController extends BaseController
{
    public function __construct(
        private Session $session
    ){
        Guard::auth($this->session);
    }

    public function index(): ViewLable
    {
        return view('app/customer/index');
    }
}