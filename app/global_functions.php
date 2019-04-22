<?php
function url($path)
{
    $request = new \Router\RouteRequest();
    $baseUrl = $request->getBaseUrl();

    $url = $baseUrl;

    $url .= str_replace($url, '', trim(trim($path, '/')));

    return $url;
}