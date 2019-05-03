<?php
namespace Core\Model;

use Core\Model\Database\MySQLDB;

class MainModel extends  MySQLDB
{
    protected $tablename = '';

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

    public function count()
    {
        if(empty($this->tablename))
            return false;

        $query = 'SELECT COUNT(*) as `count` FROM `'.$this->tablename.'`';

        return $this->dbSelectField($query);
    }
}
