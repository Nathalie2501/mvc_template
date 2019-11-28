<?php 
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'natural_kosmeo_definitif');
	define('DB_USER', 'root');
	define('DB_PASS', '');

class DB {
  private static $db;
  
  public static function connect(){
        if(empty(self::$db)){
            self::$db = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", 
            DB_USER, DB_PASS, [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::ATTR_EMULATE_PREPARES => false,
            ]
          );  
        }
        return self::$db;
    }

  public static function select($sql, $cond=null) {
    $result = false;
    try {
      $stmt = self::connect()->prepare($sql);
      $stmt->execute($cond);

      $count = $stmt->rowCount();
      if ($count == 1) {
        $result = $stmt->fetch();
      } else {
        $result = $stmt->fetchAll();
      }

    } catch (Exception $ex) { die($ex->getMessage()); }
      $stmt = null;
    return $result;
  }

  public static function lastId() {
    return self::connect()->lastInsertId();
  }

 
}
 ?>