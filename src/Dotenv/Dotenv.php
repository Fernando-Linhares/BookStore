<?php
namespace Application\Dotenv;

use Application\Regex\Regex;

class Dotenv extends Regex
{
    private string $content;

    public function __construct(string $path)
    {
        $this->content = file_get_contents($path);
    }

    public function getKey(string $key)
    {
        $key = strtoupper($key);
        $this->setPattern("$key=[a-z0-9\_]+");
        $this->setInput($this->content);
        return $this->removeKey(trim($this->getResult()), $key);
    }

    private function removeKey(string $result,string $key)
    {
        $len = strlen($key) + 1;
        return substr($result,$len);
    }

}