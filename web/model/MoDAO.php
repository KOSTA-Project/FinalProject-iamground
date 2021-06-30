<?php
    //echo "<script> console.log('modao load'); </script>";
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

        //
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new self;
            } 
            return self::$instance;
                     
        }        
        
        public function mSelectMoByMapId($mapId){
            $moDTOs = array();
            $sql = "SELECT * FROM mobile_object WHERE map_id=?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $mapId);           
            $stmt->execute();            
            $stmt->bind_result($moId, $userId, $mId, $type);
            while($stmt->fetch()){
                $moDTOs[] = new MoDTO($moId, $userId, $mId, $type);
            }
            return $moDTOs;
        }

        public function mSelectMoByUserId($userId){
            $moDTOs = array();
            $sql = "SELECT * FROM mobile_object WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $userId);           
            $stmt->execute();            
            $stmt->bind_result($moId, $userId, $mId, $type);
            while($stmt->fetch()){
                $moDTOs[] = new MoDTO($moId, $userId, $mId, $type);
            }
            return $moDTOs;
        }

        public function insertMo($moDTO){

            $sql = "INSERT INTO mobile_object VALUES (?, ?, ? ,?)";
            $stm = $this->connection->prepare($sql);
            $stm->bind_param('ssss', $moDTO->getMoId(), $moDTO->getUserId() ,$moDTO->getMapId(), $moDTO->getMoType());
            $stm->execute();
        }

        public function mUpdateMo($moDTO){
            echo "<script> console.log('update start'); </script>";
            $sql = "UPDATE mobile_object SET mo_type=? WHERE mo_id=?";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param('ss', $moDTO->getMoType(), $moDTO->getMoId() );
            $stm->execute();
        }

        public function mDeleteMo($moId){
            $sql = "delete from mobile_object where mo_id=?;";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param ('s',$moId);
            $stm->execute();
        }

      }
?>
