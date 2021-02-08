<?php
    namespace NalSolution\App;
    use PDO;
    use PDOException;
    class Database
    {
        private static $type = DB_TYPE;
        private static $port = DB_PORT;
        private static $host = DB_HOST;
        private static $name = DB_NAME;
        private static $user = DB_USER;
        private static $pass = DB_PASS;
        private static $db_hander;
        private static $stmt;
        public static function init()
        {
            $dns = self::$type.':host=' . self::$host.';port='.self::$port.';dbname='. self::$name;
            try
            {
                self::$db_hander = new PDO($dns,self::$user, self::$pass);
                self::$db_hander->exec("set names utf8mb4");
            }
            catch(PDOException $exception)
            {
                echo 'PDO Error:'. $exception->getMessage();
            }
        }
        /*
            @param string $sql
            @return void
        */
        public static function query($sql)
        {
            try {
                //code...
                self::$stmt = self::$db_hander->prepare($sql);
            }catch(PDOException $exception) {
                //throw $exception;
                echo 'PDO Error:'. $exception->getMessage();
            }
        }
        /**
         * @param string $param
         * @param string $value
         * @param any $type
         */
        public static function bind($param, $value, $type=null)
        {
            if(is_null($type))
            {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            try {
                //code...
                self::$stmt->bindValue($param, $value, $type);
            } catch (PDOException $exception) {
                echo 'PDO Error:'. $exception->getMessage();
            }
        }

        public static function execute()
        {
            try {
                //code...
                return self::$stmt->execute();
            } catch (PDOException $exception) {
                echo 'PDO Error:'. $exception->getMessage();
            }
        }
        /**
         * Get result set as array
         * @return array
         */
        public static function fetchAll()
        {
            try {
                //code...
                self::$stmt->execute();
                return self::$stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $exception) {
                echo 'PDO Error:'. $exception->getMessage();
            }
        }
        /**
         * Get single record as array
         * @return array
         */
        public static function fetch()
        {
            try {
                //code...
                self::$stmt->execute();
                return self::$stmt->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $exception) {
                echo 'PDO Error:'. $exception->getMessage();
            }
        }
    }
    Database::init();
?>