<?php
namespace Application\Guards;

use Application\Sessions\Session;

class Guard
{
    public static function auth(Session $session)
    {
        if(!$session->has('first_name'))  return redirect('/');
    }
}