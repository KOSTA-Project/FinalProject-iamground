<?php
    require_once './model/MoDAO.php';
    require_once './model/MapDAO.php';
    require_once './model/UserDAO.php';

    class MoController{
        private $modao;
        private $mapdao;
        public $moList;

        public function __construct(){
            $this->modao = MoDAO::getInstance();
        }

        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }

	//맵 아이디로 오브젝트 정보 조회
        public function cSelectMoByMapId($mapId){
            $moDTOs = $this->modao->mSelectMoByMapId($mapId);
	    //조회한 오브젝트 아이디와 상태를 문자열로 전달한다.
            for($i = 0; $i < count($moDTOs); $i++){
                echo "/".$moDTOs[$i]->getMoId()."|".$moDTOs[$i]->getMoStatus();
            }
        }

	//유저아이디로 맵과 오브젝트 정보를 조회한다.
        public function cSelectMapMoByUserId($userId){
            $this->mapdao = MapDAO ::getInstance();
	    $dtoArr=array();
	    $modtoArr=array();
            $mapDTOs=array();
	    $moDTOs=array();
            $mapDTOs = $this ->mapdao->mSelectMapByUserId($userId);   // mapList
	    array_push($dtoArr, $mapDTOs );

	    //유저아이디로 조회한 맵정보와 맵정보의 아이디를 통해 가져온 오브젝트 정보를 dtoArr에 저장한다.
            for($i=0; $i<count($mapDTOs); $i++){
                $mapId = $mapDTOs[$i]->getMapId();    // mapList 안에 mapId
                $moDTOs = $this->mapdao->mSelectMoByMapId($mapId);
          	array_push($modtoArr, $moDTOs );
             }
	     array_push($dotArr, $modtoArr);
	     return $dtoArr;
        }

	//오브젝트정보를 추가한다.
        public function cAddMo($moId, $userId , $mapId, $moType, $moStatus, $moIp){
            $moDTO = new MoDTO($moId, $userId , $mapId, $moType ,$moStatus, $moIp);
            $this->modao->insertMo($moDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

	//오브젝트정보를 삭제한다.
        public function cDeleteMo($moId){
            $this->modao->mDeleteMo($moId);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

	//오브젝트정보를 수정한다.
        public function cUpdateMo($moId, $moType, $moStatus ,$moIp){
            $moDTO = new MoDTO($moId, null , null , $moType ,$moStatus ,$moIp);
            $this->modao->mUpdateMo($moDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }
    }
 ?>
