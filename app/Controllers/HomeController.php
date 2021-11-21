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
        try{
        $paginated = $this->repository->getAllPaginated();

        $data = [
                'title' => 'homepage',
                'books' => $paginated->getCollections(),
                'user' => $this->session->getUser(),
                'pages' => $paginated->getPages()
            ];

            
        return view('app/panel', $data);
        }catch(\Exception $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function selectPage(int $page)
    {
        $paginated = $this->repository->getAllPaginated(10, $page);

        $data = [
            'title' => 'homepage',
            'books' => $paginated->getCollections(),
            'user' => $this->session->getUser(),
            'pages' => $paginated->getPages()
        ];

        return view('app/panel', $data);
    }
 
    public function abort()
    {
        if($this->session->destroy()) return redirect('/');
    }
}