<?php
    require_once './model/UserDAO.php';
    require_once './model/MapDAO.php';
    require_once './model/MoDAO.php';
    class UserController{
        private $userdao;
        public function __construct(){
            $this->userdao = UserDAO::getInstance();
        }

        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }

	//로그인
        public function login($userId, $userPw){

            $userDTO = $this->userdao->selectById($userId);
            if($userDTO==null){					    //not exist id
		echo "<script>alert('가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.');</script>";
                $this->view = 'loginForm.php';
                $this->returnView();
            } else {
                if($userDTO->getUserPw()==$userPw){                 // login ok
                    //세션 스타트
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
                    $this->view = 'loginForm.php';
                    $this->returnView();
                }
            }

        }
	//로그아웃
        public function logout(){
 	    session_start();
	    //세션 배열의 모든 값들을 비운다.
	    session_unset();
	    //세션을 삭제한다.
	    session_destroy();
            $this->view = 'loginForm.php';
            $this->returnView();
        }

	//회원관리
        public function userManage(){
            $userDTO = $this->userdao->selectAllId();
            $this->view = 'userManageForm.php';
            $this->returnView($userDTO);
        }

	//회원정보
        public function userInfo($userId){
            $mapdao = MapDAO::getInstance();
            $modao = MoDAO::getInstance();
            $dtoArr=array();
            $modtoArr=array();
            $mapDTOs=array();

	    //유저정보, 맵정보, 맵아이디로 조회한 오브젝트정보를 dtoArr배열에 저장한후 반환한다.
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
                $frontController = new FrontController('action=userManage');
                $frontController->run();
            }
            else {                                      // user id exist
                $this->view = 'editForm.php';
                $this->returnView($dtoArr);
            }
       }

	//유저 정보를 추가한다.
        public function join($userId, $userPw, $userType){
	    $userDTO = new UserDTO($userId, $userPw, $userType);
            $this->userdao->InsertUser($userDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

	//유저 정보를 수정한다.
        public function cUpdateUser($userId, $userPw, $userType){
            $userDTO = new UserDTO($userId, $userPw, $userType);
            $this->userdao->mUpdateUser($userDTO);
            $frontController = new FrontController('action=userInfo');
            $frontController->run();
        }

	//유저 정보를 삭제한다.
        public function cDeleteUser($userId){
            $this->userdao->mDeleteUser($userId);
	    echo "<script>alert('계정 삭제되었습니다.');</script>";
            $frontController = new FrontController('action=manager');
            $frontController->run();
        }
    }

?>
