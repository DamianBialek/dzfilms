<?php

namespace Core;

class View
{
    private $templatePath = ROOT.'resources/';

    public function render($name, $params = [])
    {
        $fullFileName = $this->templatePath.$name;
        extract($params);

        if(!file_exists($fullFileName))
            throw new \Exception("Nie znaleziono takiego szablonu: $fullFileName");

        include $fullFileName;
    }

}