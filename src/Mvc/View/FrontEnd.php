<?php
namespace Application\Mvc\View;

class FrontEnd
{
    public const CSSFRAMEWORK = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">';
    public const JSLIB = '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
    public const JS = '<script src="'.URL.'assets/js/app.js"></script>';
    public const CSS ='<link rel="stylesheet" href="'.URL.'assets/css/style.css">';
    public const ICONS = ' <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
}