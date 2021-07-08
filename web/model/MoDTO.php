<?php
    class MoDTO{
        private $moId;
        private $userId;
        private $mapId;
        private $moType;
        private $moStatus;

        public function __construct($moId, $userId, $mapId, $moType, $moStatus, $moIp){
            $this->moId = $moId;
            $this->userId = $userId;
            $this->mapId = $mapId;
            $this->moType = $moType;
	    $this->moStatus = $moStatus;
	    $this->moIp = $moIp;
        }

        public function setMoId($moId){
            $this->moId = $moId;
        }

        public function getMoId(){
            return $this->moId;
        }

        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function getUserId(){
            return $this->userId;
        }

        public function setMapId($mapId){
            $this->mapId = $mapId;
        }

        public function getMapId(){
            return $this->mapId;
        }

        public function setMoType($moType){
            $this->moType = $moType;
        }

        public function getMoType(){
            return $this->moType;
        }
        public function setMoStatus(){
            return $this->moStatus;
        }
        public function getMoStatus(){
            return $this->moStatus;
        }
	public function setMoIp(){
	    return $this->moIp;
	}
	public function getMoIp(){
	    return $this->moIp;
	}

    }
?>
