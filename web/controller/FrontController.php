<?php
    echo "<script> console.log('frontcontroller load'); </script>";
    require_once 'UserController.php';
    require_once 'MoController.php';
    require_once 'MapController.php';
    
    class FrontController{
        private $controller;
        private $action;
        private $data;
        private $view;
        private $query;
        public $responseData = array();

        public function __construct($query=null){
            
            echo "<script> console.log('construct frontcontroller'); </script>";
            $this->query = $query;
            echo "<script> console.log('".$this->query."'); </script>";
            
            //$this->action = $action; 
                               
        }
        
        public function run(){
            
            switch($this->query){
                case "action=loginForm":
                    $this->controlView("loginForm.php");
                    break;
                case "action=login":
                    //echo $this->query;
                    $this->controller = new UserController();
                    $this->controller->login($_POST['uid'], $_POST['pwd']);
                    //$this->login();
                    break;
                case "action=moList":
                    //echo $this->query;
                    $this->controller = new MoController();
                    $this->controller->cSelectMoByMapId($_POST['mId']);
                    break;
                case "action=mapList":
                    $this->controller = new MapController();
                    session_start();
                    $this->controller->cSelectMapByUserId($_SESSION['userId']);
                    //$this->controller->cSelectMapByUserId('yun');
                    break;
                case "action=monitoring":
                    $this->controller = new MapController();
                    $this->controller->cMonitoringByMoId($_POST['moId']);
                    break;
                case "action=manager":
                    $this->controlView("manager.php");
                    break;
                case "action=joinform";
                    echo "<script> console.log('action=joinform load'); </script>"; 
                    $this->controlView("joinform.php");
                    break;
                case "action=join":
                    echo "<script> console.log('action=join load'); </script>";
                    $this->controller = new UserController();
                    $this->controller->join();
                    break;
                case "action=userinfo":
                    echo "<script> console.log('action=userinfo'); </script>";
                    $this->controller = new UserController();
                    $this->controller->userinfo($_POST['infouid']);
                    break;

	            case "action=editform";
                    echo "<script> console.log('action=editform load'); </script>";
                    $this->controlView("editform.php");
                    break;
                case "action=edit":
                    echo "<script> console.log('action=edit load'); </script>";
                    $this->controller = new UserController();
                    $this->controller->edit();
                    break;
                case "action=delete":
                    echo "<script> console.log('action=delete'); </script>";
                    $this->controller = new UserController();
                    $this->controller->delete($_POST['Duid']);
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
        /*
        public function login(){   
            $code = $this->userService->login($_POST['uid'], $_POST['pwd']);                        
            switch($code){
                case 1:
                    $this->data = 'no id';
                    require './view/loginForm.php';                     
                case 2:
                    $this->data = 'wrong password';
                    require './view/loginForm.php';                    
                case 3:
                    echo "<script> console.log('login ok'); </script>";
                    $this->data = 'login ok';
                    require './view/main.php';                 
                                     
            }
        }
        */
        public function controlView($view, $responseData=null){
            echo "<script> console.log('controlView'); </script>";
            $this->responseData = $responseData;     
            //var_dump($this->responseData);            
            require './view/'.$view;
        }


    }
?>
