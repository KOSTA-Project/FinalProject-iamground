<?php
    //echo "<script> console.log('mapcontroller load'); </script>";
    require_once './model/MapDAO.php';
    class MapController{        
        private $mapdao;
        private $view;

        public function __construct(){
            $this->mapdao = MapDAO::getInstance();
        }

        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }

        public function cSelectMapByUserId($userId){
            $mapDTOs = $this->mapdao->mSelectMapByUserId($userId);
            
            if($mapDTOs==null){                     // map not exist
                $this->view = 'notExistMap.php';      // check
                $this->returnView();
            } else {                                // map exist
                $this->view = 'mapList.php';
                $this->returnView($mapDTOs);
            }
        }

        public function cMonitoringByMoId($moId){            
            $dtoArr = $this->mapdao->mMonitoringByMoId($moId);
            $this->view = 'monitoring.php';
            $this->returnView($dtoArr);
        }

        /*
        public function cInsertMapImage($mapImage){
            echo "<script> console.log('cInsertMapImage() called'); </script>";
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($mapImage);
            var_dump($mapImage);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $file = fopen($_FILES["fileToUpload"]["tmp_name"], 'rb');
            var_dump($file);
            $this->dao->mInsertMapImage($file);
        }
        */

        public function cAddMap($mapId, $userId, $mapLocation){
            $mapDTO = new MapDTO($mapId, $userId, $mapLocation);
            echo "<script> console.log('function cAddMap'); </script>";
            $this->mapdao->insertMap($mapDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();	
        }

        public function cUpdateMap($mapId, $mapLocation){
            $mapDTO = new MapDTO($mapId, null, $mapLocation);
            echo "<script> console.log('function cUpdateMap'); </script>";
            $this->mapdao->mUpdateMap($mapDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();	
        } 

        public function cDeleteMap($mapId){
            echo "<script> console.log('function cDeleteMo'); </script>";
            $moDTO = new MoDTO($userId , $mapId, $moId, $moType);
            $this->mapdao->mDeleteMap($mapId);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

    }


?>
