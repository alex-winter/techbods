<?php
//singleton class
class Database {

    protected static $dbLink;
	
    public static function get(){
       if(self::$dbLink == null){
			$dns = 'mysql:host=localhost;dbname=techbods_logging';
            self::$dbLink = new PDO($dns, 'tblogging', 'G6@r$r$i$#23');
			$encoding = strtoupper('UTF-8');
            self::$dbLink->exec("SET NAMES '{$encoding}'");
        }
        return self::$dbLink;
    }
	
    private function __construct() {
        return false;
    }
	
    private function __clone() {
		return self::get();
    }
}
?>