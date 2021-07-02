<?php
    class DBConnector{
        // php인 경우 클래스 로딩시 생성자를 호출할 수 없다.
        //private static $instance = new DBConnector();
        private static $instance = null;
        private $connection = null;

        //객체 생성시 DB 접속한다.
        private function __construct(){
            $this->connection = new mysqli('localhost', 'iamground', 'iamground', 'DB_iamground');
            if($connection->connect_error){
                die($connection->connect_error);
            }
        }

        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new DBConnector();
            }
            return self::$instance;
        }

        public function getConnection(){
            return $this->connection;
        }


    }
?>
