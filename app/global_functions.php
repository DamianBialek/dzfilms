<?php
function url($path)
{
    $request = new \Router\RouteRequest();
    $baseUrl = $request->getBaseUrl();

    $url = $baseUrl;
	
	$url .= $path;
	
	$url = str_replace('//', '/', $url);

    return $url;
}