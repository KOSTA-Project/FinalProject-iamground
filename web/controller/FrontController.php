<?php
    //echo "<script> console.log('frontcontroller loaded'); </script>";
    require_once 'UserController.php';
    require_once 'MoController.php';
    require_once 'MapController.php';
    
    class FrontController{
        private $query;
        private $controller;
        private $action;        
        public $responseData = array();

        // frontcontroller constructer, it is called by 'new FrontController()'
        public function __construct($query=null){
            //echo "<script> console.log('construct frontcontroller'); </script>";
            $this->query = $query;
            //echo "<script> console.log('".$this->query."'); </script>";            
        }
        
        public function run(){            
            switch($this->query){
                case "action=loginForm":
                    $this->controlView("loginForm.php");
                    break;
                case "action=login":
                    $this->controller = new UserController();
                    $this->controller->login($_POST['userId'], $_POST['userPw']);
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
                    echo "<script> console.log('action=join load'); </script>";
                    $this->controller = new UserController();
                    $this->controller->join();
                    break;
                case "action=userInfo":
                    echo "<script> console.log('action=userinfo'); </script>";
                    $this->controller = new UserController();
                    $this->controller->userInfo($_POST['userId']);
                    break;
                case "action=editForm":
                    echo "<script> console.log('action=editform load'); </script>";
                    $this->controlView("editForm.php");
                    break;
                case "action=edit":
                    echo "<script> console.log('action=edit load'); </script>";
                    $this->controller = new UserController();
                    $this->controller->edit();
                    break;
                case "action=delete":
                    echo "<script> console.log('action=delete'); </script>";
                    $this->controller = new UserController();
                    $this->controller->delete($_POST['userId']);
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
       
        public function controlView($view, $responseData=null){
            echo "<script> console.log('controlView'); </script>";
            $this->responseData = $responseData;     
            //var_dump($this->responseData);
            //echo $view;            
            require './view/'.$view;
        }


    }
?>
