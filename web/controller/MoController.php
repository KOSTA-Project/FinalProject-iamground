<?php
    //echo "<script> console.log('mocontroller load'); </script>";
    require_once './model/MoDAO.php'; 
    require_once './model/MapDAO.php';
    require_once './model/UserDAO.php';    

    class MoController{
        private $modao;
        private $mapdao;
        public $moList;

        public function __construct(){
            //echo "<script> console.log('mocontroller construct'); </script>";
            $this->modao = MoDAO::getInstance();                                  
        }

        public function returnView($responseData=null){
            //var_dump($responseData);
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }
        
        public function cSelectMoByMapId($mapId){
            //echo "<script> console.log('mo controller cSelectMoByMapId()'); </script>";
            $moDTOs = $this->modao->mSelectMoByMapId($mapId);
            //
            for($i = 0; $i < count($moDTOs); $i++){
                echo "/".$moDTOs[$i]->getMoId()."|".$moDTOs[$i]->getMoStatus();               
            }
        } 
        
        public function cSelectMapMoByUserId($userId){
            $this->mapdao = MapDAO ::getInstance();
	    $dtoArr=array();
	    $modtoArr=array();
            $mapDTOs=array();
	    $moDTOs=array();	 
            $mapDTOs = $this ->mapdao->mSelectMapByUserId($userId);   // mapList
	    array_push($dtoArr, $mapDTOs );

            for($i=0; $i<count($mapDTOs); $i++){
                $mapId = $mapDTOs[$i]->getMapId();    // mapList 안에 mapId
                $moDTOs = $this->mapdao->mSelectMoByMapId($mapId);
          	    array_push($modtoArr, $moDTOs );	
             }
	     array_push($dotArr, $modtoArr);
	     return $dtoArr;
        }

        public function cAddMo($moId, $userId , $mapId, $moType, $moStatus){
            $moDTO = new MoDTO($moId, $userId , $mapId, $moType ,$moStatus);
            echo "<script> console.log('function cAddMo'); </script>";
            $this->modao->insertMo($moDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }	
        
        public function cDeleteMo($moId){
            echo "<script> console.log('function cDeleteMo'); </script>";
            $this->modao->mDeleteMo($moId);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

        public function cUpdateMo($moId, $moType, $moStatus){                    
            echo "<script> console.log('function cupdateMo()'); </script>";
            $moDTO = new MoDTO($moId, null , null , $moType ,$moStatus);
            $this->modao->mUpdateMo($moDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }
    } 
             
    

    
?>
