<?php
namespace Router\Exception;

class RouterNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Path route not found!");
    }
}