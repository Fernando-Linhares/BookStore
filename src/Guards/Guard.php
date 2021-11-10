<?php
namespace Application\Guards;

use Application\Sessions\Session;

class Guard
{
    public static function auth(Session $session)
    {
        if(!$session->hasUser())  return redirect('/');
    }
}