<?php
    //echo "<script> console.log('mocontroller load'); </script>";
    require_once './model/MoDAO.php';    

    class MoController{
        private $modao;
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
            
            for($i = 0; $i < count($moDTOs); $i++){
                if($i != count($moDTOs)-1){
                    echo $moDTOs[$i]->getMoId()."/";
                    continue;
                }
                echo $moDTOs[$i]->getMoId();
                //echo $moDTOs[$i]->getMoType();
            }
                    
        }       
    }

    
?>
