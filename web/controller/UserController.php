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
            if($userDTO==null){
		echo "<script>alert('가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.');</script>";                                    // not exist id
                $this->view = 'loginForm.php';                      // check ///////////////////////////
                $this->returnView();
            } else {
                if($userDTO->getUserPw()==$userPw){                 // login ok              
                    session_start();
                    $_SESSION['userId']=$userDTO->getUserId();
                    $_SESSION['userType']=$userDTO->getUserType();
                    if($_SESSION['userType']=='2'){                 // manager login
                    $frontController = new FrontController('action=manager');
                    $frontController->run();
                    } else {                                        // user login 
                    $frontController = new FrontController('action=mapList');
                    $frontController->run();
                    }
                } else {                                            // wrong password
		    echo "<script>alert('가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.');</script>";
                    $this->view = 'loginForm.php';                  // check ///////////////////////////
                    $this->returnView();
                }
            }
            
        }
        public function logout(){
            echo "<script> console.log('function logout()'); </script>";
 	    session_start();
	    session_unset();
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
        public function userManage(){
            echo "<script> console.log('function userManage()'); </script>";
            $userDTO = $this->userdao->selectAllId();
            $this->view = 'userManageForm.php';
            $this->returnView($userDTO);
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
		echo "<script>alert('가입하지 않은 아이디 입니다..');</script>";
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
	    echo "<script>alert('계정 삭제되었습니다.');</script>";
            $frontController = new FrontController('action=manager');
            $frontController->run();
        }
    }

    
?>
