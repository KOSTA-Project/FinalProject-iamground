<?php
    //echo "<script> console.log('mapdao load'); </script>";
    require_once 'MapDTO.php';
    require_once 'DBConnector.php';

    class MapDAO{
        //private static $instance = new MapDAO();
        private static $instance = null;
        private $connection = null;

        private function __construct(){
            $dbConnector = DBConnector::getInstance();
            $this->connection = $dbConnector->getConnection();
        }

        public static function getInstance(){
           // echo "<script> console.log('dao getInstance'); </script>";
            if(self::$instance == null){
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function mSelectMapByUserId($userId){
            $mapDTOs = array();
            $sql = "SELECT * FROM map WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);
            //
            $stmt->bind_param('s', $userId);
            $stmt->execute();
            //
            $stmt->bind_result($mid, $uid, $location);
            //
            while($stmt->fetch()){
                $userDTOs[] = new MapDTO($mid, $uid, $location);
            }
            return $userDTOs;
        }
        /*
        public function mSelectMapMoByUserId($userId){
            $dtoArr = array();
            $sql = "SELECT m.map_id , m.map_location, mo.mo_id, mo.mo_type 
	    FROM map AS m JOIN mobile_object AS mo ON m.map_id = mo.map_id WHERE m.user_id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $userId);
            $stmt->execute();
            $stmt->bind_result($mid, $mlocation, $moid, $motype);
            while($stmt->fetch()){
                $mapDTO = new MapDTO($mid, null, $mlocation);
                $moDTO = new MoDTO($moid, null, null, $motype);
                array_push($dtoArr, $mapDTO);
                array_push($dtoArr, $moDTO);
            }
            return $dtoArr;
        }
        */

        public function insertMap($mapDTO){
            $sql = "INSERT INTO map VALUES (?, ?, ?)";
            $stm = $this->connection->prepare($sql);
            $stm->bind_param('sss', $mapDTO->getMapId(), $mapDTO->getUserId() ,$mapDTO->getMapLocation());
            $stm->execute();
            
        }
        public function mUpdateMap($mapDTO){
            $sql = "UPDATE map SET map_location=? WHERE map_id=?";		
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param('ss', $mapDTO->getMapLocation(), $mapDTO->getMapId());
            $stm->execute();
        }
        public function mDeleteMap($mapId){
            $sql = "delete from map where map_id=?;";
            $stm = $this->connection->prepare ($sql);
            $stm->bind_param ('s',$mapId);
            $stm->execute();
        }
            
        public function mMonitoringByMoId($moId){
            $dtoArr = array();            
            $sql = "SELECT m.map_id, m.user_id, m.map_location, mo.mo_id, mo.mo_type FROM map AS m JOIN mobile_object AS mo ON m.map_Id = mo.map_Id WHERE mo.mo_id = ".$moId;
            $stmt = $this->connection->prepare($sql);
            //
            //$stmt->bind_param('s', $moId);
            $stmt->execute();
            $stmt->bind_result($mid, $uid, $location, $moid, $motype);
            if($stmt->fetch()){
                $mapDTO = new MapDTO($mid, $uid, $location);
                $moDTO = new MoDTO($moid, null, null, $motype);                
                array_push($dtoArr, $mapDTO);
                array_push($dtoArr, $moDTO);    
            }
        return $dtoArr;
        }
        /*
        public function mInsertMapImage($mapImage){
            echo "<script> console.log('mInsertMapImage() called'); </script>";
            $sql = "INSERT INTO map(map_id, user_id, map_location, map_image) VALUES ('000004', 'yun', 'test', ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('b', $mapImage);
            $stmt->execute();
            echo "<script> console.log('insert ok'); </script>";
        }
        */
    }
?>
