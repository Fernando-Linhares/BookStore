<?php
namespace Application\Mvc\View;

abstract class BaseView
{
    protected string $template;

    public const DEPENDECES = [
        FrontEnd::BOOTSTRAP,
        FrontEnd::JS,
        FrontEnd::CSS
    ];

    public function getContent()
    {
        return $this->loadTemplate(new Template($this->template));
    }

    public function loadTemplate(Template $template)
    {
        $html = $template->header;
        $html .= $template->body;
    }
}