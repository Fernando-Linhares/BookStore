<?php
namespace Application\Router\Request;

use Application\Http\HttpContract\Http;
use Application\Http\HttpContract\HttpInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

class Request
{
    private HttpInterface $http;
    private RequestSanitized $sanitized;

    public function __construct()
    {
        $this->http = new Http;
        $this->sanitized = new RequestSanitized;
    }

    public function has(): bool
    {
        return count($_REQUEST) > 0;
    }

    public function all(): RequestSanitized
    {
        foreach($this->http->getRequest() as $key => $value)
            $this->sanitized->$key = htmlentities($value);

        return $this->sanitized;
    }

    public function except(string|array $value): RequestSanitized
    {
        if(is_string($value))
            $request = $this->deleteValue($value, $this->http->getRequest()->toArray());
    
        if(is_array($value))
            $request = $this->deleteArray($value, $this->http->getRequest()->toArray());

        foreach($request as $key => $value)
            $this->sanitized->$key = htmlentities($value);

        return $this->sanitized;
    }

    public function deleteArray(array $values, array $request): array
    {
        foreach($request as $key => $value){
            if(!array_search($key, $values))
                $all[$key] = $value;
        }

        return $all;
    }

    private function deleteValue(string $value, array $request): array
    {
        return array_filter($request, function($item)use($value){
            return $item !== $value;
        }, ARRAY_FILTER_USE_KEY);
    }

    public function __get($name)
    {
        return $this->http->getRequest()->$name;
    }

    public function __debugInfo()
    {
        foreach($this->http->getRequest() as $key => $value)
            $this->sanitized->$key = htmlentities($value);

        return $this->sanitized;
    }
}