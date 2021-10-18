<?php

namespace Application\Regex;

class Regex
{
    private string $pattern;

    private string $input;

    public function setPattern(string $pattern): void
    {
        $this->pattern = '/'.$pattern.'/i';
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function setInput(string $input)
    {
        $this->input = $input;
    }

    public function getInput()
    {
        return $this->input;
    }

    public function is_match(): bool
    {
        return preg_match($this->getPattern(), $this->getInput());
    }

    public function getResult()
    {
        preg_match($this->getPattern(), $this->getInput(), $result);
        return current($result);
    }
}