<?php
    require_once 'MoDTO.php';
    require_once 'DBConnector.php';

    class MoDAO{
        private static $instance = null;
        private $connection = null;

        private function __construct(){
            $dbConnector = DBConnector::getInstance();
            $this->connection = $dbConnector->getConnection();
        }


        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new self;
            }
            return self::$instance;

        }

	//맵 아이디로 오브젝트정보를 가져온다.
        public function mSelectMoByMapId($mapId){
            $moDTOs = array();
            $sql = "SELECT * FROM mobile_object WHERE map_id=?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $mapId);
            $stmt->execute();
            $stmt->bind_result($moId, $userId, $mId, $type,$status,$ip);
            while($stmt->fetch()){
                $moDTOs[] = new MoDTO($moId, $userId, $mId, $type ,$status,$ip);
            }
            return $moDTOs;
        }

	//유저아이디로 오브젝트정보를 가져온다.
        public function mSelectMoByUserId($userId){
            $moDTOs = array();
            $sql = "SELECT * FROM mobile_object WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $userId);
            $stmt->execute();
            $stmt->bind_result($moId, $userId, $mId, $type, $status, $ip);
            while($stmt->fetch()){
                $moDTOs[] = new MoDTO($moId, $userId, $mId, $type ,$status .$ip);
            }
            return $moDTOs;
        }

	//오브젝트 정보를 추가한다.
        public function insertMo($moDTO){
            $sql = "INSERT INTO mobile_object VALUES (?, ?, ? ,? ,?,?)";
            $stm = $this->connection->prepare($sql);
            $stm->bind_param('ssssss', $moDTO->getMoId(), $moDTO->getUserId() ,$moDTO->getMapId(), $moDTO->getMoType() ,$moDTO->getMoStatus(), $moDTO->getMoIp());
            $stm->execute();
        }

	//오브젝트 정보를 수정한다.
        public function mUpdateMo($moDTO){
            $sql = "UPDATE mobile_object SET mo_type=? ,mo_status=? ,mo_ip=? WHERE mo_id=?";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param('ssss', $moDTO->getMoType(),$moDTO->getMoStatus(),$moDTO->getMoIp() ,$moDTO->getMoId());
            $stm->execute();
        }

	//오브젝트 정보를 삭제한다.
        public function mDeleteMo($moId){
            $sql = "delete from mobile_object where mo_id=?;";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param ('s',$moId);
            $stm->execute();
        }

      }
?>
