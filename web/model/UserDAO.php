
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
                echo "<script> console.log('update start'); </script>";
		$sql = "update user set user_id=?, user_pwd=?, user_type=? where user_id=?";		
		$stm = $this->connection->prepare ($sql);
		$stm->bind_param('ssss',$_POST['Uuid'],$_POST['Upwd'],$_POST['Utype'],$_POST['Uuid']);
		$stm->execute();									
	}
	public function deleteByUser($userId){
        echo $userId;
                echo "<script> console.log('deleteByUser'); </script>";
		$sql = "delete from user where user_id=?;";
		$stm = $this->connection->prepare ($sql);
		$stm->bind_param ('s',$userId);
		$stm->execute();
	}


    }
?>
