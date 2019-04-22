<?php

namespace Router;

class RouteRequest
{
    private $headers;
    private $requestMethod;
    private $requestUrl;
    private $query;
    private $pathInfo;
    private $requestParams;

    public function __construct()
    {
        $this->setHeaders();
        $this->setRequestUrl();
        $this->setPathInfo();
        $this->parseRequestParams();
    }

    private function setHeaders()
    {
        foreach ($_SERVER as $key => $value) {
            if ('HTTP_' != substr($key, 0, 5)) {
                continue;
            }
            $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
            $this->headers[$name] = $value;
        }
        $this->requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    }

    private function setRequestUrl()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $this->requestUrl = $uri['path'];
        if (!empty($uri['query'])) {
            parse_str($uri['query'], $this->query);
        }
    }

    private function setPathInfo()
    {
        $this->pathInfo = (!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/');
    }

    private function parseRequestParams()
    {
        $this->requestParams["GET"] = $this->query;

        if($this->requestMethod === "POST")
            $this->requestParams["POST"] = $_POST;

        if($this->requestMethod === "PUT")
            $this->requestParams["PUT"] = $this->parsePhpInputParams();

        if($this->requestMethod === "DELETE")
            $this->requestParams["DELETE"] = $this->parsePhpInputParams();
    }

    private function parsePhpInputParams()
    {
        $params = [];

        $input = file_get_contents("php://input");
        parse_str($input, $params);

        return $params;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    public function getQuery()
    {
        return (array)$this->query;
    }

    public function getHeader($key)
    {
        return isset($this->headers[$key]) ? $this->headers[$key] : null;
    }

    public function getPathInfo()
    {
        return $this->pathInfo;
    }

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function getBaseUrl()
    {
        $baseUrl = $_SERVER['SCRIPT_NAME'];
        return str_replace(basename($baseUrl), '', $baseUrl);
    }
}