<?php
    //echo "<script> console.log('usercontroller load'); </script>";
    require_once './model/UserDAO.php';
    require_once './model/MapDAO.php';
    require_once './model/MoDAO.php';
    class UserController{
        private $userdao;
        public function __construct(){
            echo "<script> console.log('usercontroller construct'); </script>";
            $this->userdao = UserDAO::getInstance();                                   
        }

        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }
        
        public function login($userId, $userPw){
            echo "<script> console.log('user controller login()'); </script>";
            
            $userDTO = $this->userdao->selectById($userId);            
            if($userDTO==null){                                     // not exist id
                $this->view = 'loginForm.php';                      // check ///////////////////////////
                $this->returnView();
            } else {
                if($userDTO->getUserPw()==$userPw){                 // login ok              
                    session_start();
                    $_SESSION['userId']=$userDTO->getUserId();
                    $_SESSION['userType']=$userDTO->getUserType();
                    if($_SESSION['userType']=='4'){                 // manager login
                    $frontController = new FrontController('action=manager');
                    $frontController->run();
                    } else {                                        // user login 
                    $frontController = new FrontController('action=mapList');
                    $frontController->run();
                    }
                } else {                                            // wrong password                    
                    $this->view = 'loginForm.php';                  // check ///////////////////////////
                    $this->returnView();
                }
            }
            
        }
        public function logout($userId, $userPw){
            echo "<script> console.log('function logout()'); </script>";
 	session_start();
	session_destroy();

            $this->view = 'loginForm.php';                   
            $this->returnView();
        }

        public function join(){
      	    echo "<script> console.log('user controller join()'); </script>";
            $this->userdao->insertUser($_POST['userId'],$_POST['userPw'],$_POST['userType']);
            $frontController = new FrontController('action=userInfo');       // check ///////////////////////////
            $frontController->run();	
        }
        
        
        public function userInfo($userId){
            echo "<script> console.log('function userinfo()'); </script>";
                      
           
            $mapdao = MapDAO::getInstance();
            $modao = MoDAO::getInstance();
            $dtoArr=array();
            $modtoArr=array();
            $mapDTOs=array();

            $userDTO = $this->userdao->selectById($userId);
            array_push($dtoArr, $userDTO);
                     
            $mapDTOs = $mapdao->mSelectMapByUserId($userId);   // mapList
            array_push($dtoArr, $mapDTOs);
    
            for($i=0; $i<count($mapDTOs); $i++){
                $mapId = $mapDTOs[$i]->getMapId();    // mapList 안에 mapId
                $moDTOs = $modao->mSelectMoByMapId($mapId);
                array_push($modtoArr, $moDTOs);	
            }
            array_push($dtoArr, $modtoArr);
            
            if($dtoArr[0]==null){                          // user id not exist
                $this->view = 'manager.php';            // check ///////////////////////////
                $this->returnView();
            }
            else {                                      // user id exist
                $this->view = 'editForm.php';
                $this->returnView($dtoArr);
            }
       }       
       

        public function cUpdateUser($userId, $userPw, $userType){                         // check ///////////////////////////
             echo "<script> console.log('function cupdateuser()'); </script>";
            $userDTO = new UserDTO($userId, $userPw, $userType);                        
            $this->userdao->mUpdateUser($userDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }
        
        public function cDeleteUser($userId){
            echo "<script> console.log('function cDeleteMo'); </script>";
            $this->userdao->mDeleteUser($userId);
            $frontController = new FrontController('action=manager');
            $frontController->run();
        }
    }

    
?>
