<?php
    require_once 'UserDTO.php';
    require_once 'DBConnector.php';
      
    class UserDAO{
        //private static $instance = new UserDAO();
        private static $instance = null;
        private $connection = null;        

        private function __construct(){                        
            $dbConnector = DBConnector::getInstance();                                  
            $this->connection = $dbConnector->getConnection();
            
        }

        public static function getInstance(){
            echo "<script> console.log('dao getInstance'); </script>";
            if(self::$instance == null){
                self::$instance = new self;
            } 
            return self::$instance;
                     
        }        
        
        public function selectById($userId){
            $userDTO = null;
            $sql = "SELECT * FROM user WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);
            
            $stmt->bind_param('s', $userId);           
            $stmt->execute();
            
            $stmt->bind_result($id, $pw, $type);
            if($stmt->fetch()){
                $userDTO = new UserDTO($id, $pw, $type);
            }
            
            return $userDTO;
        }

	public function insertByUser($m){
		$sql = "insert into user values(?,?,?)";
		$stm = $this->connection->prepare($sql);
                echo "<script> console.log('11'); </script>";
		$stm->bind_param('sss',$_POST['juid'],$_POST['jpwd'],$_POST['jtype']);
                echo "<script> console.log('22'); </script>";
		$stm->execute();
	}

	public function updateByUser(){
		$sql = "update user set user_pwd=?, user_type=? where user_id=?;";		
		$stm = $this->conn->prepare ($sql);
		$stm->bindValue (1, $m->getUserPw ());
		$stm->bindValue (2, $m->getUserType ());
		$stm->bindValue (2, $m->getUserId ());
		$stm->execute();									
	}
	public function deleteByUser($userId){
		$sql = "delete from member where user_id=?;";
		$stm = $this->conn->prepare ($sql);
		$stm->bindValue (1, $userId);
		$stm->execute();
	}


    }
?>
