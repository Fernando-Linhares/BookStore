<?php
namespace App\Controllers;

use Application\Mvc\Controllers\BaseController;
use Application\Router\Request\Request;

class BooksController extends BaseController
{
    public function create()
    {
        return view('app/book/create');
    }

    public function update(Request $request)
    {
        //
    }
}