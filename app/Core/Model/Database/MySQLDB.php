<?php
//Singleton implemented

namespace Core\Model\Database;

use Tools\Debug;

class MySQLDB {
    private static $instance;

    private $config;
    private $con;
    
    public function __construct($config)
    {
        $this->config = $config;
        
        $this->connect();
    }
    
    private function connect()
    {
        if(empty(self::$instance)){
            self::$instance = $this->con = new \mysqli(
                    $this->config['host'],
                    $this->config['username'],
                    $this->config['pass'],
                    $this->config['dbName'],
                    $this->config['port']
            );
            
            if($this->con->connect_error)
                throw new \Exception ($this->con->connect_error);
        }
        else{
            $this->con = self::$instance;
        }
        
        $this->con->set_charset("utf8");
    }


    public function dbQuery($query)
    {
        $result = $this->con->query($query);

        if(!$result)
            throw new \Exception($this->con->error);

        return $result;
    }

    public function dbInsert($query)
    {
        $result = $this->dbQuery($query);

        if(!$result)
            return false;

        return $this->con->insert_id;
    }
    
    public function dbUpdate($query)
    {
        return $this->dbQuery($query);
    }
    
    public function dbDelete($query)
    {
        return $this->dbQuery($query);
    }
    
    public function dbSelectRow($query, $type = NULL)
    {
        if(!$type) $type = MYSQLI_BOTH;

        $result = $this->dbQuery($query);

        return $result->fetch_array($type);
        
    }
    
    public function dbSelectRows($query, $type = NULL)
    {
        if(!$type) $type = MYSQLI_BOTH;
        $rows = array();
        $result = $this->dbQuery($query);

        while($row = $result->fetch_array($type)){
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    public function dbSelect($query)
    {
        return $this->dbQuery($query);
    }

    public function dbSelectField($query)
    {
        $result = $this->dbQuery($query);
        $row = $result->fetch_array();

        return $row[0];
    }

    public function dbSanitize($variable)
    {
        if(!is_array($variable))
            return $this->con->real_escape_string($variable);

        if(!empty($variable))
            foreach ($variable as $key => $value) {
                $variable[$key] = $this->con->real_escape_string($value);
            }

        return $variable;
    }
}
