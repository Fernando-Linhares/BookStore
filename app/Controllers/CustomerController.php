<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Mvc\View\View;
use Application\Sessions\Session;
use Application\Guards\Guard;

class CustomerController extends BaseController
{
    public function __construct(
        private Session $session
    ){
        Guard::auth($this->session);
    }

    public function index(): View
    {
        return view('app/customer/index');
    }
}