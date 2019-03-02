<?php
namespace Core\Model;

use Core\Model\Database\MySQLDB;

class MainModel extends  MySQLDB
{
    public function __construct()
    {
        $config = \Config\Config::getConfig("db");
        parent::__construct($config);
    }

    public function getJsonData(){
        $var = get_object_vars($this);
        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value,'getJsonData')) {
                $value = $value->getJsonData();
            }
        }
        return json_encode($var);
    }
}
