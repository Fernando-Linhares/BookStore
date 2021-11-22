<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Guards\Guard;
use Application\Sessions\Session;

class RentalController extends BaseController
{
    public function __construct(private Session $session)
    {
        Guard::auth($this->session);
    }

    public function index()
    {
        return view('app/rentals/index');
    }
}