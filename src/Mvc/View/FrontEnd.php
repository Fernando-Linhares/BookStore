<?php
namespace Application\Mvc\View;

class FrontEnd
{
    public const CSSFRAMEWORK = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">';
    public const JSLIB = '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
    public const JS = '<script href="'.URL.'/assets/js/app.js"></script>';
    public const CSS = '<link rel="'.URL.'/css/style.css">';
    public const ICONS = ' <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
}