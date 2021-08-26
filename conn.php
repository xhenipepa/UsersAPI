<?php
require "config.php";
class Connection
{
    private static $db = null;

    public static function open($configArray)
    {
        try {
            if (!self::$db) {
                self::$db = new PDO($configArray["dns"], $configArray["username"], $configArray["password"],
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
            }
            return self::$db;
//            echo "Success";
        } catch (PDOException $exception) {
            echo "No Relation At All!" . $exception->getMessage();
        }
    }

    public function close()
    {
        $this->dbh = null;
    }
}


?>

