<?php
   //실행에 필요한 파일을 불러온다.
    require_once 'UserController.php';
    require_once 'MoController.php';
    require_once 'MapController.php';

    //이용자가 요청한 쿼리를 분석하여 적합한 컨트롤러를 생성하고 메소드를 호출한다.
    class FrontController{
        private $query;
        private $controller;
        private $action;
        public $responseData = array();

        // 프론트컨트롤러 생산자 , 다른 페이지에서 'new FrontController() ' 로 호출된다.
        // index.php 파일에서 url 의 쿼리를 전달 받는다.
        public function __construct($query=null){
            $this->query = $query;
        }

        // 전달받은 쿼리와 데이터를 바탕으로 컨트롤러를 생성하고 메소드를 실행한다.
        public function run(){
            switch($this->query){
                case "action=loginForm":
                    $this->controlView("loginForm.php");
                    break;
                case "action=login":
                    $this->controller = new UserController();
                    $this->controller->login($_POST['userId'], $_POST['userPw']);
                    break;
                case "action=logout":
                    $this->controller = new UserController();
                    $this->controller->logout();
                    break;
                case "action=moList":
                    $this->controller = new MoController();
                    $this->controller->cSelectMoByMapId($_POST['mapId']);
                    break;
                case "action=mapList":
                    $this->controller = new MapController();
                    session_start();
                    $this->controller->cSelectMapByUserId($_SESSION['userId']);
                    break;
                case "action=monitoring":
                    $this->controller = new MapController();
                    $this->controller->cMonitoringByMoId($_POST['moId']);
                    break;
                case "action=manager":
                    $this->controlView("manager.php");
                    break;
                case "action=joinForm";
                    echo "<script> console.log('action=joinform load'); </script>";
                    $this->controlView("joinForm.php");
                    break;
                case "action=join":
                    $this->controller = new UserController();
                    $this->controller->join($_POST['userId'], $_POST['userPw'], $_POST['userType']);
                    break;
                case "action=deleteUser":
                    $this->controller = new UserController();
                    $this->controller->cDeleteUser($_POST['userId']);
                    break;
                case "action=userInfo":
                    $this->controller = new UserController();
                    $this->controller->userInfo($_POST['userId']);
                    break;
                case "action=editForm":
                    $this->controlView("editForm.php");
                    break;
                case "action=addMapForm":
                    $this->controlView("addMapForm.php");
                    break;
                case "action=addMap":
                    $this->controller = new MapController();
                    $this->controller->cAddMap($_POST['mapId'], $_POST['userId'], $_POST['mapLocation']);
                    break;
                case "action=deleteMap":
                    $this->controller = new MapController();
                    $this->controller->cDeleteMap($_POST['mapId']);
                    break;
                case "action=addMoForm":
                    $this->controlView("addMoForm.php");
                    break;
                case "action=addMo":
                    $this->controller = new MoController();
                    $this->controller->cAddMo($_POST['moId'], $_POST['userId'], $_POST['mapId'], $_POST['moType'], $_POST['moStatus'] ,$_POST['moIp']);
                    break;
                case "action=deleteMo":
                    $this->controller = new MoController();
                    $this->controller->cDeleteMo($_POST['moId']);
                    break;
                case "action=updateUser":
                    $this->controller = new UserController();
                    $this->controller->cUpdateUser($_POST['userId'], $_POST['userPw'], $_POST['userType']);
                    break;
                case "action=updateMap":
                    $this->controller = new MapController();
                    $this->controller->cUpdateMap($_POST['mapId'], $_POST['mapLocation']);
                    break;
                case "action=updateMo":
                    $this->controller = new MoController();
                    $this->controller->cUpdateMo($_POST['moId'], $_POST['moType'], $_POST['moStatus'], $_POST['moIp']);
                    break;
                case "action=userManage":
                    $this->controller = new UserController();
                    $this->controller->userManage();
                    break;
                case "action=userManageForm":
                    $this->controlView("userManageForm.php");
                    break;
                /*
                case "action=imageUpload":
                    $this->controller = new MapController();
                    var_dump($_FILES["fileToUpload"]["name"]);
                    $this->controller->cInsertMapImage($_FILES["fileToUpload"]["name"]);
                    break;
                */
            }

        }
        //각 컨트롤러에서 전달 받은 데이터를 바탕으로 view를 호출한다.
        public function controlView($view, $responseData=null){
            $this->responseData = $responseData;
            require './view/'.$view;
        }


    }
?>
