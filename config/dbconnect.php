<?php
  class Database {
    private static $connection = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getConnection() {
      if (!isset(self::$connection)) {
          
        $host = "127.0.0.1";
        $user = "melooka23";
        $pass = "";
        $db = "c9";
        $port = 3306;
        
        self::$connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
      }
      return self::$connection;
    }
  }
?>