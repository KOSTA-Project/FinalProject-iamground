<?php

    require_once 'MoDTO.php';
    require_once 'DBConnector.php';

    class MoDAO{
        //private static $instance = new UserDAO();
        private static $instance = null;
        private $connection = null;

        private function __construct(){
            $dbConnector = DBConnector::getInstance();
            $this->connection = $dbConnector->getConnection();
        }

        public static function getInstance(){
            echo "<script> console.log('modao getInstance'); </script>";
            if(self::$instance == null){
                self::$instance = new self;
            }
            return self::$instance;

        }

        public function mSelectMoByMapId($mapId){
            echo "<script> console.log('mo controller mSelectMoByMapId()'); </script>";

            $moDTOs = array();
            $sql = "SELECT * FROM mobile_object WHERE map_id=?";
            //$sql = "SELECT * FROM mobile_object";
            $stmt = $this->connection->prepare($sql);

            $stmt->bind_param('s', $mapId);
            $stmt->execute();


            $stmt->bind_result($moId, $userId, $mId, $type);

            while($stmt->fetch()){
                $moDTOs[] = new MoDTO($moId, $userId, $mId, $type);
            }

            return $moDTOs;
        }
        public function insertByMo(){
                $sql = "insert into mobile_object values(?,?)";
                $stm = $this->conn->prepare ($sql);
                $stm->bindValue (1, $this->getMoId ());
                $stm->bindValue (2, $this->getMoType ());
                $stm->execute();
        }

        public function updateByMo(){
                $sql = "update mobile_object set mo_id=?, mo_type=? where user_id=?;";
                $stm = $this->conn->prepare ($sql);
                $stm->bindValue (1, $m->getMoId ());
                $stm->bindValue (2, $m->getMoType ());
                $stm->bindValue (3, $m->getUserId ());
                $stm->execute();
        }
        public function deleteByMo($userId){
                $sql = "delete from mobile_object where user_id=?;";
                $stm = $this->conn->prepare ($sql);
                $stm->bindValue (1, $userId);
                $stm->execute();
        }

    }
?>
