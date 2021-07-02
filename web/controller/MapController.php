<?php
    //echo "<script> console.log('mapcontroller load'); </script>";
    require_once './model/MapDAO.php';
    class MapController{
        private $mapdao;
        private $view;

        //생성자 , MapDAO 객체를 변수에 대입한다.
        public function __construct(){
            $this->mapdao = MapDAO::getInstance();
        }

        //각 메소드의 실행결과를 바탕으로 프론트컨틀롤에  controlView() 메소드에 전달한다.
        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }

        //유저아이디로 맵정보를 조회한다.
        public function cSelectMapByUserId($userId){
            $mapDTOs = $this->mapdao->mSelectMapByUserId($userId);
            if($mapDTOs==null){                     // map not exist
                $this->view = 'mapList.php';
                $this->returnView();
            } else {                                // map exist
                $this->view = 'mapList.php';
                $this->returnView($mapDTOs);
            }
        }

        //오브젝트아디로 맵과 오브젝트정보 조회ㅇ
        public function cMonitoringByMoId($moId){
            $dtoArr = $this->mapdao->mMonitoringByMoId($moId);
            $this->view = 'monitoring.php';
            $this->returnView($dtoArr);
        }

        //맵 정보 추가
        public function cAddMap($mapId, $userId, $mapLocation){
            $mapDTO = new MapDTO($mapId, $userId, $mapLocation);
            $this->mapdao->insertMap($mapDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

        //맵 정보 수정
        public function cUpdateMap($mapId, $mapLocation){
            $mapDTO = new MapDTO($mapId, null, $mapLocation);
            $this->mapdao->mUpdateMap($mapDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

        //맵 정보 삭제
        public function cDeleteMap($mapId){
            $this->mapdao->mDeleteMap($mapId);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
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
