<?php
    echo "<script> console.log('mapcontroller load'); </script>";
    require_once './model/MapDAO.php';
    class MapController{        
        private $dao;

        public function __construct(){
           // echo "<script> console.log('mapcontroller construct'); </script>";
            $this->dao = MapDAO::getInstance();
        }

        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }

        public function cSelectMapByUserId($userId){
            //echo "<script> console.log(' SelectMap_UserId()'); </script>";

            $mapDTOs = $this->dao->mSelectMapByUseruId($userId);
            
            if($mapDTOs==null){
                $this->data = 'no map';
                $this->view = 'loginForm.php';      // check
                $this->returnView();
            } else {
                $this->data = 'OK';
                
                $this->view = 'mapList.php';
                $this->returnView($mapDTOs);
            }
            
        }

        public function cMonitoringByMoId($moId){
            $dtoArr = $this->dao->mMonitoringByMoId($moId);
            $this->data = 'OK';
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

    }


?>
