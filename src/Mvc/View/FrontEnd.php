<?php
namespace Application\Mvc\View;

class FrontEnd
{
    public const CSSFRAMEWORK = 0;//'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">';
    public const JSLIB = 1;//'<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>';
    public const JS = 2;//'<script src="'.URL.'assets/js/app.js"></script>';
    public const CSS = 3;//'<link rel="stylesheet" href="'.URL.'assets/css/style.css">';
    public const ICONS = 4;//' <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
}