<?php
namespace Config;

class Config {
    public static function getConfig($key = null)
    {
        $fileName = ROOT.'config.php';
        
        if(file_exists($fileName)){
            if($key !== null){
                $config = include $fileName;

                return $config[$key];
            }
            
            return include $fileName;
        }
        
        throw new Exception("File ".$fileName.' Not Found');
    }
}
