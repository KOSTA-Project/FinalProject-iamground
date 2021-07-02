<?php
    class MapDTO{
        private $mapId;
        private $userId;
        private $mapLocation;

        public function __construct($mapId, $userId, $mapLocation){
            $this->mapId = $mapId;
            $this->userId = $userId;
            $this->mapLocation = $mapLocation;
        }

        public function setMapId($mapId){
            $this->mapId = $mapId;
        }

        public function getMapId(){
            return $this->mapId;
        }

        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function getUserId(){
            return $this->userId;
        }

        public function setMapLocation($mapLocation){
            $this->mapLocation = $mapLocation;
        }

        public function getMapLocation(){
            return $this->mapLocation;
        }

    }
?>
