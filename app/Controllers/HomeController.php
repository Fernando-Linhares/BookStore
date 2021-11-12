<?php
namespace App\Controllers;

use App\Models\Repositories\BookRepository;
use Application\Mvc\Controllers\BaseController;
use Application\Sessions\Session;
use Application\Guards\Guard;
use Application\Router\Request\Request;

class HomeController extends BaseController
{
    public function __construct(
        private Session $session,
        private BookRepository $repository
        )
    {
        Guard::auth($this->session);
    }

    public function index()
    {
        $limit = 10;

        $paginated = $this->repository->getAllPaginated($limit);

        return view(
                'app/panel',
                    [
                        'title' => 'homepage',
                        'books' => $paginated->getCollections(),
                        'user' => $this->session->getUser(),
                        'pages' => $paginated->getPages()
                    ]
                );
    }

    public function selectPage(int $page)
    {
        $limit = 10;
        $paginated = $this->repository->getAllPaginated($limit, $page);

        return view(
                'app/panel',
                    [
                        'title' => 'homepage',
                        'books' => $paginated->getCollections(),
                        'user' => $this->session->getUser(),
                        'pages' => $paginated->getPages()
                    ]
                );
    }
 
    public function abort()
    {
        if($this->session->destroy()) return redirect('/');
    }
}