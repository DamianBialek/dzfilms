<?php

namespace Tools;

class Debug
{
    public static function dump($variable)
    {
        echo '<pre>';
        print_r($variable);
        echo '</pre>';
    }

    public static function vDump($variable)
    {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }
}